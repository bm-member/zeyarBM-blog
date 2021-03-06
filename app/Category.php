<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);

    }

    public function user()
    {
    	return $this->belongsTo('App\user');
    }
    
}
