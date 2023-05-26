@section('title')
Connexion
@endsection
@include('layouts.header')
@include('layouts.head')



@section('content')

<main class="container" style="max-width: 500px">

    <h1>Sign in</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" >
            @error('email')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            @error('password')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" id="monBouton" >Submit</button>
        </div>
        @if($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
        @endif

    </form>

</main>