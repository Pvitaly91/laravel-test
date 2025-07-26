<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from products_feed.xml';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = base_path('products_feed.xml');
        if (! file_exists($path)) {
            $this->error('products_feed.xml not found');
            return Command::FAILURE;
        }

        $xml = simplexml_load_file($path);
        if (! $xml) {
            $this->error('Unable to parse XML');
            return Command::FAILURE;
        }

        // import categories
        if (isset($xml->shop->categories->category)) {
            foreach ($xml->shop->categories->category as $categoryNode) {
                \App\Models\Category::updateOrCreate(
                    ['id' => (int) $categoryNode['id']],
                    [
                        'parent_id' => $categoryNode['parentId'] ? (int) $categoryNode['parentId'] : null,
                        'name' => trim((string) $categoryNode),
                    ]
                );
            }
        }

        // import offers
        if (isset($xml->shop->offers->offer)) {
            foreach ($xml->shop->offers->offer as $offer) {
                $pictures = [];
                foreach ($offer->picture as $pic) {
                    $pictures[] = (string) $pic;
                }

                $params = [];
                foreach ($offer->param as $param) {
                    $params[(string) $param['name']] = trim((string) $param);
                }

                \App\Models\Product::updateOrCreate(
                    ['xml_id' => (int) $offer['id']],
                    [
                        'available' => ((string) $offer['available']) === 'true',
                        'url' => (string) $offer->url,
                        'price' => (float) $offer->price,
                        'currency' => (string) $offer->currencyId,
                        'category_id' => (int) $offer->categoryId,
                        'pictures' => $pictures,
                        'pickup' => $offer->pickup ? ((string) $offer->pickup) === 'true' : null,
                        'delivery' => $offer->delivery ? ((string) $offer->delivery) === 'true' : null,
                        'name' => (string) $offer->name,
                        'name_ua' => (string) $offer->name_ua ?: null,
                        'vendor' => (string) $offer->vendor ?: null,
                        'description' => (string) $offer->description ?: null,
                        'description_ua' => (string) $offer->description_ua ?: null,
                        'params' => $params ?: null,
                    ]
                );
            }
        }

        $this->info('Import completed');
        return Command::SUCCESS;
    }
}
