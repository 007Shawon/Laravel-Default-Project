<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public function blogPosts()
    {
        return $this->belongsToMany('App\Models\BlogPost', 'blog_post_tag')->withTimestamps()->as('tagged');
    }

}
