<?php

namespace App\Http\Controllers;

use DB;

class IndexController extends Controller
{
    public function index()
    {
        $profile = app('App\Http\Controllers\GithubController')->getProfileData();

        return response()->view('index', ['profile' => $profile]);
    }

    public function startAutofollower(Request $request)
    {
        return response()->json([
            'followers' => app('App\Http\Controllers\GithubController')->autoLikeFollowers($request->input('username')),
        ]);
    }

    public function getJobStatus()
    {
        return response()->json([
            'pending_jobs' => DB::table('jobs')->count(),
            'failed_jobs' => DB::table('failed_jobs')->count(),
        ]);
    }
}
