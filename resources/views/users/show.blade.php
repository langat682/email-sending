@extends('users.layout')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-4">
            <div class="pull-left">
                <h6> Show User</h6>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>

    </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Name:</label>
                {{ $users->name }}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email:</label>


                {{ $users->email }}

            </div>
        </div>

        </div>
    </div>

</div>
@endsection




