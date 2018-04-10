<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProduct;

class TypeProductController extends Controller
{
    public function index()
    {
        $data=TypeProduct::all()->toArray();
        return view('admin.typeproduct.typeproduct',['data'=>$data]);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        $typeProduct = TypeProduct::find($data['id']);
        $typeProduct->name = $data['name'];
        $typeProduct->description = $data['description'];
        $typeProduct->status = $data['status'];
        $typeProduct->save();
        return redirect('/typeproduct')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function getStore(Request $request)
    {
        return view('admin.typeproduct.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $newTypeProduct = new TypeProduct();
        $newTypeProduct->name = $data['name'];
        $newTypeProduct->description = $data['description'];
        $newTypeProduct->status = $data['status'];
        $newTypeProduct->save();
        return redirect('/typeproduct')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function show($id)
    {
        $data = TypeProduct::find($id)->toArray();
        return view('admin.typeproduct.update',['id'=>$id,'data'=>$data]);
    }

    public function destroy($id)
    {
        $val =TypeProduct::find($id);
        $val->delete();
         return redirect('/typeproduct')->with(['message'=>' xoá thành công']);
    }
}
