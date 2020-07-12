<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class BlogPostLocation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'parent_id',
        'description',
        'map_lat',
        'map_lng',
        'map_zoom',
        'slug',
        'status',

    ];

    public function parentCategory(){
        return $this->belongsTo(BlogPostLocation::class, 'parent_id', 'id');
    }

    public function getParentTitleAttribute(){

        $title = $this->parentCategory->title ?? '0';

        return $title;
    }

}