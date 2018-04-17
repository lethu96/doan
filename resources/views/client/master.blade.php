<!DOCTYPE html>
<html>
<head>
    <title></title>
    @include('client.header_script')
</head>
<body>
    @include('client.header')
<section class="main-content-eight">
    <!-- Product Sell Area Start -->
    <div class="product-sell-area section-padding">
        <div class="container">
            <div class="row">
                @include('client.nav')
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</section>
@include('client.footer')
@include('client.footer_script')
</body>
</html>