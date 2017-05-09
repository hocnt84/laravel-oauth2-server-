<?php

namespace Hocnt\LaravelOAuth2Server\Provider;

use Hocnt\LaravelOAuth2Server\GrantType\JwtBearer;
use Hocnt\LaravelOAuth2Server\GrantType\UserCredentials;
use Hocnt\LaravelOAuth2Server\Storage\Oauth2Pdo;
use Hocnt\LaravelOAuth2Server\Storage\Oauth2Redis;
use Illuminate\Support\ServiceProvider;
use OAuth2\GrantType\ClientCredentials;
use OAuth2\Server;

class Oauth2ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('oauth2', function () {
            $storage = new Oauth2Pdo(app()->make('db')->getPdo());
            
            $predis = new \Predis\Client();
            $storageRedis = new Oauth2Redis($predis);
    
            $server  = new Server($storage);
            $server->addStorage($storageRedis,'access_token');

            $audience = 'https://api.mysite.com';

            $server->addGrantType(new JwtBearer($storage,$audience));
            $server->addGrantType(new ClientCredentials($storage));
            $server->addGrantType(new UserCredentials($storage));

            return $server;
        });

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
