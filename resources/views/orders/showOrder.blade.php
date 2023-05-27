@section('title')
Cart
@endsection
@include('layouts.header')
@include('layouts.head')
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this item?");
    }
</script>

<div class="container mt-2">
    @if ($user)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                @if ($order->user_id == auth()->id())
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->product_price }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <form action="{{ route('ordersProduct.destroy', $product->pivot->id) }}" onsubmit="return confirmDelete();" method="POST">
                                <td><a class="btn btn-primary" href="{{ route('products.show', $product->id) }}">Show</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                            
                        </tr>
                    @endforeach
                @endif
            @endforeach
            </tbody>
        </table>
    @else
        <h2 id="noLogIn">Please log in to view the cart.</h2>
    @endif
    
</div>
@include('layouts.footer')
