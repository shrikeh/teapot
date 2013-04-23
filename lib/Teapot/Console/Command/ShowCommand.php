<?php
namespace Teapot\Console\Command;

use \ReflectionClass;

use \phpDocumentor\Reflection\FileReflector;

use \Symfony\Component\Console\Command\Command;
use \Symfony\Component\Console\Output\OutputInterface;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Input\InputArgument;
use \Symfony\Component\Console\Input\InputOption;

class ShowCommand extends Command
{

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('show')
            ->setDescription('Show documentation on response codes')
            ->addArgument(
                'code',
                InputArgument::OPTIONAL,
                'Which code do you wish to see documentation on?'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
         $code = $input->getArgument('code');

         $reflector = new ReflectionClass('\Teapot\HttpResponse\Status\StatusCode');
         var_dump($reflector->getFileName());

         $phpDoc = new FileReflector($reflector->getFileName());
         $phpDoc->process();

         var_dump($phpDoc->getConstants());

        if ($code) {
             $text = 'Hello '. $code;
        } else {
             $text = 'Hello';
        }

         $output->writeln($text);
    }
}
