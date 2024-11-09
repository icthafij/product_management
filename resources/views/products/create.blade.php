<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
</head>
<body>
<h1>Create New Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" id="product_id" placeholder="Product ID" required>
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Name" required>
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" placeholder="Price" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" placeholder="Description"></textarea>
    </div>
    <div>
        <button type="submit">Create</button>
    </div>
</form>
</body>
</html>
