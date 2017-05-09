<?php
namespace Hocnt\LaravelOAuth2Server\Facades;
use Illuminate\Support\Facades\Facade;

class Oauth2 extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'oauth2'; }
}