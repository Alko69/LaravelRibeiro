@section('title')
Sign up
@endsection
@include('layouts.header')
@include('layouts.head')

@section('content')

<script>
    function verifierCase() {
      var checkBox = document.getElementById("maCase");
      var bouton = document.getElementById("monBouton");

      if (checkBox.checked == false) {
        bouton.disabled = true;
      } else {
        bouton.disabled = false;
      }
    }
  </script>
<main class="container" style="max-width: 500px">

    <h1>Sign up</h1>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
            @error('password')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="maCase" onchange="verifierCase()">
            <label class="form-check-label" for="exampleCheck1">I accept the terms of use</label>
        </div>

        <button type="submit" class="btn btn-primary" id="monBouton" disabled>Submit</button>
<<<<<<< HEAD
=======

>>>>>>> clc
    </form>
</main>