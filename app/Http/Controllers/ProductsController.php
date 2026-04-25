<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductsController extends Controller
{
    public function index(): View
    {
        return view('products.index');
    }

    public function sarathios(): View
    {
        return view('products.sarathios');
    }

    public function hsios(): View
    {
        return view('products.hsios');
    }

    public function handlelife(): View
    {
        return view('products.handlelife');
    }
}
