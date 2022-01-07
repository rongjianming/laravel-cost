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

Route::get('/register', function(){
    \App\Models\users_token::create([
        'name' => '123',
        'email' => '123@123.com',
        'password' => \Illuminate\Support\Facades\Hash::make('123456'),
    ]);
//    var_dump(Illuminate\Support\Facades\Schema::hasTable('users_token'));
});
