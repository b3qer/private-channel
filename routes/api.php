<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::post('/login', function (Request $request) {
  $request = $request->json()->all();

    if (!Auth::attempt($request)) {
        return $this->respone('تأكد من ادخال المعلومات', 400, ['error' => ['تأكد من ادخال المعلومات']], []);
    }
  
    $token = auth()->user()->createToken('authToken')->accessToken;
    //  return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    return $token;
});
