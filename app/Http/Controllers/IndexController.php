<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $profile = GithubRequest('users');
        dd($profile);
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
