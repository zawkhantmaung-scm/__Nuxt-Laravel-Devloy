<?php

use App\Models\User;
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

Route::get('v1/friday', function () {
    return response()->json([
        'program' => 'Ayay Tw Pon Aung Ya Mi;',
    ]);
});
Route::get('v1/users', function () {
    return response()->json([
        'users' => User::get(),
    ]);
});
