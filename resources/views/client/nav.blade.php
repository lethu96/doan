<div class="col-sm-3">
    <div class="right-widget">
        <div class="single-effect-2">
            <a href="#">
                <img src="{{asset('img/slider/mac2.png')}}" alt="">
                <span class="s s1"></span>
                <span class="s s2"></span>
                <span class="s s3"></span>
                <span class="s s4"></span>
                <span class="s s5"></span>
                <span class="s s6"></span>
                <span class="s s7"></span>
                <span class="s s8"></span>
                <span class="s s9"></span>
                <span class="s s10"></span>
                <span class="s s11"></span>
                <span class="s s12"></span>
                <span class="s s13"></span>
                <span class="s s14"></span>
                <span class="s s15"></span>
            </a>
        </div>
        <div class="widget-tab first-widget-tab">
            <div class="widget-tab-menu">
                <!--  Nav tabs -->
                <ul role="tablist" class="tab-nav-menu">
                    <li class="first-item active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="new" href="#new" aria-expanded="false">New</a></li>
                    <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="latest" href="#latest" aria-expanded="true">Latest</a></li>
                    <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="viewed" href="#viewed">viewed</a></li>
                </ul>
            </div>
            <div class="widget-tab-content tab-content">
                <div id="new" class="tab-pane fade in active" role="tabpanel">
                    <ul class="product-list-widget">
                        @foreach($data as $item)
                         <li>
                                <a href="" class="thumbnail">
                                    <img src="/img/{{ $item['image'] }}" alt="" href="{{asset('/product/detail/').'/'.$item['id']}}">
                                </a>
                                <div class="content">
                                    <a href="{{asset('/product/detail/').'/'.$item['id']}}">{{$item['name']}}</a>
                                    <span class="amount"> {{number_format($item['price'])}}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="latest" class="tab-pane fade" role="tabpanel">
                    <ul class="product-list-widget">
                        @foreach($data as $item)
                         <li>
                                <a href="" class="thumbnail">
                                    <img href="{{asset('/product/detail/').'/'.$item['id']}}" src="/img/{{ $item['image'] }}" alt="">
                                </a>
                                <div class="content">
                                    <a href="{ {asset('/product/detail/').'/'.$item['id']}}" >{{$item['name']}}</a>
                                    <span class="amount"> {{number_format($item['price'])}}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="viewed" class="tab-pane fade in" role="tabpanel">
                    <ul class="product-list-widget">
                        @foreach($data as $item)
                         <li>
                                <a href="" class="thumbnail">
                                    <img src="/img/{{ $item['image'] }}" alt="" href="{{asset('/product/detail/').'/'.$item['id']}}">
                                </a>
                                <div class="content">
                                    <a href="">{{$item['name']}}</a>
                                    <span class="amount"> {{number_format($item['price'])}}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>