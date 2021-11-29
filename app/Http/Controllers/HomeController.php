<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index():View
    {
        $productService = new ProductService(new Product());
        $products = $productService->getProductsForHomePage();

        return view('front.index', compact('products'));
    }


    public function withoutRegister()
    {
        Session::put('withoutRegistration', true);

        return redirect()->back();
    }
}
