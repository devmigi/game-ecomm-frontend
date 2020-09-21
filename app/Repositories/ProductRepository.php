<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(){
        $products = Cache::rememberForever('products.all', function () {
            return Product::with(['images.image', 'attributes', 'category'])->get();
        });

        return $products;
    }


    public function getById($id){
        $product = Cache::rememberForever("products.{$id}", function () use ($id) {
            return Product::where('id', $id)->with(['images.image', 'attributes', 'category'])->first();
        });

        return $product;
    }


    public function getBySlug($categorySlug, $productSlug){
        $product = Cache::rememberForever("products.{$categorySlug}-{$productSlug}", function () use ($categorySlug, $productSlug) {
            $category = Category::where('slug', $categorySlug)->first();

            $productData = Product::where('slug', $productSlug)->where('category_id', $category->id)
                ->with(['images.image', 'attributes', 'category'])->first();

            return $productData;
        });

        return $product;
    }


    public function getVersions($id){
        $products = Cache::rememberForever("products.{$id}-versions", function () use ($id) {
            $product = Product::find($id);
            return Product::where('parent_id', $product->parent_id)->where('id', '<>', $id)->with('category')->get();
        });

        return $products;
    }
}