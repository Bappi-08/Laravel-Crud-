@extends('layouts.masters')

@section('bappi')

<div class="row d-flex justify-content-center my-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Create a New User <span class="text-info">
               
            </div>
            <div class="card-body">

            

                <form action="{{ url('user/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone number</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                        @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" ">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" ">
                      
                    </div>
                    <button type="submit" class="btn btn-primary">Add new</button>
                    <a href="{{ url('users') }}" class="btn btn-warning ">Back to usser list</a>




                </form>


               
                </div>
            </div>
        </div>
            </div>
            </div>



@endsection