<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show(Request $request, $categorySlug, $productSlug){

        $product = $this->productRepository->getBySlug($categorySlug, $productSlug);

        $productVersions = $this->productRepository->getVersions($product->id);

        return view('pages.product', ['product' => $product, 'productVersions' => $productVersions]);
    }

}
