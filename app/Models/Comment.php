<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    
    protected $with = ['user'];

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
}
