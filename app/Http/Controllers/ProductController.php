<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->with('categories')
            ->orderByDesc('created_at')
            ->paginate();

        return view('products.index', [
            'products' => $products,
            'view' => 'index'
        ]);

    }
}