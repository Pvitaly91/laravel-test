<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Services\ProductFeedService;

class ProductController extends Controller
{

    public function index()
    {
        $products = ProductFeedService::loadProducts();
        $categories = ProductFeedService::loadCategories();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'breadcrumbs' => [
                ['label' => 'Головна', 'url' => url('/')],
                ['label' => 'Товари'],
            ],
        ]);
    }

    public function show($id)
    {
        $products = Collection::make(ProductFeedService::loadProducts());
        $product = $products->firstWhere('id', $id);

        abort_unless($product, 404);

        $categories = ProductFeedService::loadCategories();

        return view('products.show', [
            'product' => $product,
            'categories' => $categories,
            'breadcrumbs' => [
                ['label' => 'Головна', 'url' => url('/')],
                ['label' => 'Товари', 'url' => route('products.index')],
                ['label' => $product['name_ua'] ?: $product['name']],
            ],
        ]);
    }
}
