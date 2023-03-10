<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/posts', function(){
    return response()->json([
        'title' => 'My first post',
        'description' => 'This is my first post'
    ]);
});

Route::get('/users', function(){
    $results = DB::select('select * from users');
    return response()->json($results);
});
   
Route::get('/users/{id}', function($id){
    $results = DB::select('select * from users where id = ?', [$id]);
    return response()->json($results, 200);
});
   

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

