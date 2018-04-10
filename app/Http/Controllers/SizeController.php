<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;

class SizeController extends Controller
{
    public function index()
    {
        $data=Size::all()->toArray();
        return view('admin.size.index',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $size = Size::find($data['id']);
        $size->name = $data['name'];
        $size->description = $data['description'];
        $size->save();
        return redirect('/size')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function getStore(Request $request)
    {
        return view('admin.size.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $newsize = new Size();
        $newsize->name = $data['name'];
        $newsize->description = $data['description'];
        $newsize->save();
        return redirect('/size')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function show($id)
    {
        $data = Size::find($id)->toArray();
        return view('admin.size.update',['id'=>$id,'data'=>$data]);
    }

    public function destroy($id)
    {
        $val =Size::find($id);
        $val->delete();
         return redirect('/size')->with(['message'=>' xoá thành công']);
    }
}
