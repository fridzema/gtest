<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UnFollowUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $username;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        $this->username = $username;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $un_follow_user = app('App\Http\Controllers\GithubController')->followUser($this->username);
    }

    /**
     * Handle a job failure.
     *
     * @return void
     */
    public function failed()
    {
        // Called when the job is failing...
    }
}
