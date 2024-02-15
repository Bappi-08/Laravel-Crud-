<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home',function()
{       
    return view('home');


});
Route::get('/profile',function()
{
    return view('profile');
});
Route::get('/layouts.masters',function()
{

});
Route::get('/users',[UserController::class,'index']);
Route::get('/user/{id}/show',function($id)
{   
    $user=User::findOrFail($id);
    return view('layouts.pages.user_details',compact('user'));

});
Route::get('user/create',[UserController::class,'create']);

Route::post('user/store', [UserController::class,'store']);
Route::get('/user/{id}/edit',[UserController::class,'edit']);
 
   


Route::post('user/update/{id}', [UserController::class,'update']);
Route::get('/user/{id}/delete',[UserController::class,'destroy']);
