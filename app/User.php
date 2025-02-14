<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Note;
use App\Role;
use App\Notification;

class User extends Authenticatable
{
    use Notifiable;

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function notifications()
    {
        return $this->belongsTo(Notification::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
