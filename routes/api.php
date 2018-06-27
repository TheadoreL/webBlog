<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/article/list/{page}', 'ArticleController@list');
    Route::get('/article/detail/{id}', 'ArticleController@detail');
    Route::post('/article/save', 'ArticleController@save');
    Route::post('/article/delete', 'ArticleController@delete');

    Route::get('/tags/list', 'TagsController@list');
    Route::post('/tags/save', 'TagsController@save');
    Route::post('/tags/delete', 'TagsController@delete');

    Route::post('/file/upload', 'FileController@upload');
});