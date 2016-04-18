<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Nette\Reflection\AnnotationsParser;

$src = new RecursiveDirectoryIterator(__DIR__ . '/../src');

$iterator = new RecursiveIteratorIterator($src);
$regex = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

$registeredConstants = new ArrayObject();

foreach ($regex as $path) {
    $file = new SplFileObject(realpath($path[0]));
    $classes = AnnotationsParser::parsePhp($file->fread($file->getSize()));
    foreach ($classes as $className => $content) {
        require_once $file->getRealPath();
        $reflection = new ReflectionClass($className);
        if ( ($reflection->isInterface()) && (count($reflection->getInterfaceNames()) === 0) ) {
            $constants = $reflection->getConstants();
            foreach ($constants as $constantName => $constantCode) {
                if (!$registeredConstants->offsetExists("$constantCode")) {
                    $registeredConstants->offsetSet("$constantCode", new ArrayObject());
                }

                $registeredConstants->offsetGet("$constantCode")->offsetSet(
                    $reflection->getShortName(),
                    $constantName
                );
            }
        }
    }
}
foreach ($registeredConstants as $statusCode => $names) {
    echo "$statusCode :\n";
    foreach ($names as $name) {
         echo "  $name \n";
    }
}
