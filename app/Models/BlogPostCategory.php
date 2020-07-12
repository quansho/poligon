<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPostCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'parent_id',
        'slug',
        'description',

    ];

    public function parentCategory(){
        return $this->belongsTo(BlogPostCategory::class, 'parent_id', 'id');
    }

    public function getParentTitleAttribute(){

        $title = $this->parentCategory->title ?? '0';

        return $title;
    }

}