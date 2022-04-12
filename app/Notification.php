<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Notification extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $primaryKey = 'id';
}
