@extends('layouts.app')

@section('content')


<h4 class="text-center">clients</h4>
<hr>

<div class="mt-2 mb-2 pd-2">

    <a href="{{ route('users.create') }}" class="btn btn-primary ">Add New</a>

       <br>
    <table class="table table-border">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Email</th>
            <th scope="col">Send Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)

            <tr>
                <th scope="row">{{$user->id }}</th>
                <td>{{$user->name }}</td>
                <td>{{$user->email }}</td>
                <td>
                   <a href="{{ route('send.email.view', $user->id) }}" class="btn btn-success">Send Emails<a/>

                </td>
                <td>

                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>


                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
              </tr>

            @endforeach

        </tbody>
      </table>
      <a href="{{ route('send.email.view.all') }}" class="btn btn-primary">Send Email To All Clients</a>
</div>

@endsection
