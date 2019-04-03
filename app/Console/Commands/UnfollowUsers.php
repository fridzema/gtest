<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UnfollowUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github:unfollow {ammount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(\Github\Client $client)
    {
        parent::__construct();

        $this->client = $client;
    }

    public function unfollow($users){
      foreach($users as $user){
        $unfollow = $this->client->api('current_user')->follow()->unfollow($user['login']);
        dump($unfollow);
        $this->info($user['login']);
        sleep(mt_rand(1, 3));
      }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $profile = $this->client->api('current_user')->show();
      $username = 'fridzema';
     $user = $this->client->api('user')->show('fridzema');

      for ($x = 0; $x <= (round($user['following'] / 30)); $x++) {
          $pagenumber = $x + 1;

          $following = $this->client->api('user')->following($username, ['page' => $pagenumber]);

          $this->unfollow($following);
      }
    }
}
