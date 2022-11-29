@extends('layouts.app')

@section('content')




<hr>


<div class="container">

<div class="row">
    <div class="col-6 offset-md-3 mt-4">
        <h4>Contact Us </h4>
    </div>

    <form action="{{ route('store.user.email', $data->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Name:</label>
            <input type="text" style="border-radius:20px "  class="form-control" name="greeting" required placeholder="Greeting">
        </div>

        <div class="form-group">
            <label for="">Email:</label>
            <input type="text" style="border-radius:20px" class="form-control" name="email" required placeholder="Enter your Email" value="{{ old('email')}}">

            @error('name') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label for="">Subject:</label>
            <input type="text" style="border-radius:20px "  class="form-control" name="subject" required placeholder="Subject">

            @error('name') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label for="">Message:</label>
            <textarea name="text" style="border-radius:20px "  class="form-control" cols="4" rows="4">
                {{ old ('message')}}</textarea>
            @error('name') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <button type="submit" style="border-radius:20px "  class="btn btn-success">Submit</button>
      </form>
    </div>
</div>

@endsection
