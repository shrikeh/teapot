<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2023 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/php-package-template
 */

use Ergebnis\PhpCsFixer;

$config = PhpCsFixer\Config\Factory::fromRuleSet(new PhpCsFixer\Config\RuleSet\Php80(), [
    'binary_operator_spaces' => [
        'operators' => [
            '=' => 'align',
        ],
    ],
    'declare_strict_types' => false,
    'final_class' => false,
    'header_comment' => false,
    'phpdoc_no_package' => false,
    'phpdoc_separation' => false,
    'phpdoc_summary' => false,
]);

$config->getFinder()
    ->path([
        'examples/',
        'spec/',
        'src/',
    ])
    ->ignoreVCSIgnored(true)
    ->append([__FILE__])
    ->in(__DIR__);

$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php-cs-fixer.cache');

return $config;
