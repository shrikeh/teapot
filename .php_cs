<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('tests')
    ->in(__DIR__)
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers(array(
        'blankline_after_open_tag',
        'concat_without_spaces',
        'duplicate_semicolon',
        'extra_empty_lines',
        'namespace_no_leading_whitespace',
        'no_blank_lines_after_class_opening',
        'no_empty_lines_after_phpdocs',
        'ordered_use',
        'phpdoc_indent',
        'phpdoc_scalar',
        'phpdoc_separation',
        'phpdoc_short_description',
        'phpdoc_trim',
        'phpdoc_type_to_var',
        'phpdoc_var_without_name',
        'remove_leading_slash_use',
        'remove_lines_between_uses',
        'single_line_after_imports',
        'spaces_before_semicolon',
        'trailing_spaces',
        'whitespacy_lines'
    ))
    ->finder($finder)
;
