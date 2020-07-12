<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BlogPostObserver
{
    /**
     * Handle the blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */

    public function created(BlogPost $blogPost)
    {
        //
    }

    public function creating(BlogPost $blogPost){
        $this->setSlug($blogPost);
        $this->setPublishedAt($blogPost);
        $this->setHtml($blogPost);
//        $this->setUser($blogPost);
    }

    /**
     * Handle the blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
    }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    protected function setPublishedAt(BlogPost $blogPost){

        $needSetPublished = empty($blogPost->published_at) && $blogPost->is_published;
        if($needSetPublished){
            $blogPost->published_at = Carbon::now();
        }
    }

    protected function setSlug(BlogPost $blogPost){

        $needSetSlug = empty($blogPost->slug);
        if($needSetSlug){
            $blogPost->slug = str_slug($blogPost->title);
        }
    }

    protected function setHtml(BlogPost $blogPost){
        $needSetHtml = $blogPost->isDirty('content_raw');

        if($needSetHtml){
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    protected function setUser(BlogPost $blogPost){
        $blogPost->user_id = Auth::user()->id;
    }
}
