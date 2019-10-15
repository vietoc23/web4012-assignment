<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function categories() {
        return $this->hasMany(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function setIsActiveAttribute($value)
    {
        $this->attributes['is_active'] = $value === 'true' ? true : false;
    }

    // public function getBirthdayAttribute($value)
    // {
    //     return date('d-m-Y', strtotime($value));
    // }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    protected $casts = [
        'role' => 'int',
    ];

}
