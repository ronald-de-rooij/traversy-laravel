<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

    public $liker;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker, Post $post)
    {
        $this->liker = $liker;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts_liked')
            ->subject('Someone liked your post');
    }
}
