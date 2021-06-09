<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateProductRequest;
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

    public function create() //funcion para crear producto. Al igual que se crea en el controlador UserController.
    {
        return $this->form('products.create', new Product());
    }

    public function store(CreateProductRequest $request)
    {
        $request->createProduct();

        return redirect()->route('products.index');
    }

    public function form($view, Product $product) //pasamos informacion a la vista.
    {
        return view($view, [
            'product' => $product,
            'categories' => Category::get(),
        ]);
    }
}