<?php

namespace App\Http\Controllers;

use App\Jobs\GetFollowers;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class GithubController extends Controller
{
    private $client;

    public function __construct(\Github\Client $client)
    {
        $this->client = $client;
    }

    public function getProfileData()
    {
        try {
            $profile = $this->client->api('current_user')->show();
        } catch (\RuntimeException $e) {
            dd($e);
        }

        return $profile;
    }

    public function autoLikeFollowers($username)
    {
        try {
            $user = $this->client->api('user')->show($username);

            for ($x = 0; $x <= (round($user['followers'] / 30)); $x++) {
                $pagenumber = $x + 1;

                GetFollowers::dispatch($username, $pagenumber);
            }
        } catch (\RuntimeException $e) {
            dd($e);
        }

        return $user['followers'];
    }

    public function collectFollowersPerPage($username, $pagenumber)
    {
        try {
            $followers = $this->client->api('user')->followers($this->username, ['page' => $this->pagenumber]);
        } catch (\RuntimeException $e) {
            dd($e);
        }

        return $followers;
    }

    public function followUser($username)
    {
        try {
            $follow_user = $client->api('current_user')->follow()->follow($username);
        } catch (\RuntimeException $e) {
            dd($e);
        }

        return $follow_user;
    }

    public function startSpellChecker(Request $request)
    {
        $response = $this->autoSpellChecker($request->input('username'), $request->input('repo'));

        $suggestions_html = view('github.spellchecker.suggestions', ['data' => $response])->render();

        return response()->json([
            'response' => $response,
            'suggestions_html' => $suggestions_html,
        ]);
    }

    public function autoSpellChecker($username, $repo)
    {
        $readme = GithubRequest('repos/'.$username.'/'.$repo.'/readme/');

        return [
            'original_content' => Markdown::convertToHtml(base64_decode($readme['content'])),
            'spellchecker' => SpellChecker(strip_tags(Markdown::convertToHtml(base64_decode($readme['content'])))),
        ];
    }
}
