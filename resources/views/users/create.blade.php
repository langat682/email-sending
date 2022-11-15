@extends('users.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h6 >Add New Client</h6>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
<div class="table table-borderd ">
    <div class="row col-md-3 text-centered">
        <div class="row">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" style="border-radius:20px"  name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <strong>Email:</strong>
                <textarea class="form-control" style="height:10px" name="email" placeholder="Email"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <strong>password:</strong>
                <input type="text" style="border-radius:20px"  class="form-control"  name="password" placeholder="password"></textarea>
            </div>
        </div>

        <div class="row">
                <button type="submit" style="border-radius:20px"  class="btn btn-primary">Submit</button>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

</form>
@endsection
