<?php

namespace App\Services;

use App\Entity;
use App\ProductCategory;

class ProductCategoryService
{
    public static function getProductCategories()
    {
        $categories = ProductCategory::with('products')->get();
        // Map the region data to the model
        $all = $categories->map(function ($item) {
            foreach ($item['products'] as $k => $product) {
                $prodObj = Entity::find($product['id']);
                $item['products'][$k]['countries'] = $prodObj ? $prodObj->countries->toArray() : [];
            }

            return $item;
        });

        return $all->toArray();
    }
}
