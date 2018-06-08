<?php

namespace Arjunmat\Prerender;

use Illuminate\Support\Facades\Facade;

class PrerenderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'prerender';
    }
}
