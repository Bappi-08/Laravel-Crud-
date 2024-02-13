@extends('layouts.masters')

@section('bappi')


<div class="row d-flex justify-content-center my-3">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href=" {{ url('user/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="card-body">
                @if(session()->get('a'))
                <p class="alert alert-success">{{ session()->get('a') }}</p>
                @endif
                <div class="table-responsive"
            >
                <table
                    class="table table-hover"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">updated_at</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                       
                            
               
                        <tr class="">
                            <td scope="row">{{ $user->id }}</td>
                            <td scope="row">{{ $user->name }}</td>
                            <td scope="row">{{ $user->email }}</td>
                            <td scope="row">{{ $user->phone_number }}</td>
                            <td scope="row">{{ $user->created_at }}</td>
                            <td scope="row">{{ $user->updated_at }}</td>
                            <td> 
                                <a href="{{ url("/user/$user->id/show") }}" class="btn btn-info">Show</a>
                                <a href="{{ url("/user/$user->id/edit") }}" class="btn btn-primary">Edit</a>
                                <a href="{{ "/user/$user->id/delete" }}" class="btn btn-danger">Delete</a>

                            </td>
                           
                        </tr>
                     
                        @endforeach
                    </tbody>
                </table>
            </div>
            

            </div>
        </div>
       

    </div>



</div>
@endsection