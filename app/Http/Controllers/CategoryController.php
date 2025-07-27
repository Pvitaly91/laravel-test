<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Services\ProductFeedService;

class CategoryController extends Controller
{
    public function show($id)
    {
        $products = collect(ProductFeedService::loadProducts())
            ->where('category_id', $id)
            ->values()
            ->all();

        $categories = ProductFeedService::loadCategories();
        $category = collect($categories)->firstWhere('id', $id);

        abort_unless($category, 404);

        return view('categories.show', [
            'category' => $category,
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
