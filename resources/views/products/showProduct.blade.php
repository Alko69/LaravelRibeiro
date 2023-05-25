@section('title')
    Detail of {{ $product->name }}
@endsection
@include('layouts.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Product : {{ $product->name }}</h1>
            <p style="max-width: 100%">
                <span id="description" style="word-break:break-all;">{{ substr($product->description, 0, 50) }}</span>
                @if (strlen($product->description) > 50)
                  <a href="#" class="read-more" onclick="toggleDescription()">Read More</a>
                @endif
              </p>
              
              <script>
                var descriptionElement = document.getElementById('description');
                var originalDescription = '{{ $product->description }}';
                var isExpanded = false;
              
                function toggleDescription() {
                  if (isExpanded) {
                    descriptionElement.innerText = originalDescription.substring(0, 50) + '...';
                    document.getElementsByClassName('read-more')[0].innerText = 'Read More';
                    isExpanded = false;
                  } else {
                    descriptionElement.innerText = originalDescription;
                    document.getElementsByClassName('read-more')[0].innerText = 'Read Less';
                    isExpanded = true;
                  }
                }
              </script>
              
              

            <p>Price: ${{ $product->price }}</p>
            <!-- Display other product details as necessary -->
            <div class="pull-right mb-2">
                <a class="btn btn-success" href=""> Add to card</a>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')