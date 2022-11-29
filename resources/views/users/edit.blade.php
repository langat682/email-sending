@extends('users.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">

            @if (session('status'))
               <h6 class="alert alert-success">{{ session('status')}}</h6>
            @endif

            <div class="card">
               <div class="card-header">
                   <h6>Edit & Update users
                       <a href="{{ route('users.index')}}" style="border-radius:20px" class="btn btn-danger float-end">BACK</a>
                    </h6>
                </div>
            <div class="card-body">

                    <form action="{{ url('users.update',$user->id)}}"method="POST">
                      @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <strong for="">Name:</strong>
                            <input type="text" style="border-radius:20px" name="name" value="{{$user->name }}"class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <strong for="">Email:</strong>
                            <input type="text" style="border-radius:20px" name="email" value="{{$user->email}}" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                          <button type="submit" style="border-radius:20px" class="btn btn-primary">Update User</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
