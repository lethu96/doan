<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use DB;
use Chart;

class ReportController extends Controller
{

    function overview()
    {
        $total_bills_number = count(Bill::all()) ;
        $total_bills_amount = DB::table('bill')
            ->sum('sum');
        $total_bills_success_number = count(DB::table('bill')
            ->where('status',1)
            ->get());
        $total_bills_success_amount = DB::table('bill')
            ->where('status',1)
            ->sum('sum');
        $total_bills_unfinished_number = count(DB::table('bill')
            ->where('status',0)
            ->get());
        $total_bills_unfinished_amount = DB::table('bill')
            ->where('status',0)
            ->sum('sum');

        return view('admin.reprort.index',['total_bills_number'=>$total_bills_number,
            'total_bills_amount'=>$total_bills_amount,'total_bills_success_number'=>$total_bills_success_number,
            'total_bills_success_amount'=>$total_bills_success_amount,'total_bills_unfinished_number'=>$total_bills_unfinished_number,
            'total_bills_unfinished_amount'=>$total_bills_unfinished_amount]);
    }
}
