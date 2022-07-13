<?php

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
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/tweets', function() {

    // 空のクラスを作成
    $data = new stdClass();
    // プロパティを追加
    $data->message = "Laravelからのメッセージ";
    $data->created_at = "2022/01/01 00:00";
    // dd($tweet);

    return view("tweets", [
        'tweet' => $data
    ]);
});