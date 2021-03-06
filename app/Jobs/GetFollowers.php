<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GetFollowers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $username;
    protected $pagenumber;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($username, $pagenumber)
    {
        $this->username = $username;
        $this->pagenumber = $pagenumber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $followers = app('App\Http\Controllers\GithubController')->collectFollowersPerPage($this->username, $this->pagenumber);

        foreach ($followers as $follower) {
            FollowUser::dispatch($follower['login']);
        }
    }
}
