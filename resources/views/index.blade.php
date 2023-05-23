<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PBC</title>

    <!-- Fonts -->
    @include('layouts.head')
</head>

<body class="antialiased">
    @include('layouts.header')
    <div class="container products-wrapper">
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                One of three columns
            </div>
            <div class="col-12 col-lg-4 text-center">
                One of three columns
            </div>
            <div class="col-12 col-lg-4 text-center">
                One of three columns
            </div>
        </div>
        <div class="row mt-3">
            <div class="description mb-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, ipsum vero nisi optio maiores beatae. Esse
                libero ducimus dolorum architecto quasi, quidem est, blanditiis iusto veritatis nihil eius, excepturi autem.
            </div>
            <div class="image-description mb-3">
                <img src="test" alt="Test">
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-center"><img src="Instagram" alt="Instagram"></div>
            <div class="col-4 text-center"><img src="Youtbue" alt="Youtube"></div>
            <div class="col-4 text-center"><img src="Twitter" alt="Twitter"></div>
        </div>
        
    </div>
    
</body>
<footer class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center">menu footer</div>
            <div class="col-lg-8 text-center">
                map google
            </div>
        </div>
        <div class="row text-center">
            <p>Copiright 2023</p>
        </div>
    </div>
</footer>

</html>
