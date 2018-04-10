<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TypeProduct;
use App\Size;
use App\Color;

class ProductController extends Controller
{
    public function index()
    {
        $data=Product::all()->toArray();
        return view('admin.product.index',['data'=>$data]);
    }

    public function productTop()
    {
        $topProduct = Product::where('status', 1)->get()->toArray();
        return view('client.index',['topProduct'=> $topProduct]);
    }

    public function productDetail($id)
    {
        $product = Product::find($id)->toArray();
        return view('product.detail',['product' => $product]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $product = Product::find($data['id']);
        $product->name = $data['name'];
        $product->type_id = $data['type_id'];
        $product->title = $data['title'];
        $product->size_id = $data['size_id'];
        $product->color_id = $data['color_id'];
        $product->price = $data['price'];
        $product->sum = $data['sum'];
        $product->description = $data['description'];
        if ($request->hasFile('image')) 
        {
            $file = $request->image;
            $file->move("img", $file->getClientOriginalName());
            $product->image = $file->getClientOriginalName();
        }
        $product->save();
        return redirect('/product')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function getStore(Request $request)
    {
        $typeProduct = TypeProduct::all();
        $size = Size::all();
        $color = Color::all();
        return view('admin.product.create',['typeProduct' => $typeProduct,'size' => $size, 'color' => $color]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product = new Product();
        $product->name = $data['name'];
        $product->type_id = $data['type_id'];
        $product->title = $data['title'];
        $product->size_id = $data['size_id'];
        $product->color_id = $data['color_id'];
        $product->price = $data['price'];
        $product->sum = $data['sum'];
        $product->description = $data['description'];
        if ($request->hasFile('image')) 
        {
            $file = $request->image;
            $file->move("img", $file->getClientOriginalName());
            $product->image = $file->getClientOriginalName();
        }
        $product->save();
        return redirect('/product')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function show($id)
    {
        $data = Product::find($id)->toArray();
        $typeProduct = TypeProduct::all();
        $size = Size::all();
        $color = Color::all();
        return view('admin.product.update',['id'=>$id,'data'=>$data, 'typeProduct' => $typeProduct,'size' => $size, 'color' => $color]);
    }

    public function destroy($id)
    {
        $val =Product::find($id);
        $val->delete();
         return redirect('/product')->with(['message'=>' xoá thành công']);
    }
}