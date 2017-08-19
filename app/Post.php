<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'channel_id',
        'total_replies',
        'title',
        'body',
        'slug'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function channel(){
        return $this->belongsTo(Channel::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }
}
