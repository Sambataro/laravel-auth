<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'paragraph',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
