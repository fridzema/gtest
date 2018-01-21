<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');
Route::get('/job_status', 'IndexController@getJobStatus');
Route::post('/start_autofollower', 'GithubController@startAutofollower');
Route::post('/start_spellchecker', 'GithubController@startSpellChecker');

Route::prefix('github')->group(function () {
    Route::get('autofollow/{username}', 'GithubController@autofollow');
});
