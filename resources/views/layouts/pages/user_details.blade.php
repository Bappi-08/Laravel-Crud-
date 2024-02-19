@extends('layouts.masters')

@section('bappi')

<div class="row d-flex justify-content-center my-3">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>User Deatils For <span class="text-info">
                {{ $user->name }}    
                </span></h4>
            </div>
            <div class="card-body">


                <table class="table">

                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>

                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>

                    </tr>
                    <tr>
                        <th>Phone Numbner</th>
                        <td>{{ $user->phone_number }}</td>

                    </tr>
                    <tr>
                        <th>Created_at</th>
                        <td>{{ $user->created_at }}</td>

                    </tr>
                    <tr>
                        <th>Updated AT</th>
                        <td>{{ $user->updated_at }}</td>

                    </tr>
                    <tr>
                   
                        <img src="{{ asset('storage/'.$user->image) }}" alt=""  width="200">
                        
                        

                    </tr>
              
              
                </table>

                </div>
            </div>
        </div>
            </div>
            </div>

           
@endsection