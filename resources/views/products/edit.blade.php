<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
<h1>Edit Product</h1>

<!-- Edit Product Form -->
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Product ID -->
    <div>
        <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" id="product_id" value="{{ $product->product_id }}" required>
    </div>

    <!-- Product Name -->
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
    </div>

    <!-- Product Price -->
    <div>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="{{ $product->price }}" required>
    </div>

    <!-- Product Description -->
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $product->description }}</textarea>
    </div>

    <!-- Update Button -->
    <div>
        <button type="submit">Update</button>
    </div>
</form>

</body>
</html>

