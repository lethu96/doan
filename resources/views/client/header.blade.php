
<header class="header-area header-2 header-8">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 hidden-xs">
                    <div class="header-top-left">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <div class="header-top-right">
                        <ul class="list-inline user-menu pull-right">
                            <li class="menu-item wish-list ">
                                <a href="wishlist.html">
                                    <i class="fa fa-heart"></i> Wishlist (0)
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-8">
                    <div class="header-logo">
                        <a href="">
                            <img src="{{asset('img/logo/logo.png')}}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="hidden-lg hidden-md hidden-sm col-xs-4">
                    <div class="hidden-right-header">
                        <ul>
                            <li><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                            <li><a href="my-account.html"><i class="fa fa-user"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="expand">
                                    <a href="#">
                                        <span class="menu-label">Trang Chủ</span>
                                    </a>
                                </li>
                                    <li>
                                        <a href="#">
                                            <span class="menu-label">Giỏ Hàng</span>
                                        </a>
                                    </li>
                                <li>
                                    <a href="#">
                                        <span class="menu-label">Liên Hệ</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu Start -->
                <div class="mobile-menu-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul>
                                            <li><a href="index.html">Home</a>
                                                <ul>
                                                    <li><a href="index.html">Home Version 1</a></li>
                                                    <li><a href="index-2.html">Home Version 2</a></li>
                                                    <li><a href="index-3.html">Home Version 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Products</a></li>
                                            <li><a href="#">Page</a>
                                                <ul>
                                                    <li><a href="#">Categories 01</a>
                                                        <ul>
                                                            <li><a href="contact.html">Contact</a></li>
                                                            <li><a href="price.html">Picing table</a></li>
                                                            <li><a href="team-member.html">Team member</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Categories 02</a>
                                                        <ul>
                                                            <li><a href="cart.html">Cart</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu End -->
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="home-2-header-bottom">
                <div class="row clearfix">
                    <div class="col-sm-3 hidden-xs">
                        <div class="header-cate-color">
                            <div class="left-category-menu">
                                <nav class="category-menu">
                                    <ul>
                                        <li>
                                            <a href="#" class="category-label">
                                                <h2>Danh mục sản phâm</h2>
                                            </a>
                                            <ul class="category-items">
                                            @foreach($cate as $item)
                                            <a href="{{asset('/typeproduct/').'/'.$item['id']}}" class="categoriesId">
                                                    <li class="menu-item electronic-item">
                                                        {{$item['name']}}
                                                    </li>
                                                    </a>
                                           @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-10" style="float: right;">
                        <div class="input-group">
                            <input type="text" placeholder="Search for..." style="   width: 100%; height: 47px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;">
                            <span class="input-group-btn">
                                <button class="btn btn-search" type="button" style="height: 47px;"><i class="fa fa-search fa-fw"></i> Search</button>
                            </span>
                        </div>
                    </div>
                    <div class="hidden-lg hidden-md hidden-sm col-xs-2">
                        <div class="mobile-cart-inner pull-right">
                            <a href="cart.html"><i class="fa fa-shopping-cart"></i></a>
                            <span class="num-of-item">02</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="slider-area-8">
            <!-- Slider Start -->
            <div class="slider-container">
                <!-- Slider Image -->
                <div id="mainSlider" class="nivoSlider slider-image">
                    <img src="{{asset('img/slider/mac2.png')}}" alt="main slider" title="#htmlcaption1"/>
                    <img src="{{asset('img/slider/game.jpg')}}" alt="main slider" title="#htmlcaption2"/>
                    <img src="{{asset('img/slider/mac3.png')}}" alt="main slider" title="#htmlcaption3"/>
                </div>
            </div>
            <!-- Slider End-->
        </div>
    </div>
</header>