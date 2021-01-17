<?php

namespace App\Jobs\Socials;

use App\Social;
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

    public function __construct(Social $social)
    {
        $this->social = $social;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $image =  "http://modirproje.com".$this->social->image;
        $caption = urlencode('اکوسیستم مدیرپروژه');
        $output = file_get_contents("http://bidboland.com/telegram/photo.php?token=755996653:AAHpbxJr_HlBBVDZIDNJSnRrY1OJPo4I8pE&chatId=-1001004877001&image=$image&caption=$caption");
    }
}
