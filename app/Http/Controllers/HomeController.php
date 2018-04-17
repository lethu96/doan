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
        $data1=Product::where('type_id', '=', 1)->paginate(4);
        $data2=Product::where('type_id', '=', 2)->paginate(4);
        $data3=Product::where('type_id', '=', 3)->paginate(4);
        return view('client.index',['data' => $data ,'data1' => $data1, 'data2' => $data2,'data3' => $data3,'cate' => $cate]);
    }
    public function shownav()
    {
        $product=Product::all()->toArray();
        return view('client.nav',['product' => $product]);
    }

    public function showDetail($id)
    {
        $product = Product::find($id)->toArray();
        $cate = TypeProduct::all()->toArray();
        $data=Product::all()->toArray();
        return view('product.detail',['product' => $product, 'data' => $data, 'cate' => $cate]);
    }
        public function typeProduct($id)
    {
        $type = Product::where('type_id', '=', $id)->paginate(4);
        $cate = TypeProduct::all()->toArray();
        $data=Product::all()->toArray();
        return view('product.typeproduct',['type' => $type, 'data' => $data, 'cate' => $cate]);
    }

}
