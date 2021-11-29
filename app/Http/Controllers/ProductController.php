<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $sort = $request->sort;
        $products = $this->productService->getAllProductsPaginate(12, $sort);
        $categories = Category::with('products')->get();

        return view('front.products.index', compact('products', 'categories'));
    }

    public function viewDetail(Request $request, $slug)
    {
        $product = $this->productService->getBySlugWithRelation($slug);

        return view('front.products.detail', compact('product'));
    }
}
