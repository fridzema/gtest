<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    private $client;

    /*
     * Github username
     *
     * @var string
     * */
    private $username;

    public function __construct(\Github\Client $client)
    {
        $this->client = $client;
        $this->username = env('GITHUB_USERNAME');
    }

    public function index()
    {

        // https://www.sitepoint.com/use-githubs-api-php/
        try {
            $profile = $this->client->api('current_user')->show();
        } catch (\RuntimeException $e) {
            dd($e);
            // $this->handleAPIException($e);
        }

        return response()->view('index', ['profile' => $profile]);
    }

    public function getJobStatus()
    {
        return response()->json([
            'pending_jobs' => getJobStatus(),
            'failed_jobs' => getJobStatus('failed'),
        ]);
    }
}
