<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $profile = app('App\Http\Controllers\GithubController')->getProfileData();

        return response()->view('index', [
          'profile' => $profile
        ]);
    }
}
