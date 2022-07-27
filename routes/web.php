<?php

use App\Http\Controllers\TweetController; // 追記
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('top'); // welcome から top に変更
});

// グループで囲み、その中にエンドポイントを作成
Route::group(['middleware' => ['auth']], function () {
    Route::resource('tweets', TweetController::class)->except(['create', 'show']);
});

require __DIR__.'/auth.php';
