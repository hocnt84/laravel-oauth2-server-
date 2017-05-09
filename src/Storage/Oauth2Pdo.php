<?php

namespace Hocnt\LaravelOAuth2Server\Storage;

use App\Models\Users\User;
use Illuminate\Support\Facades\Auth;
use OAuth2\Storage\Pdo;

class Oauth2Pdo extends Pdo
{
    protected function checkPassword($user, $password)
    {
        return $user['password'] == $this->hashPassword($password);
    }

    public function checkUserCredentials($username, $password)
    {

        if ($user = $this->guard()->attempt(['email'=>$username,'password'=>$password])) {
            return true;
        }

        return false;
    }

    public function getUserDetails($username)
    {
        return $this->getUser($username);
    }

    public function getUser($username)
    {
        if ($user = User::where('email', $username)->first()) {

            return array_merge(array(
                'user_id' => $user->id,
            ), $user->toArray());
        }

        return false;
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
