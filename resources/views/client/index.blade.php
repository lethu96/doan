@extends('client.master')

@section('content')
<div class="product-index">
    <div> Quần</div>
    @foreach($data1 as $item)
        <div class=" indicator-style category_product">
            <div class="single-product-inner">
                <div class="single-product">
                    <div class="product-thumbnail-wrapper">
                        <a href="#" class="border-none">
                            <div class="product-image">
                                <img alt="" id="" src="/img/{{ $item['image'] }}" width="170px" height="200px" style="object-fit: cover;">
                            </div>
                        </a>
                        <div class="product-button-list">
                            
                                <div class="add-to-cart-list">
                                    <a class="btn-product btn-cart" href="#">
                                        <i aria-hidden="true" class="fa fa-shopping-cart Addcart" data-id="{{$item['id']}}"></i>
                                    </a>
                                </div>
                            
                            <div class="product-button-group">
                                <a class="add-to-compare" href=""><i class="fa fa-info" aria-hidden="true" title="Thông tin chi tiết sản phẩm"></i></a>
                                <a href="#" title="Quick view" data-toggle="modal" data-content="{{$item['description']}}" data-id="{{$item['id']}}" class="btn-quickview view_product" data-target="#productModal"><i class="fa fa-search" aria-hidden="true"></i></a></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-details-content text-center">
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="heading-title"  href="#" title="{{$item['name']}}">{{$item['name']}}</a>
                        <span class="price">
                            <span class="amount" >{{number_format($item['price'])}} VND</span>
                        </span>
                        
                            <button type="button" class="btn btn-danger Addcart" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm Vào giỏ Hàng</button>
                        
                            <a href="{{asset('/product/detail/').'/'.$item['id']}}" title="" class="btn btn-danger">Xem chi tiết</a>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <center> <div>{!!$data1->links()!!}</div></center>
</div>
<div class="product-index">
    <div> Áo</div>
    @foreach($data2 as $item)
        <div class=" indicator-style category_product">
            <div class="single-product-inner">
                <div class="single-product">
                    <div class="product-thumbnail-wrapper">
                        <a href="#" class="border-none">
                            <div class="product-image">
                                <img alt="" id="" src="/img/{{ $item['image'] }}" width="170px" height="200px" style="object-fit: cover;">
                            </div>
                        </a>
                        <div class="product-button-list">
                            
                                <div class="add-to-cart-list">
                                    <a class="btn-product btn-cart" href="#">
                                        <i aria-hidden="true" class="fa fa-shopping-cart Addcart" data-id="{{$item['id']}}"></i>
                                    </a>
                                </div>
                            
                            <div class="product-button-group">
                                <a class="add-to-compare" href=""><i class="fa fa-info" aria-hidden="true" title="Thông tin chi tiết sản phẩm"></i></a>
                                <a href="#" title="Quick view" data-toggle="modal" data-content="{{$item['description']}}" data-id="{{$item['id']}}" class="btn-quickview view_product" data-target="#productModal"><i class="fa fa-search" aria-hidden="true"></i></a></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-details-content text-center">
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="heading-title"  href="#" title="{{$item['name']}}">{{$item['name']}}</a>
                        <span class="price">
                            <span class="amount" >{{number_format($item['price'])}} VND</span>
                        </span>
                        
                            <button type="button" class="btn btn-danger Addcart" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm Vào giỏ Hàng</button>
                        
                            <a href="{{asset('/product/detail/').'/'.$item['id']}}" title="" class="btn btn-danger">Xem chi tiết</a>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <center> <div>{!!$data2->links()!!}</div></center>
</div>
<div class="product-index">
    <div> Giày</div>
    @foreach($data3 as $item)
        <div class=" indicator-style category_product">
            <div class="single-product-inner">
                <div class="single-product">
                    <div class="product-thumbnail-wrapper">
                        <a href="#" class="border-none">
                            <div class="product-image">
                                <img alt="" id="" src="/img/{{ $item['image'] }}" width="170px" height="200px" style="object-fit: cover;">
                            </div>
                        </a>
                        <div class="product-button-list">
                            
                                <div class="add-to-cart-list">
                                    <a class="btn-product btn-cart" href="#">
                                        <i aria-hidden="true" class="fa fa-shopping-cart Addcart" data-id="{{$item['id']}}"></i>
                                    </a>
                                </div>
                            
                            <div class="product-button-group">
                                <a class="add-to-compare" href=""><i class="fa fa-info" aria-hidden="true" title="Thông tin chi tiết sản phẩm"></i></a>
                                <a href="#" title="Quick view" data-toggle="modal" data-content="{{$item['description']}}" data-id="{{$item['id']}}" class="btn-quickview view_product" data-target="#productModal"><i class="fa fa-search" aria-hidden="true"></i></a></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-details-content text-center">
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="heading-title"  href="#" title="{{$item['name']}}">{{$item['name']}}</a>
                        <span class="price">
                            <span class="amount" >{{number_format($item['price'])}} VND</span>
                        </span>
                        
                            <button type="button" class="btn btn-danger Addcart" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm Vào giỏ Hàng</button>
                        
                            <a href="{{asset('/product/detail/').'/'.$item['id']}}" title="" class="btn btn-danger">Xem chi tiết</a>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <center> <div>{!!$data3->links()!!}</div></center>
</div>
@endsection
