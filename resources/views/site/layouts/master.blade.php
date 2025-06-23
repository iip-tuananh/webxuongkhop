<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App" ng-cloak>

<div class="cs_preloader">
    <div class="cs_preloader_in">
        <div class="cs_wave_first">
            <i class="fas fa-circle-notch fa-spin fa-3x text-primary"></i>
        </div>
        <div class="cs_wave_second">
            <i class="fas fa-circle-notch fa-spin fa-3x text-primary"></i>
        </div>

    </div>
</div>

@include('site.partials.header')

<div class="homepage4-body">
    <div class="vl-offcanvas">
        <div class="vl-offcanvas-wrapper">
            <div class="vl-offcanvas-header d-flex justify-content-between align-items-center mb-90">
                <div class="vl-offcanvas-logo">
                    <a href="{{ route('front.home-page') }}"><img src="{{ @$config->image->path ?? '' }}" alt=""></a>
                </div>
                <div class="vl-offcanvas-close">
                    <button class="vl-offcanvas-close-toggle"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div class="vl-offcanvas-menu d-lg-none mb-40">
                <nav></nav>
            </div>

            <div class="space20"></div>
            <div class="vl-offcanvas-info">
                <h3 class="vl-offcanvas-sm-title">Liên hệ</h3>
                <div class="space20"></div>
                <span><a href="#"> <i class="fa-regular fa-envelope"></i> {{ $config->hotline }}</a></span>
                <span><a href="#"><i class="fa-solid fa-phone"></i>{{ $config->email }}</a></span>
                <span><a href="#"><i class="fa-solid fa-location-dot"></i>{{ $config->address_company }}</a></span>
            </div>
            <div class="space20"></div>
            <div class="vl-offcanvas-social">
                <h3 class="vl-offcanvas-sm-title">Theo dõi chúng tôi</h3>
                <div class="space20"></div>
                <a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a>
            </div>

        </div>
    </div>
    <div class="vl-offcanvas-overlay"></div>
</div>

@yield('content')

@include('site.partials.footer')

<div class="hidden-xs">
    <div onclick="window.location.href= 'tel:{{ $config->hotline }}'" class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a href="tel: {{ $config->hotline }}" class="pps-btn-img">
                    <img src="/site/images/phone.png" alt="Gọi điện thoại" width="50" loading="lazy">
                </a>
            </div>
        </div>
        <a href="tel:{{ $config->hotline }}">
        </a>
        <div class="hotline-bar"><a href="tel:{{ $config->hotline }}">
            </a><a href="tel:{{ $config->hotline }}">
                <span class="text-hotline">{{ $config->hotline }}</span>
            </a>
        </div>

    </div>
    <div class="inner-fabs">
        <a target="blank" href="{{ $config->facebook }}" class="fabs roundCool" id="challenges-fab"
           data-tooltip="Send Messenger">
            <img class="inner-fab-icon" src="/site/images/messenger-icon.png" alt="challenges-icon" border="0" loading="lazy">
        </a>
        <a target="blank" href="https://zalo.me/{{ preg_replace('/\s+/', '', $config->zalo) }}" class="fabs roundCool" id="chat-fab"
           data-tooltip="Send message Zalo">
            <img class="inner-fab-icon" src="/site/images/zalo.png" alt="chat-active-icon" border="0" loading="lazy">
        </a>
        {{--            <a target="blank" href="{{ $config->google_map }}" class="fabs roundCool" id="chat-fab"--}}
        {{--               data-tooltip="View map">--}}
        {{--                <img class="inner-fab-icon" src="/site/images/map.png" alt="chat-active-icon" border="0" loading="lazy">--}}
        {{--            </a>--}}

    </div>
    <div class="fabs roundCool call-animation" id="main-fab">
        <img class="img-circle" src="/site/images/lienhe.png" alt="" width="135" loading="lazy">
    </div>
</div>


<script src="/site/js/plugins/bootstrap.min.js"></script>
<script src="/site/js/plugins/fontawesome.js"></script>
<script src="/site/js/plugins/aos.js"></script>
<script src="/site/js/plugins/counter.js"></script>
<script src="/site/js/plugins/gsap.min.js"></script>
<script src="/site/js/plugins/ScrollTrigger.min.js"></script>
<script src="/site/js/plugins/Splitetext.js"></script>
<script src="/site/js/plugins/SmoothScroll.js"></script>
<script src="/site/js/plugins/sidebar.js"></script>
<script src="/site/js/plugins/magnific-popup.js"></script>
<script src="/site/js/plugins/mobilemenu.js"></script>
<script src="/site/js/plugins/owlcarousel.min.js"></script>
<script src="/site/js/plugins/nice-select.js"></script>
<script src="/site/js/plugins/waypoints.js"></script>
<script src="/site/js/plugins/slick-slider.js"></script>
<script src="/site/js/plugins/circle-progress.js"></script>
<script src="/site/js/plugins/swiper.js"></script>
<script src="/site/js/main.js"></script>
<script src="/site/js/callbutton.js"></script>

<script>
    var CSRF_TOKEN = "{{ csrf_token() }}";
</script>

@include('site.partials.angular_mix')


<script>
    app.controller('headerPartial', function ($rootScope, $scope, cartItemSync, $interval) {
        $scope.hasItemInCart = true;
        $scope.cart = cartItemSync;

        // xóa item trong giỏ
        $scope.removeItem = function (product_id) {
            jQuery.ajax({
                type: 'GET',
                url: "{{route('cart.remove.item')}}",
                data: {
                    product_id: product_id
                },
                success: function (response) {
                    if (response.success) {
                        $scope.cart.items = response.items;
                        $scope.cart.count = Object.keys($scope.cart.items).length;
                        $scope.cart.totalCost = response.total;

                        $interval.cancel($rootScope.promise);

                        $rootScope.promise = $interval(function(){
                            cartItemSync.items = response.items;
                            cartItemSync.total = response.total;
                            cartItemSync.count = response.count;
                        }, 1000);

                        if ($scope.cart.count == 0) {
                            $scope.hasItemInCart = false;
                        }
                        $scope.$applyAsync();
                    }
                },
                error: function (e) {
                    jQuery.toast.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.$applyAsync();
                }
            });
        }

        $scope.search = function () {
            if (!$scope.keyword) return;
            var frontSearchUrl = "{{ route('front.search') }}";

            var q = encodeURIComponent($scope.keyword);
            window.location.href = frontSearchUrl + '?keyword=' + q;
        }


    });

    // đồng bộ hiển thị số lượng item giỏ hàng
    app.factory('cartItemSync', function ($interval) {
        var cart = {items: null, total: null};

        cart.items = @json($cartItems);
        cart.count = {{$cartItems->sum('quantity')}};
        cart.total = {{$totalPriceCart}};

        return cart;
    });
</script>
@stack('scripts')

</body>

</html>
