<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\User;

class BillController extends Controller
{
    public function index()
    {
        $data=Bill::all()->toArray();
        return view('admin.bill.index',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $bill = Bill::find($data['id']);
        $bill->user_id = $data['user_id'];
        $bill->name_customer = $data['name_customer'];
        $bill->address_customer = $data['   address_customer'];
        $bill->phone_customer = $data['phone_customer'];
        $bill->amount = $data['amount'];
        $bill->price = $data['price'];
        $bill->status = $data[' status'];
        $bill->save();
        return redirect('/bill')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function getStore(Request $request)
    {
        $user = User::all();
        return view('admin.bill.create',['user' => $user]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $bill = new Bill();
        $bill->user_id = $data['user_id'];
        $bill->name_customer = $data['name_customer'];
        $bill->address_customer = $data['   address_customer'];
        $bill->phone_customer = $data['phone_customer'];
        $bill->amount = $data['amount'];
        $bill->price = $data['price'];
        $bill->status = $data[' status'];
        $bill->save();
        return redirect('/bill')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function show($id)
    {
        $data = Bill::find($id)->toArray();
        $user = User::all();
        return view('admin.bill.update',['id'=>$id,'data'=>$data, 'user' => $user]);
    }

    public function destroy($id)
    {
        $val =Bill::find($id);
        $val->delete();
         return redirect('/bill')->with(['message'=>' xoá thành công']);
    }
}