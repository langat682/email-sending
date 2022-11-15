@extends('layouts.app')

@section('content')


<h1 class="text-center">Contact Us</h1>
<hr>


<div class="container mt-2 mb-3 pd-2">


    <form action="{{ route('store.user.email', $data->id) }}" method="POST">
        @csrf
        <div class="form-group mt-2 mb-2 pd-2">
            <label for="Greeting">Greeting</label>
            <input type="text" style="border-radius:20px "  class="form-control" name="greeting" required placeholder="Greeting">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="Body">Body</label>
            <input type="text" style="border-radius:20px "  class="form-control" name="body" required placeholder="Body">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="actiontext">Action text</label>
            <input type="text" style="border-radius:20px "  class="form-control" name="actiontext" required placeholder="Action text">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="actionurl">Action url</label>
            <input type="text" style="border-radius:20px "  class="form-control" name="actionurl" required placeholder="Action url">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="endText">End text</label>
            <input type="text" style="border-radius:20px" class="form-control" name="endtext" required placeholder="End text">
        </div>


        <button type="submit" style="border-radius:20px "  class="btn btn-success">Submit</button>

    </form>
</div>

@endsection
