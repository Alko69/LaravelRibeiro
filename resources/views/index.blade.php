@section('title')
Accueil
@endsection
@include('layouts.header')
<<<<<<< HEAD


=======
<p>ID utilisateur: {{ $_COOKIE['userId'] }}</p>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
>>>>>>> 6dc821f9660b96c8441a51d8d5d765bc115e1571
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
            <div class="image-description mb-3">
                <img src="test" alt="Test">
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
