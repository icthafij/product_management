<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// All product-related routes handled by ProductController
Route::resource('products', ProductController::class);

// Default route (optional, replace it with your desired homepage later)
Route::get('/', function () {
    return view('welcome'); // Or create a custom home view
});
