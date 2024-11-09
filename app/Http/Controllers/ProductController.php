<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        // Simple search by product_id or description
        if ($search = $request->input('search')) {
            $products->where('product_id', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        // Simple sorting by a field
        if ($sort = $request->input('sort')) {
            $order = $request->input('order', 'asc'); // Default order is ascending
            $products->orderBy($sort, $order);
        }

        return view('products.index', ['products' => $products->paginate(10)]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function show($id)
    {
        return view('products.show', ['product' => Product::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('products.edit', ['product' => Product::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index');
    }
}
