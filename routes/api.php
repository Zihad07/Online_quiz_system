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

Route::get('/quize',[\App\Http\Controllers\ApiQuizeQuestionContrller::class, 'quize'])->name('api.quize.all');
Route::get('/quize/question/{quize}',[\App\Http\Controllers\ApiQuizeQuestionContrller::class, 'quesstionWithOptions'])->name('api.question.with.options');


Route::middleware('auth:api')->group(function (){
});
