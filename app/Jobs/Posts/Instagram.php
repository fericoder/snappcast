<?php

namespace App\Jobs\Posts;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class Instagram
{
    use Dispatchable, Queueable;

    protected $caption;
    protected $photo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($photo, $caption)
    {
        $this->caption = $caption;
        $this->photo = $photo;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        set_time_limit(0);
        date_default_timezone_set('Asia/Tehran');

        $username = env('INSTAGRAM_USERNAME');
        $password = env('INSTAGRAM_PASSWORD');
        $debug = false;
        $truncatedDebug = false;

        $photoFilename = public_path(). "_html" . $this->photo;
        $captionText = $this->caption;

        \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
        $ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
        try {
            $ig->login($username, $password);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
            exit(0);
        }
        try {
            $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename);
            $ig->timeline->uploadPhoto($photo->getFile(), ['caption' => $captionText]);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
        }
    }
}
