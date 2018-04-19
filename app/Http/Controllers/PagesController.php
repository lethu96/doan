<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Category;
use App\Bill;
use App\BillDetail;
use DB,Cart,Datetime;

class PagesController extends Controller
{
    public function addcart($id)
    {
        $pro = Product::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->images]]);
        return redirect()->route('getcart');
    }

    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } else {
         return redirect()->route('getcart');
      }
    }

    public function getdeletecart($id)
    {
     Cart::remove($id);
     return redirect()->route('getcart');
    }

    public function xoa()
    {
        Cart::destroy();   
        return redirect()->route('home');
    }

    public function getcart()
    {   
        return view ('cart.cart')
        ->with('slug','Chi tiết đơn hàng');
    }

    public function getoder()
    {
        if (Auth::guest()) {
            return redirect('login');
        } else {

            return view ('cart.oder')
            ->with('slug','Xác nhận');
        }        
    }

    public function postoder(Request $rq)
    {
        $oder = new Bill();
        $total =0;
        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
        }
        $oder->user_id = Auth::user()->id;
        $oder->amount = Cart::count();
        $oder->sum =  floatval($total);
        $oder->note = $rq->txtnote;
        $oder->type = 'cod';
        $oder->created_at = new datetime;
        $oder->save();
        $detailId =$oder->id;

        foreach (Cart::content() as $row) {
           $detail = new BillDetail();
           $detail->product_id = $row->id;
           $detail->qty = $row->qty;
           $detail->bill_id = $detailId;
           $detail->created_at = new datetime;
           $detail->save();
        }

        Cart::destroy();
        return redirect()->route('getcart')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đơn hàng của bạn đã được gửi đi !']);
        
    }
}
