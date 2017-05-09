<?php
namespace Hocnt\LaravelOAuth2Server\GrantType;;

use OAuth2\ClientAssertionType\ClientAssertionTypeInterface;
use OAuth2\GrantType\GrantTypeInterface;
use OAuth2\GrantType\RefreshToken;
use OAuth2\RequestInterface;
use OAuth2\ResponseInterface;
use OAuth2\ResponseType\AccessTokenInterface;
use OAuth2\Storage\RefreshTokenInterface;

class RefreshToken extends RefreshToken implements ClientAssertionTypeInterface
{
    
}
