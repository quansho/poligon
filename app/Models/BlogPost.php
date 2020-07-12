<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class blogpost
 * @package App\Models
 *
 * @property \App\Models\BlogPostLocation               $location
 * @property \App\Models\BlogPostCategory               $category
 * @property \App\Models\User                           $user
 * @property string                                     $title
 * @property string                                     $slug
 * @property string                                     $excerpt
 * @property string                                     $content_raw
 * @property string                                     $content_html
 * @property string                                     $published_at
 * @property boolean                                    $is_published
 */

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'location_id',
        'category_id',
        'slug',
        'excerpt',
        'content_raw',
        'content_html',
        'is_published',
        'user_id',
    ];

    public function category(){
        return $this->belongsTo(BlogPostCategory::class);
    }

    public function location(){
        return $this->belongsTo(BlogPostLocation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
