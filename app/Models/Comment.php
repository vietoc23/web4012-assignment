<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    
    protected $with = ['user'];

    // protected $casts = [
    //     'is_active' => 'boolean'
    // ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setIsActiveAttribute($value)
    {
        $this->attributes['is_active'] = $value === 'true' ? true : false;
    }

    public function getIsActiveAttribute()
    {
        return $this->attributes['is_active'] === 1 ? true : false;
    }


}
