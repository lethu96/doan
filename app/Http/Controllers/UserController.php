<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $data=User::all()->toArray();
        return view('admin.user.index',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['id']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->birthday = $data['birthday'];
        $user->phone = $data['phone'];
        $user->gender = $data['gender'];
        $user->status = $data['status'];
        $user->save();
        return redirect('/user')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function getStore(Request $request)
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->address = $data['address'];
        $user->birthday = $data['birthday'];
        $user->phone = $data['phone'];
        $user->gender = $data['gender'];
        $user->status = $data['status'];
        $user->save();
        return redirect('/user')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function show($id)
    {
        $data = User::find($id)->toArray();
        return view('admin.user.update',['id'=>$id,'data'=>$data]);
    }

    public function destroy($id)
    {
        $val =User::find($id);
        $val->delete();
         return redirect('/user')->with(['message'=>' xoá thành công']);
    }
}