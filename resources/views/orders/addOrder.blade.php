@section('title')
Choose quantity
@endsection
@include('layouts.header')
@include('layouts.head')

<div class="page">

    <form id="quantity" action="{{ route('ordersProduct.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_name">Product</label>
            <p id="product_name">{{ $product->name }}</p>
        </div>
        <div class="row">
            <div class="form-group col-md-1">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
            </div>
        </div>
        <!-- Add a hidden field for the product ID -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="product_price" value="{{ $product->price }}">
        <!-- Add a submit button to add the product to the cart -->
        <button class="btn btn-success"type="submit" >Add to Cart</button>
    </form>

</div>

