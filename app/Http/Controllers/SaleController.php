<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class SaleController extends Controller
{
    public function index()
    {
        $data=Sale::all()->toArray();
        return view('admin.sale.index',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $sale = Sale::find($data['id']);
        $sale->code = $data['code'];
        $sale->type = $data['type'];
        $sale->status = $data['status'];
        $sale->save();
        return redirect('/sale')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function getStore(Request $request)
    {
        return view('admin.sale.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $newsale = new Sale();
        $newsale->code = $data['code'];
        $newsale->type = $data['type'];
        $newsale->status = $data['status'];
        $newsale->save();
        return redirect('/sale')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function show($id)
    {
        $data = Sale::find($id)->toArray();
        return view('admin.sale.update',['id'=>$id,'data'=>$data]);
    }

    public function destroy($id)
    {
        $val =Sale::find($id);
        $val->delete();
         return redirect('/sale')->with(['message'=>' xoá thành công']);
    }
}