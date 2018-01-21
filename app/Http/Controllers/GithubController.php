<?php

namespace App\Http\Controllers;

use App\Jobs\GetFollowers;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class GithubController extends Controller
{
    public function startAutofollower(Request $request)
    {
        return response()->json([
            'followers' => $this->autoLikeFollowers($request->input('username')),
        ]);
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

    public function autoLikeFollowers($username)
    {
        $user = GithubRequest('users/'.$username.'');

        for ($x = 0; $x <= (round($user['followers'] / 100)); $x++) {
            $pagenumber = $x + 1;

            GetFollowers::dispatch($user['login'], $pagenumber);
        }

        return $user['followers'];
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
