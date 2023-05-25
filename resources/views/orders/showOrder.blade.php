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
            <th>description</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            @if ($order->user_id == )
                @foreach ($order_product as $order_product)
                    @if ($order_product->order_id == $order->id)
                        @foreach ($products as $product)
                            @if ($product->id == $order_product->product_id)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $order_product->product_price }}</td>
                                    <td>{{ $order_product->quantity }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@include('layouts.footer')
