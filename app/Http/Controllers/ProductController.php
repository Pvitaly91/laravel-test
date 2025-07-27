<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    protected function loadProducts(): array
    {
        $path = base_path('products_feed.xml');
        if (! File::exists($path)) {
            return [];
        }

        $xml = simplexml_load_file($path);
        if (! $xml) {
            return [];
        }

        $offers = $xml->shop->offers->offer ?? [];
        $products = [];
        foreach ($offers as $offer) {
            $products[] = [
                'id' => (string) $offer['id'],
                'available' => (string) $offer['available'] === 'true',
                'url' => (string) $offer->url,
                'price' => (string) $offer->price,
                'currency' => (string) $offer->currencyId,
                'name' => (string) $offer->name,
                'name_ua' => (string) $offer->name_ua,
                'vendor' => (string) $offer->vendor,
                'description' => (string) $offer->description,
                'pictures' => array_map(
                    'strval',
                    array_values(iterator_to_array($offer->picture))
                ),
            ];
        }

        return $products;
    }

    public function index()
    {
        $products = $this->loadProducts();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function show($id)
    {
        $products = Collection::make($this->loadProducts());
        $product = $products->firstWhere('id', $id);

        abort_unless($product, 404);

        return view('products.show', [
            'product' => $product,
        ]);
    }
}
