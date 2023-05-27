@section('title')
Accueil
@endsection
@include('layouts.header')
@include('layouts.head')


<body class="antialiased">
    <div class="container products-wrapper">
        <div class="row">
            <h2 class="text-center">Nos nouveaux produits</h2>
            <div class="col-12 col-lg-4 text-center">
                <img src="/medias/alternateur.jpg" alt="alternateur">
            </div>
            <div class="col-12 col-lg-4 text-center">
                <img src="/medias/bougie.jpg" alt="Bougie">
            </div>
            <div class="col-12 col-lg-4 text-center">
                <img src="/medias/villebrequin.jpg" alt="Villebrequin">
            </div>
        </div>
        <div class="row mt-3">
            <div class="description mb-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, ipsum vero nisi optio maiores beatae. Esse
                libero ducimus dolorum architecto quasi, quidem est, blanditiis iusto veritatis nihil eius, excepturi autem.
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-center"><i class="fa-brands fa-facebook"></i></div>
            <div class="col-4 text-center"><i class="fa-brands fa-youtube"></i></div>
            <div class="col-4 text-center"><i class="fa-brands fa-twitter"></i></div>
        </div>
        
    </div>
</body>
@include('layouts.footer')
