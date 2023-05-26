<form action="{{ route('ordersProduct.store') }}" method="POST">
    @csrf
    <!-- Add form fields for product selection and quantity -->
    <div class="form-group">
        <label for="product_id">Product</label>
        <select name="product_id" id="product_id" class="form-control">
            <!-- Render product options -->
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
    </div>
    <!-- Add a submit button to add the product to the cart -->
    <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>
