<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ProductFeedService
{
    protected static function loadFeed(): ?\SimpleXMLElement
    {
        $path = base_path('products_feed.xml');
        if (!File::exists($path)) {
            return null;
        }

        return simplexml_load_file($path) ?: null;
    }

    public static function loadProducts(): array
    {
        $xml = static::loadFeed();
        if (!$xml) {
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
                'category_id' => (string) $offer->categoryId,
                'name' => (string) $offer->name,
                'name_ua' => (string) $offer->name_ua,
                'vendor' => (string) $offer->vendor,
                'description' => (string) $offer->description,
                'pictures' => array_map('strval', array_values(iterator_to_array($offer->picture))),
            ];
        }

        return $products;
    }

    public static function loadCategories(): array
    {
        $xml = static::loadFeed();
        if (!$xml) {
            return [];
        }

        $categories = [];
        foreach ($xml->shop->categories->category ?? [] as $cat) {
            $categories[] = [
                'id' => (string) $cat['id'],
                'parent_id' => isset($cat['parentId']) ? (string) $cat['parentId'] : null,
                'name' => (string) $cat,
            ];
        }

        return $categories;
    }
}
