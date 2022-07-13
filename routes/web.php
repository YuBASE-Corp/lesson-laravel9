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

    // データその1
    $data = new stdClass();
    $data->message = "Laravelからのメッセージ";
    $data->created_at = "2022/01/01 00:00";
    
    // データその2
    $data2 = new stdClass();
    $data2->message = "Laravelからのメッセージ その2";
    $data2->created_at = "2023/01/01 00:00";

    // 配列を作成
    $tweets = [$data, $data2];

    return view("tweets", [
        'tweets' => $tweets
    ]);
});