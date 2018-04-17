@extends('client.master')

@section('content')
<div class="row">
    <div class="modal-content">
        <div class="modal-header" style="background: aliceblue; color:grey">
            <h3>Thông Tin Chi tiết sản phẩm</h3>
        </div>
        <div class="modal-body">
            <div class="modal-product">
                <div class="product-images">
                    <div class="main-image images">
                        <img alt="" id="img_view" src="/img/{{$product['image']}}" >
                    </div>
                </div>
                <div class="product-info">
                    <h1 id="title_view" style="color:blue">{{$product['name']}}</h1>
                    <div class="price-box">
                        <p class="price"><span class="special-price"><span class="amount" id="price_view" style="color:red">{{number_format($product['price'])}}  VND</span></span></p>
                    </div>
                    <div class="price-box">
                        <font style="font-weight: bold;">Thuế VAT</font> : <span style="color:red">Giá Trên chưa bao gồm thuế VAT</span>
                    </div>
                    <div class="price-box">
                        <font style="font-weight: bold;">Bảo Hành</font> : <span>12 Tháng</span>
                    </div>
                    <div class="price-box">
                        <font style="font-weight: bold;">Thời gian vận chuyển</font> : <span>7 ngày sau khi đặt hàng</span>
                    </div>
                    
                    <div class="quick-add-to-cart">
                        <div class="price-box">
                            <font style="font-weight: bold;">Hình thức Thanh Toán</font>  : Thanh Toán trức tuyến

                        </div>
                        <div class="numbers-row">
                            <input type="number" name="number"  id="number" value="1" min="1" max="100">
                        </div>
                        <button class="single_add_to_cart_button Addcart" data-id="{{$product['id']}}" type="button"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng</button>
                    </div>
                    <div class="quick-desc" id="content_view">
                        {{$product['description']}}
                    </div>
                    <div class="social-sharing">
                        <div class="widget widget_socialsharing_widget">
                            <h3 class="widget-title-modal">Share this product</h3>
                            <ul class="social-icons">
                                <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div id="content" style="margin-top: 30px;">
        <h1 class="text-center">Bài Viết về sản phẩm</h1>
        
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 cmt">
                <div class="fb-like"
                     data-href=""
                     data-layout="standard"
                     data-action="like"
                     data-show-faces="true">
                </div>
                <div class="fb-share-button"
                     data-href=""
                     data-layout="button_count" data-size="small" data-mobile-iframe="true"><a
                            class="fb-xfbml-parse-ignore" target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A84%2Foto%2Fshow-car%2FToyouta%2520Fortuner&amp;src=sdkpreparse">Chia
                        sẻ</a></div>
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-comments" style="margin-top:5%;"
                     data-href=""
                     data-numposts="10"></div>
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                <!-- Your like button code -->
            </div>
@endsection