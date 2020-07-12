<?php

namespace App\Observers;

use App\Models\BlogPostCategory;

class BlogCategoryObserver
{
    /**
     * Handle the blog post category "created" event.
     *
     * @param  \App\Models\BlogPostCategory  $blogPostCategory
     * @return void
     */
    public function created(BlogPostCategory $blogPostCategory)
    {
        //

    }

    public function creating(BlogPostCategory $blogPostCategory){
        $this->setSlug($blogPostCategory);
    }

    /**
     * Handle the blog post category "updated" event.
     *
     * @param  \App\Models\BlogPostCategory  $blogPostCategory
     * @return void
     */
    public function updated(BlogPostCategory $blogPostCategory)
    {
        //
    }

    public function updating(BlogPostCategory $blogPostCategory)
    {
        $this->setSlug($blogPostCategory);
    }

    /**
     * Handle the blog post category "deleted" event.
     *
     * @param  \App\Models\BlogPostCategory  $blogPostCategory
     * @return void
     */
    public function deleted(BlogPostCategory $blogPostCategory)
    {
        //
    }

    /**
     * Handle the blog post category "restored" event.
     *
     * @param  \App\Models\BlogPostCategory  $blogPostCategory
     * @return void
     */
    public function restored(BlogPostCategory $blogPostCategory)
    {
        //
    }

    /**
     * Handle the blog post category "force deleted" event.
     *
     * @param  \App\Models\BlogPostCategory  $blogPostCategory
     * @return void
     */
    public function forceDeleted(BlogPostCategory $blogPostCategory)
    {
        //
    }

    protected function setSlug(BlogPostCategory $blogPostCategory){

        $needSetSlug = empty($blogPostCategory->slug);
        if($needSetSlug){
            $blogPostCategory->slug = str_slug($blogPostCategory->title);
        }
    }
}
