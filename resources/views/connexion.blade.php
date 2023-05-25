@section('title')
Connexion
@endsection
@include('layouts.header')
@include('layouts.head')



@section('content')

<main class="container" style="max-width: 500px">

    <h1>Connexion</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Adresse e-mail</label>
            <input id="email" type="email" name="email" required autofocus>
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <button type="submit">Se connecter</button>
        </div>
        @if($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
        @endif

    </form>

</main>