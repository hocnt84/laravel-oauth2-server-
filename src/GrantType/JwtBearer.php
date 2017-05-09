<?php
namespace Hocnt\LaravelOAuth2Server\GrantType;

use OAuth2\ClientAssertionType\ClientAssertionTypeInterface;
use OAuth2\GrantType\JwtBearer as JwtBearerOAuth2;

class JwtBearer extends JwtBearerOAuth2 implements ClientAssertionTypeInterface
{
	
}