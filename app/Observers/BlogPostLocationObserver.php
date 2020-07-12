<?php

namespace App\Observers;

use App\Models\BlogPostLocation;

class BlogPostLocationObserver
{
    /**
     * Handle the blog post location "created" event.
     *
     * @param  \App\Models\BlogPostLocation  $blogPostLocation
     * @return void
     */
    public function created(BlogPostLocation $blogPostLocation)
    {
        //
    }

    public function creating(BlogPostLocation $blogPostLocation){
        $this->setSlug($blogPostLocation);
    }

    /**
     * Handle the blog post location "updated" event.
     *
     * @param  \App\Models\BlogPostLocation  $blogPostLocation
     * @return void
     */
    public function updated(BlogPostLocation $blogPostLocation)
    {
        //
    }

    public function updating(BlogPostLocation $blogPostLocation)
    {
        $this->setSlug($blogPostLocation);
    }

    /**
     * Handle the blog post location "deleted" event.
     *
     * @param  \App\Models\BlogPostLocation  $blogPostLocation
     * @return void
     */
    public function deleted(BlogPostLocation $blogPostLocation)
    {
        //
    }

    /**
     * Handle the blog post location "restored" event.
     *
     * @param  \App\Models\BlogPostLocation  $blogPostLocation
     * @return void
     */
    public function restored(BlogPostLocation $blogPostLocation)
    {
        //
    }

    /**
     * Handle the blog post location "force deleted" event.
     *
     * @param  \App\Models\BlogPostLocation  $blogPostLocation
     * @return void
     */
    public function forceDeleted(BlogPostLocation $blogPostLocation)
    {
        //
    }

    protected function setSlug(BlogPostLocation $blogPostLocation){

        $needSetSlug = empty($blogPostLocation->slug);
        if($needSetSlug){
            $blogPostLocation->slug = str_slug($blogPostLocation->title);
        }
    }
}
