<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users=User::all();
       return view('/layouts.pages.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    
       
{   return view ('layouts.pages.user_create');

}
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    
       
    
    
    
        $user = new User();
       $fileName= time().'_'.$request->image->getClientOriginalName();
       $filepath=$request->image->storeAs('uploads',$fileName);
     // $imagePath=$request->file('image');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = bcrypt($request->password);
       // $user->image = $request->image;
       $user->image = $filepath;
     //  $user->image = $imagePath;  // Corrected line
        $user->save();
    
        return redirect()->to('/users')->with('a', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('layouts.pages.user_edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->to('/users')->with('a', 'Userd deleted  successfully');
    }
}
