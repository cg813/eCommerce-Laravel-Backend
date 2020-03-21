<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($request->all(), 201);
    }

    public function delete(Request $request, $id)
    {
        $client = Product::findOrFail($id);
        $client->delete();

        return 204;
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return $product;
    }
}
