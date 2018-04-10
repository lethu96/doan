<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $data=Comment::all()->toArray();
        return view('admin.comment.index',['data'=>$data]);
    }


    public function destroy($id)
    {
        $val =Comment::find($id);
        $val->delete();
         return redirect('/comment')->with(['message'=>' xoá thành công']);
    }
}