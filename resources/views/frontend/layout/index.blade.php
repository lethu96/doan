<!DOCTYPE html>
<html>
<head>
    <title></title>
    @include('frontend.layout.header_script')
</head>
<body>
    @include('frontend.layout.header')
<section class="main-content-eight">
    <!-- Product Sell Area Start -->
    <div class="product-sell-area section-padding">
        <div class="container">
            <div class="row">
                @include('frontend.layout.nav')
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.layout.footer')
@include('frontend.layout.footer_script')
</body>
</html>