<?php

namespace Survos\FooBundle\Service;


class FooService
{
    public function __construct(private string $title) {

    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
