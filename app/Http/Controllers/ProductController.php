<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sortable;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Sortable $sortable)
    {
        $products = Product::query()
            ->with('categories')
            ->applyFilters()
            ->orderByDesc('created_at')
            ->paginate();

        $sortable->appends($products->parameters());

        return view('products.index', [
            'products' => $products,
            'view' => 'index',
            'sortable' => $sortable,
        ]);

    }
}