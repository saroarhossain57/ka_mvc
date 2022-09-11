<?php

namespace App\Abstraction;

abstract class BaseMiddleware
{
    abstract public function execute();
}