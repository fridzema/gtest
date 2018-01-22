<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $profile = app('App\Http\Controllers\GithubController')->getProfileData();

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
