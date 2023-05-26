@section('title')
Produits
@endsection
@include('layouts.header')

<div class="container mt-2">
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
                        {{var_dump($product->pivot->id)}}
                        <form action="{{ route('ordersProduct.destroy', $product->pivot->id) }}" method="POST">
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
</div>
@include('layouts.footer')
