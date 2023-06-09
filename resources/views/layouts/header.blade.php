<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('layouts.head')
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">
                            <img src="/medias/logo.jpg" width="40" height="40" alt="img logo projet">
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/rgpd">RGPD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>
                    @if(!$user)
                    <li class="nav-item">
                        <a class="nav-link" href="/connexion">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/signup">Sign up</a>
                    </li>
                    @endif
                    @if ($user && $user->role =="admin")
                    <li class="nav-item">
                        <a class="nav-link" href="/users">Users</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        
                        <a class="nav-link" href="/orders"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    </li>
                    @if($user)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Sign Out</a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>