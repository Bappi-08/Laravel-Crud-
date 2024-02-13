<?php

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
Route::get('/users',function()

{   $users=User::all();
    
    
    
    return view('/layouts.pages.users',compact('users'));
});
Route::get('/user/{id}/show',function($id)
{   
    $user=User::findOrFail($id);
    return view('layouts.pages.user_details',compact('user'));

});
Route::get('user/create',function()
{   return view ('layouts.pages.user_create');

});

Route::post('user/store', function (Request $request) {  
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'phone_number' =>'required|numeric',
    ]);

    if ($validator->fails()) {
        return redirect('/user/create')
            ->withErrors($validator)
            ->withInput();
    }

   

   // $filepath = $request->image->storeAs('uploads',  $request->image->getClientOriginalName());


    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;
    $user->password = bcrypt($request->password);
  //  $user->image = $filepath;  // Corrected line
    $user->save();

    return redirect()->to('/users')->with('a', 'User created successfully');
});
Route::get('/user/{id}/edit',function($id)
{   
    $user=User::findOrFail($id);
    return view('layouts.pages.user_edit',compact('user'));

});
Route::post('user/update/{id}', function (Request $request,$id){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'phone_number' =>'required|numeric',
    ]);

    if ($validator->fails()) {
        return redirect('/user/$id/edit')
            ->withErrors($validator)
            ->withInput();
    }

   
    $user=User::find($id);
    $user->name=$request->name;
    $user->name=$request->email;
    $user->password=bcrypt($request->password);
    $user->save();
    
    return redirect()->to('/users')->with('a', 'User updated  successfully');



});
Route::get('/user/{id}/delete',function($id)
{   
   $user=User::find($id);
    $user->delete();
    return redirect()->to('/users')->with('a', 'Userd deleted  successfully');

});