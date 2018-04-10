<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    public function index()
    {
        $data=Color::all()->toArray();
        return view('admin.color.index',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $color = Color::find($data['id']);
        $color->name = $data['name'];
        $color->description = $data['description'];
        $color->save();
        return redirect('/color')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function getStore(Request $request)
    {
        return view('admin.color.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $newcolor = new Color();
        $newcolor->name = $data['name'];
        $newcolor->description = $data['description'];
        $newcolor->save();
        return redirect('/color')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function show($id)
    {
        $data = Color::find($id)->toArray();
        return view('admin.color.update',['id'=>$id,'data'=>$data]);
    }

    public function destroy($id)
    {
        $val =Color::find($id);
        $val->delete();
         return redirect('/color')->with(['message'=>' xoá thành công']);
    }
}
