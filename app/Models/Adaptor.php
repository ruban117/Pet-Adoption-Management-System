<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Adaptor extends Authenticatable
{
    use Notifiable;

    protected $table = 'adaptors';

}
