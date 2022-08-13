<?php

namespace Survos\FooBundle\Twig;

use Picqer\Barcode\BarcodeGeneratorSVG;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class FooTwigExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('foo', [$this, 'foo']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('foo', [$this, 'foo']),
        ];
    }

    public function foo($value): string
    {
        return $value . 'FOO';
        // ...
    }
}
