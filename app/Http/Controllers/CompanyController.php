<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $data=Company::all()->toArray();
        return view('admin.company.index',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['id']);
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->address = $data['address'];
        $company->phone = $data['phone'];
        $company->status = $data['status'];
        $company->save();
        return redirect('/company')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function getStore(Request $request)
    {
        return view('admin.company.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $newCompany = new Company();
        $newCompany->name = $data['name'];
        $newCompany->email = $data['email'];
        $newCompany->address = $data['address'];
        $newCompany->phone = $data['phone'];
        $newCompany->status = $data['status'];
        $newCompany->save();
        return redirect('/company')->with(['message'=>"Sửa dữ liệu thành công "]);
    }

    public function show($id)
    {
        $data = Company::find($id)->toArray();
        return view('admin.company.update',['id'=>$id,'data'=>$data]);
    }

    public function destroy($id)
    {
        $val =Company::find($id);
        $val->delete();
         return redirect('/company')->with(['message'=>' xoá thành công']);
    }
}
