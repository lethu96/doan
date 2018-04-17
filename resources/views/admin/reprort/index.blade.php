

<?php
    $dataPoints = [];
    $success_return = round($total_bills_success_amount/$total_bills_amount,3)*100;
    $unsuccess_return = 100 - $success_return;

    $success = round($total_bills_success_number /$total_bills_number,3)*100;
    $unsuccess = 100 - $success;



//    $dataPoints[] = ['y'=>$success,'label'=>'Đã hoàn thành'
//
//    ];
//    echo json_encode($dataPoints);
?>
@extends('admin.home')

@section('content')
@push('css')
{!! Charts::assets() !!}
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4"><i class="fa fa-shopping-cart"></i> Thông tin đơn hàng</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" border="1" style="border: 1px solid #ececec;font-size: 13px;">
                            <thead>
                            <tr>
                                <th style="text-align: center;background-color: #ececec;" colspan="3"><i class="fa fa-shopping-cart"></i> Thông tin đơn hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td><i class="fa fa-bar-chart" aria-hidden="true"></i> Số lượng đơn hàng</td>
                                <td><i class="fa fa-money" aria-hidden="true"></i> Doanh số</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-angle-right" aria-hidden="true"></i> Đã đặt hàng</td>
                                <!-- <td>{{count($total_bills_number)}}</td> -->
                                <td>{{$total_bills_number}}</td>
                                <td>{{number_format($total_bills_amount,0,',','.')}} đ</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-angle-right" aria-hidden="true"></i> Đã duyệt</td>
                                <!-- <td>{{count($total_bills_number)}}</td> -->
                                <td>{{$total_bills_number}}</td>
                                <td>{{number_format($total_bills_amount,0,',','.')}} đ</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-angle-right" aria-hidden="true"></i> Đã hoàn thành</td>
                                <!-- <td>{{count($total_bills_success_number)}}</td> -->
                                <td>{{$total_bills_success_number}} -(Chiếm {{round($total_bills_success_number/$total_bills_number,3)*100}}%)</td>
                               <!--  <td>{{number_format($total_bills_success_amount,0,',','.')}} đ (Chiếm {{round($total_bills_success_amount/$total_bills_amount,3)*100}}%)</td> -->
                                <td>{{number_format($total_bills_success_amount,0,',','.')}} đ -(Chiếm {{round($total_bills_success_amount/$total_bills_amount,3)*100}}%) </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-angle-right" aria-hidden="true"></i> Chưa hoàn thành</td>
                                <!-- <td>{{count($total_bills_unfinished_number)}}</td> -->
                                 <td>{{$total_bills_unfinished_number}} -(Chiếm {{100-round($total_bills_success_number/$total_bills_number,3)*100}}%)</td>
                                <!-- <td>{{number_format($total_bills_unfinished_amount,0,',','.')}} đ (Chiếm {{100-round($total_bills_success_amount/$total_bills_amount,3)*100}}%)</td> -->
                                <td>{{number_format($total_bills_unfinished_amount,0,',','.')}} đ -(Chiếm {{100-round($total_bills_success_amount/$total_bills_amount,3)*100}}%)</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="row">
            <div id="chartActually" style="height: 370px; width: 100%;"></div>
        </div>
        <script>
            $(function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "Tỷ lệ % đơn hàng"
                    },
                    data: [{
                        type: "pie",
                        startAngle: 25,
                        toolTipContent: "<b>{label}</b>: {y}%",
                        showInLegend: "true",
                        legendText: "{label}",
                        indexLabelFontSize: 16,
                        indexLabel: "{label} - {y}%",
                        dataPoints: [
                            { y: <?=$success?>, label: "Đơn hàng đã hoàn thành" },
                            { y: <?=$unsuccess?>, label: "Đơn hàng chưa hoàn thành" }
                        ]
                    }]
                });
                chart.render();
            });

             $(function () {
                var chart = new CanvasJS.Chart("chartActually", {
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "Tỷ lệ % thực thu"
                    },
                    data: [{
                        type: "pie",
                        startAngle: 25,
                        toolTipContent: "<b>{label}</b>: {y}%",
                        showInLegend: "true",
                        legendText: "{label}",
                        indexLabelFontSize: 16,
                        indexLabel: "{label} - {y}%",
                        dataPoints: [
                            { y: <?=$success_return?>, label: "Đơn hàng đã thanh toán" },
                            { y: <?=$unsuccess_return?>, label: "Đơn hàng chưa thanh toán" }
                        ]
                    }]
                });
                chart.render();
            });
        </script>
    </div>
@endsection
