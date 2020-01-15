<?php

namespace App\Services;

use App\Product;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\type;

class ProductService
{
    public static function compareProducts($names){
        $products = Product::whereIn('slug', $names)->get();
        $comparedProducts  = [];

        foreach ($products as $product) {
            $attributes = $product->content;
            $media = $product->media;
            $productArray = $product->toArray();

            unset($productArray['content']);
            $comparedProducts[] = [
                'product' => $productArray,
                'attributes' => $attributes,
                'media' => $media,
                'isEmbroidery' => $product->hasCategory('embroidery')
            ];
        }

        return $comparedProducts;
    }
}