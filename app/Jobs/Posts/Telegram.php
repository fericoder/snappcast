<?php

namespace App\Jobs\Posts;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class Telegram
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $image =  "http://modirproje.com".$this->post->images['848,566'];
            $caption = str_limit($this->post->title, 100);
            $caption .= "\n\n";
            $caption .= "https://modirproje.com/posts/".$this->post->slug;
            $caption = urlencode($caption);
            $output = file_get_contents("http://bidboland.com/telegram/photo.php?token=755996653:AAHpbxJr_HlBBVDZIDNJSnRrY1OJPo4I8pE&chatId=-1001004877001&image=$image&caption=$caption");
    }
}
