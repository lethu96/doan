<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TypeProduct;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function showHome()
    {
        $cate=TypeProduct::all()->toArray();
        $data=Product::all()->toArray();
        return view('client.index',['data' => $data, 'cate' => $cate]);
    }
    public function shownav()
    {
                $product=Product::all()->toArray();
        return view('client.nav',['product' => $product]);
    }
}
