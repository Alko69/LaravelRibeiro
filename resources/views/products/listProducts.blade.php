@section('title')
Produits
@endsection
@include('layouts.header')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="products/create"> Add a product</a>
            </div>
        </div>
    </div>

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
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ Str::limit($product->description, 30) }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <a class="btn btn-primary" href="{{ route('products.show', $product->id) }}">Show</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@include('layouts.footer')
