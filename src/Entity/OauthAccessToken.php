<?php

namespace Hocnt\OAuthServer\Entity;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

class OauthAccessToken extends Model
{
    protected $fillable = [
        'access_token', 'client_id', 'user_id', 'expires', 'scope',
    ];
    protected $primaryKey = 'access_token';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
