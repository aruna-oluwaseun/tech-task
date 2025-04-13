<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__) // 👈 THIS is what was missing
    ->name('*.php')
    ->exclude('vendor');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        // add any other rules you want
    ])
    ->setFinder($finder);
?>