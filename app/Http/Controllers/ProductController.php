<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;



class ProductController extends Controller
{
    public function index()
    {
        // Logic for listing products
    }

    public function show($id)
    {
        // Logic for displaying a single product
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('update-product', $product);
         // Logic to find the product by ID and authorize the update
    }
    // Add more methods for create, update, delete, etc.
}
