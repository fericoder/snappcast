<?php

namespace App\Jobs;

use App\Social;
use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class SocialChecker
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $posts = Post::where('published_at', '<',  \Carbon\Carbon::now()->toDateTimeString())->where('notified', '0')->where('telegram', 'on')->get();
        foreach ($posts as $post){
            if ($post->telegram == 'on'){
                dispatch_now(new \App\Jobs\Posts\Telegram($post));
            }elseif ($post->instagram == 'on'){
                dispatch_now(new \App\Jobs\Posts\Instagram($post->photo, $post->description));
            }
            Post::where('id', $post->id)->update(['notified' => 1]);
        }




        $socials = Social::where('published_at', '<',  \Carbon\Carbon::now()->toDateTimeString())->where('notified', '0')->get();
        foreach ($socials as $social){
            if ($social->socialMedia == 'telegram'){
                dispatch_now(new \App\Jobs\Socials\Telegram($social));
                Social::where('id', $social->id)->update(['notified' => 1]);
            }elseif ($social->socialMedia == 'instagram'){
                dispatch_now(new \App\Jobs\Socials\Instagram($social->image, $social->caption));
                Social::where('id', $social->id)->update(['notified' => 1]);
            }
        }


    }
}
