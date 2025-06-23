@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
@endsection

@section('css')

@endsection

@section('content')
    <style>
        .bradecrumb {
            color: #ffffff !important;                          /* chữ trắng */
            font-weight: bold !important;                       /* đậm hơn nếu cần */
            /* viền xanh bằng text-stroke (Chrome, Safari) */
            -webkit-text-stroke: 1px #010d23  !important;
            text-stroke: 1px #007bff !important;                /* chuẩn CSS hiện tại */

        }
    </style>
    <!--===== HERO AREA STARTS =======-->
    <div class="inner-header-section-area"
         style="background-image: url({{ @$banner->image->path ?? '' }}); background-position: center;
          background-repeat: no-repeat; background-size: cover; padding: 300px 0 200px">
        <div class="container">


            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-header hero-header–overlay">
                        <h1 class="text-anime-style-1 bradecrumb">Sản phẩm</h1>
                        <a href="{{ route('front.home-page') }}" class="bradecrumb">
                            Trang chủ
                            <i class="fa-solid fa-angle-right"></i>
                            Sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->

    <style>
        /* CSS */
        .product-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: box-shadow .2s;
        }
        .product-card:hover {
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        /* 1. Ảnh */
        .product-thumb {
            width: 100%;
            aspect-ratio: 1 / 1;    /* giữ tỷ lệ vuông */
            overflow: hidden;
        }
        .product-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* 2. Info */
        .product-info {
            padding: 16px;
            text-align: center;
            flex: 1;                /* đẩy giá xuống cuối nếu cần */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .product-title {
            font-size: 1.1rem;
            margin: 0 0 8px;
            line-height: 1.3;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .product-title a {
            color: #1c293f;
            text-decoration: none;
        }
        .product-title a:hover {
            color: #1c6dd0;
        }

        /* Giá */
        .product-price {
            font-size: 1.2rem;
            font-weight: 600;
            color: #e63946;
            margin: 0;
        }

        /* 1. Đảm bảo product-thumb là vị trí chứa tương đối */
        .product-thumb {
            position: relative;
            overflow: hidden;
        }

        /* 2. Style cho nút add-to-cart, ẩn sẵn */
        .add-to-cart {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%) scale(0.8);
            width: 60px; height: 60px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity .3s ease, transform .3s ease;
            text-decoration: none;
            z-index: 2;
        }

        /* Khi hover lên thumbnail, hiện icon */
        .product-thumb:hover .add-to-cart {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }




    </style>
    <!--===== SERVICE AREA STARTS =======-->
    <div class="service-inner-area sp8" style="padding: 30px 0 0;" ng-controller="ProductCategory">
        <div class="container">
            <nav aria-label="breadcrumb" class="mt-4 mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('front.home-page') }}">Trang chủ</a>

                        <i class="fa-solid fa-angle-right"></i>   Sản phẩm
                    </li>

                </ol>
            </nav>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <!-- 1. Thumbnail -->
                            <div class="product-thumb">
                                <a href="javascript:void(0)">
                                    <img src="{{ @$product->image->path }}" alt="{{ $product->name }}">
                                </a>

                                <a href="javascript:void(0)" class="add-to-cart" ng-click="addToCart({{ $product->id }})" title="Thêm vào giỏ hàng">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 19 18" fill="none">
                                        <path d="M6.11719 6V4.5C6.11719 2.42893 7.79612 0.75 9.8672 0.75C11.9383 0.75 13.6172 2.42893 13.6172 4.5V6H15.8672C16.2814 6 16.6172 6.33579 16.6172 6.75V15.75C16.6172 16.1642 16.2814 16.5 15.8672 16.5H3.86719C3.45298 16.5 3.11719 16.1642 3.11719 15.75V6.75C3.11719 6.33579 3.45298 6 3.86719 6H6.11719ZM6.11719 7.5H4.61719V15H15.1172V7.5H13.6172V9.00003H12.1172V7.5H7.61719V9.00003H6.11719V7.5ZM7.61719 6H12.1172V4.5C12.1172 3.25736 11.1098 2.25 9.8672 2.25C8.62453 2.25 7.61719 3.25736 7.61719 4.5V6Z" fill="white"></path>
                                    </svg>
                                </a>

                            </div>
                            <style>
                                .product-info .product-price {
                                    display: flex;
                                    align-items: baseline;
                                    gap: 0.5rem;
                                    margin: 0;
                                }

                                .product-info .old-price {
                                    text-decoration: line-through;
                                    color: #999;
                                    font-size: 0.9rem;
                                }

                                .product-info .new-price {
                                    color: #e60023;
                                    font-weight: bold;
                                    font-size: 1.1rem;
                                }

                                .product-info .product-price {
                                    display: flex;
                                    justify-content: center;  /* căn giữa theo chiều ngang */
                                    align-items: baseline;    /* căn theo baseline để giá cũ và giá mới thẳng hàng */
                                    gap: 0.5rem;              /* khoảng cách giữa hai giá */
                                    margin: 0;                /* bỏ margin mặc định của <p> nếu cần */
                                }
                            </style>
                            <!-- 2. Thông tin sản phẩm -->
                            <div class="product-info">
                                <h4 class="product-title">
                                    <a href="{{ route('front.get-product-detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                </h4>

                                <p class="product-price">
                                    @if($product->base_price > 0)
                                        <span class="old-price">{{ formatCurrency($product->base_price) }}₫</span>
                                    @endif
                                    <span class="new-price">{{ formatCurrency($product->price) }}₫</span>
                                </p>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    <!--===== SERVICE AREA ENDS =======-->

    <div class="sp8">

    </div>
@endsection

@push('scripts')
    <script>
        app.controller('ProductCategory', function ($rootScope, $scope, $interval, cartItemSync) {
            $scope.item_qty = 1;

            $scope.addToCart = function (productId) {
                url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
                url = url.replace('productId', productId);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        'qty': parseInt($scope.item_qty)
                    },
                    success: function (response) {
                        if (response.success) {
                            toastr.success('Sản phẩm đã được thêm vào giỏ hàng');

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                        }
                    },
                    error: function () {
                        toastr.toastr('Thao tác thất bại !');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }
        })
    </script>
@endpush
