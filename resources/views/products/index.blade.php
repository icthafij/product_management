<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
</head>
<body>
<h1>Products List</h1>

<!-- Search and Sorting Form -->
<form method="GET" action="{{ route('products.index') }}">
    <!-- Search Input -->
    <input type="text" name="search" placeholder="Search..." value="{{ request()->get('search') }}">

    <!-- Sorting Links -->
    <div>
        <a href="{{ route('products.index', ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
            Sort by Name
        </a>
        <a href="{{ route('products.index', ['sort' => 'price', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
            Sort by Price
        </a>
    </div>

    <button type="submit">Search</button>
</form>

<!-- Products List -->
@foreach ($products as $product)
    <div>
        <p>{{ $product->name }} - ${{ $product->price }}</p>
        <a href="{{ route('products.show', $product->id) }}">View</a>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
        </form>
    </div>
@endforeach

<!-- Pagination Links -->
{{ $products->links() }}
</body>
</html>
