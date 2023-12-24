<?php

namespace infrastructure\Facades;

use infrastructure\Images;
use Illuminate\Support\Facades\Facade;
// use infrastructure\Facades\ImagesFacade;

class ImagesFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return Images::class;
    }

}
