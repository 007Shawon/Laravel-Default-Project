<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'content'];

    use HasFactory;

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'blog_post_tag')->withTimestamps();
    }


    public static function boot()
    {
        parent::boot();

        static::deleting(function (BlogPost $blogPost){
            $blogPost->comments()->delete();
        });

        static::restoring(function (BlogPost $blogPost){
            $blogPost->comments()->delete();
        });
    }
}
