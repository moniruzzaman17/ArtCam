<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class AdminUser extends Model implements AuthenticatableContract
{
    // use HasPermissions;
    use Authenticatable;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password_hash',
        'last_log_time',
        'lognum',
        'is_active',
        'rp_token',
        'rp_token_created_at',
        'log_failed_num',
    ];

    public function getAuthPassword() {
        return $this->password_hash;
    }

}
