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
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@9/swiper-bundle.min.css"
    />

@endsection

@section('content')
    <div class="inner-header-section-area" style="background-image: url(/site/img/all-images/bg/bg9.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-header">
                        <h1 class="text-anime-style-1">{{ $product->name }}</h1>
                        <div class="space28"></div>
                        <a href="{{ route('front.home-page') }}" class="bradecrumb">Trang chủ <i class="fa-solid fa-angle-right">

                            </i> Sản phẩm <i class="fa-solid fa-angle-right"></i> {{ $product->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .product-detail-page {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
            margin: 40px auto;
            max-width: 1200px;
            padding: 0 16px;
            box-sizing: border-box;
        }


        /* -------- PRODUCT INFO -------- */
        .product-info {
            flex: 1 1 400px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .product-title {
            font-size: 2rem;
            margin: 0;
            color: #1c293f;
        }

        .product-sku {
            font-size: .9rem;
            color: #666;
        }

        .product-des {
            font-size: 1.1rem;
            color: #666;
        }

        .price-area {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.8rem;
            font-weight: 700;
        }
        .current-price {
            color: #e63946;
        }
        .old-price {
            font-size: 1rem;
            color: #999;
            text-decoration: line-through;
        }
        .tag-sale {
            background: #e63946;
            color: #fff;
            font-size: .75rem;
            padding: 2px 6px;
            border-radius: 3px;
        }

        /* benefits */
        .benefits {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .benefits li {
            font-size: .95rem;
            color: #2d6a4f;
        }
        .benefits li i {
            margin-right: 8px;
            color: #2d6a4f;
        }

        /* quantity */
        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .qty-btn {
            width: 32px; height: 32px;
            border: 1px solid #ccc;
            background: #fff;
            font-size: 1.2rem;
            line-height: 1;
            cursor: pointer;
            border-radius: 4px;
            transition: background .2s;
        }
        .qty-btn:hover {
            background: #f0f0f0;
        }
        .quantity-selector input {
            width: 60px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            height: 32px;
        }

        /* actions */
        .actions {
            display: flex;
            gap: 16px;
            margin-top: 16px;
        }
        .btn {
            flex: 1;
            padding: 12px 0;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            transition: background .2s, color .2s;
        }
        .btn-buy {
            background: #1c6dd0;
            color: #fff;
        }
        .btn-buy:hover {
            background: #155bb5;
            color: #fff !important;
        }
        .btn-cart {
            background: transparent;
            border: 1px solid #1c6dd0;
            color: #1c6dd0;
        }
        .btn-cart:hover {
            background: #1c6dd0;
            color: #fff;
        }

        /* -------- DETAIL INFO -------- */
        .product-detail-info {
            flex: 1 1 100%;
            margin-top: 20px;
        }
        .product-detail-info h2 {
            font-size: 1.5rem;
            margin-bottom: 16px;
            color: #1c293f;
        }
        .product-detail-info .detail-content h3 {
            font-size: 1.1rem;
            margin: 16px 0 8px;
        }
        .product-detail-info .detail-content ul {
            list-style: disc inside;
            margin: 0 0 16px;
            padding: 0;
        }
        .product-detail-info .detail-content ul li {
            margin-bottom: 8px;
            line-height: 1.5;
            color: #444;
        }


        .quantity-selector {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 6px;
            overflow: hidden;
            width: max-content;
        }

        .qty-btn {
            width: 36px;
            height: 36px;
            border: none;
            background: #f5f5f5;
            font-size: 1.4rem;
            line-height: 1;
            cursor: pointer;
            transition: background .2s;
        }

        .qty-btn:hover {
            background: #e0e0e0;
        }

        .qty-input {
            width: 50px;
            height: 36px;
            border: none;
            text-align: center;
            font-size: 1rem;
            outline: none;
        }

        .qty-input::-webkit-outer-spin-button,
        .qty-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }



        .product-gallery {
            max-width: 600px;
            margin: 0 auto;
        }

        /* MAIN SLIDER */
        .gallery-top {
            width: 100%;
            aspect-ratio: 1 / 1;       /* giữ khung vuông */
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: relative;
        }
        .gallery-top .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* NAV BUTTONS */
        .gallery-top .swiper-button-next,
        .gallery-top .swiper-button-prev {
            color: #fff;
            width: 45px; height: 45px;
            background: rgba(0,0,0,0.4);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }
        .gallery-top .swiper-button-next:hover,
        .gallery-top .swiper-button-prev:hover {
            background: rgba(0,0,0,0.6);
        }

        /* THUMBNAILS */
        .gallery-thumbs {
            margin-top: 12px;
            height: 80px;
        }
        .gallery-thumbs .swiper-slide {
            width: 80px;
            height: 100%;
            opacity: 0.4;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        .gallery-thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }
        .gallery-thumbs .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 4px;
        }


        @media (max-width: 768px) {
            /* Toàn bộ trang chi tiết thành 1 cột */
            .product-detail-page {
                flex-direction: column;
                padding: 0 16px;
            }

            /* Gallery và info full width */
            .product-gallery,
            .product-info {
                flex: none;
                width: 100%;
                margin-bottom: 24px;
            }

            /* Main image tự động cao theo chiều ngang */
            .product-gallery .gallery-top {
                aspect-ratio: auto;
                height: auto;
            }
            .product-gallery .gallery-top img {
                width: 100%;
                height: auto;
            }

            /* Thumbnails nhỏ lại, vẫn scroll */
            .product-gallery .gallery-thumbs {
                height: 60px;
                gap: 6px;
            }
            .product-gallery .gallery-thumbs .swiper-slide {
                width: 60px !important;
                height: 100% !important;
            }

            .product-detail-page{
                gap: 0px;
            }
        }


        .product-info .product-sales {
            font-size: 0.95rem;
            color: #555;
            margin: 0.5rem 0;          /* khoảng cách so với phần trên/dưới */
            text-align: left;
        }

        .product-info .sales-count {
            font-weight: bold;
            color: #e60023;            /* màu nổi bật */
        }
    </style>


    <style>
        .product-reviews {
        }

        .reviews-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        .review-item {
            border-bottom: 1px solid #eee;
            padding-bottom: 1.5rem;
        }
        .review-header {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
        .review-rating .star {
            margin-right: 2px;
            font-size: 1rem;
            color: #ddd;
        }
        .review-rating .filled {
            color: #ffc107;
        }
        .review-title {
            margin: 0;
            font-size: 1.1rem;
        }
        .review-meta {
            font-size: 0.9rem;
            color: #777;
        }
        .review-content {
            margin-top: 0.5rem;
            line-height: 1.5;
            position: relative;
        }
        .btn-read-more {
            display: inline-block;
            margin-top: 0.5rem;
            font-size: 0.9rem;
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
        }

        .product-reviews > h2 {
            display: block;       /* đảm bảo nó là block-level element */
            width: 100%;          /* chiếm hết khung chứa */
            margin: 0 auto 1.5rem;/* bỏ margin top, tự margin-bottom để tách khỏi reviews-list */
        }
    </style>

    <style>
        .review-form {
            background-color: #f8f9fa;
        }

        .review-form h2 {
            color: #333;
        }

        /* Star Rating */
        .star-rating {
            display: inline-block;
            direction: rtl;       /* đánh dấu sao từ phải qua trái */
            font-size: 1.5rem;    /* kích thước sao */
        }
        .star-rating input {
            display: none;        /* ẩn radio inputs */
        }
        .star-rating label {
            color: #ddd;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            cursor: pointer;
            margin: 0 .1rem;
        }
        .star-rating label:before {
            content: "\f005";     /* FontAwesome solid star */
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffc107;       /* màu vàng khi hover/checked */
        }

        /* Khi hover trên form, cho hiệu ứng mượt hơn */
        .review-form input,
        .review-form textarea,
        .review-form button {
            transition: box-shadow .2s, transform .1s;
        }
        .review-form input:focus,
        .review-form textarea:focus {
            box-shadow: 0 0 .25rem rgba(0,123,255,.25);
        }
        .review-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 .25rem .5rem rgba(0,0,0,.15);
        }

    </style>

    <style>
        /* Hiển thị sao rỗng khi off */
        .jdgm-star.jdgm--off::before {
            content: '☆';       /* Unicode empty star */
            font-size: 1.5rem;
            color: #ccc;
            display: inline-block;
        }

        /* Hiển thị sao đầy khi on */
        .jdgm-star.jdgm--on::before {
            content: '★';       /* Unicode filled star */
            font-size: 1.5rem;
            color: #f5b301;
            display: inline-block;
        }


        /* 1. Ép parent hiển thị từ trái sang phải */
        .jdgm-form__rating {
            direction: ltr !important;
            unicode-bidi: embed;    /* hoặc bidi-override nếu cần */
        }

        /* 2. Đảm bảo mỗi star xếp cạnh nhau */
        .jdgm-form__rating .jdgm-star {
            float: none !important;
            display: inline-block;
            margin-right: .25rem;   /* cách đều giữa các sao */
        }

        /* Tùy chọn: Xóa margin ở sao cuối */
        .jdgm-form__rating .jdgm-star:last-child {
            margin-right: 0;
        }

        .product-gallery .gallery-top {
            --swiper-navigation-size: 20px;    /* thay 60px thành size bạn muốn */
        }

    </style>
    @php
        $galleries = $product->galleries;
        $galleryPath = [];
        foreach ($galleries as $gallery) {
            $galleryPath[] = $gallery->image->path ?? '';
        }
         $allImages = collect([$product->image->path ?? ''])
                     ->merge($galleryPath)
                     ->all();


          $largeW = 1150;
          $largeH = 850;

    @endphp

    <div class="vl-blog-details-section sp8" ng-controller="Product" style="padding: 10px 0 0">
        <div class="container">
            <div class="product-detail-page">
                <!-- Left: gallery -->
                <div class="product-gallery">
                    <div class="swiper gallery-top">
                        <div class="swiper-wrapper">
                            @foreach($allImages as $img)
                                <div class="swiper-slide">
                                    <img src="{{$img}}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                        <!-- navigation -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <div class="swiper gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($allImages as $img)
                                <div class="swiper-slide">
                                    <img src="{{$img}}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: thông tin -->
                <div class="product-info">
                    <h1 class="product-title">{{ $product->name }}</h1>
                    <div class="product-sku">Mã sp: {{ $product->code }}</div>
                    <div class="product-des">{{ $product->intro }}</div>

                    <div class="price-area">
                        <span class="current-price">{{ formatCurrency($product->price) }}₫</span>
                        @if($product->base_price)
                            <span class="old-price">{{ formatCurrency($product->base_price) }}₫</span>
                            <span class="tag-sale">Sale</span>
                        @endif
                    </div>

                    <div class="product-sales">
                        Lượt bán: <span class="sales-count">{{ $product->count_sale ?? 0 }}</span>
                    </div>

                    <div class="quantity-selector">
                        <button type="button" class="qty-btn minus">–</button>
                        <input type="number" class="qty-input" value="1" min="1"  ng-model="item_qty">
                        <button type="button" class="qty-btn plus">+</button>
                    </div>
                    <div class="actions">
                        <button class="btn btn-buy"  ng-click="buyNow({{ $product->id }})">Mua ngay</button>
                        <button class="btn btn-cart" ng-click="addToCart({{ $product->id }})">Thêm vào giỏ hàng</button>
                    </div>
                </div>


{{--                --}}
{{--                <div class="product-detail-info">--}}
{{--                    <h2>Thông tin chi tiết sản phẩm</h2>--}}
{{--                    <div class="detail-content">--}}
{{--                        {!! $product->body !!}--}}
{{--                    </div>--}}
{{--                </div>--}}

                <style>
                    .btn-detail-toggle {
                        /* Buộc flex không giãn, không co */
                        flex: 0 0 auto !important;

                        /* Cố định kích thước */
                        width: 32px !important;
                        height: 32px !important;

                        /* Chỉ hiển thị icon, không background nặng */
                        padding: 0;
                        background: transparent !important;
                        border: 1px solid var(--bs-primary) !important;
                        border-radius: 50% !important;

                        /* Giúp canh icon */
                        display: inline-flex !important;
                        align-items: center;
                        justify-content: center;

                        /* Hiệu ứng nhẹ */
                        transition: box-shadow .2s ease-in-out;
                    }

                    /* Hover chỉ còn shadow nhỏ */
                    .btn-detail-toggle:hover {
                        background-color: transparent !important;
                        box-shadow: 0 2px 6px rgba(0,0,0,0.12) !important;
                    }

                    /* Khi nội dung mở, đổi dấu + → – */
                    .btn-detail-toggle.opened i {
                        transform: rotate(45deg);
                    }


                </style>

                <div class="product-detail-info">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="mb-0">Thông tin chi tiết sản phẩm</h2>

                        <button
                            id="toggleProductDetailBtn"
                            class="btn-detail-toggle opened"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#productDetailContent"
                            aria-expanded="true"
                            aria-controls="productDetailContent">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>


                    <div class="collapse" id="productDetailContent">
                        <div class="detail-content">
                            {!! $product->body !!}
                        </div>
                    </div>
                </div>


                <!-- Reviews -->
                <div class="product-reviews">
                    <h2 style="font-size: 1.5rem">Đánh giá sản phẩm</h2>
                    <div class="reviews-list">
                        @if($reviews->count())
                            @foreach($reviews as $review)
                                    <div class="review-item">
                                        <div class="review-header">
                                            <div class="review-rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->rating)
                                                        <i class="fa-solid fa-star star filled"></i>
                                                    @else
                                                        <i class="fa-regular fa-star star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <h3 class="review-title">{{ $review->title }}</h3>
                                            <div class="review-meta">
                                                <span class="review-author">{{ $review->user_name }}</span> —
                                                <span class="review-date">{{ \Illuminate\Support\Carbon::parse($review->created_at)->format('d/m/Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="review-content">{{ $review->content }}</div>
                                    </div>
                                @endforeach
                        @else
                            <p>Chưa có lượt đánh giá nào</p>
                        @endif
                    </div>
                </div>

                <div class="review-form p-4 bg-light rounded-3 shadow-sm">
                    <h2 class="h4 mb-4">Gửi đánh giá của bạn về sản phẩm</h2>
                    <form>
                        <div class="row g-3">

                            {{-- Họ tên --}}
                            <div class="col-md-6">
                                <label for="user_name" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" id="reviewer_name" name="reviewer_name"  ng-model="formReview.name">
                                <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.name']">
                                                            <span >
                                                                <% errors['formReview.name'][0] %>
                                                            </span>
                                </div>
                            </div>

                            {{-- Số điện thoại --}}
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" name="phone"  ng-model="formReview.phone">
                                <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.phone']">
                                                            <span >
                                                                <% errors['formReview.phone'][0] %>
                                                            </span>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="user_name" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" id="review_title" name="review_title"  ng-model="formReview.title">
                                <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.title']">
                                                            <span >
                                                                <% errors['formReview.title'][0] %>
                                                            </span>
                                </div>
                            </div>



                            {{-- Địa chỉ --}}
{{--                            <div class="col-md-6">--}}
{{--                                <label for="address" class="form-label">Địa chỉ</label>--}}
{{--                                <input type="text" class="form-control" id="address" name="address" ng-model="formReview.address">--}}

{{--                                <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.address']">--}}
{{--                                                            <span >--}}
{{--                                                                <% errors['formReview.address'][0] %>--}}
{{--                                                            </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            {{-- Số sao đánh giá --}}
                            <div class="col-md-6">
                                <label class="form-label d-block mb-1">Sao đánh giá</label>
                                <div class="star-rating">
                                 <span class="jdgm-form__rating" style="cursor: pointer;">
                                                    <a ng-repeat="star in [1,2,3,4,5]" class="jdgm-star" ng-class="{
                                                               'jdgm--on': star <= formReview.rating,
                                                               'jdgm--off': star >  formReview.rating }"
                                                       title="<%star%> star"
                                                       data-alt="<%star%>"
                                                       aria-label="<%star%> star"
                                                       role="button"
                                                       ng-click="formReview.rating = star">
                                                            </a>
                                                            <input name="score"
                                                                   type="hidden"
                                                                   ng-model="formReview.rating">
                                                </span>
                                </div>
                            </div>

                            {{-- Nội dung đánh giá --}}
                            <div class="col-12">
                                <label for="content" class="form-label">Nội dung đánh giá</label>
                                <textarea class="form-control" id="content" name="content"  ng-model="formReview.content"
                                          rows="4" maxlength="500" placeholder="Chia sẻ cảm nhận của bạn..." ></textarea>

                                <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.content']">
                                                            <span >
                                                                <% errors['formReview.content'][0] %>
                                                            </span>
                                </div>
                            </div>

                            {{-- Nút gửi --}}
                            <style>
                                /* CSS đặt sau Bootstrap */
                                .thank-you-message {
                                    background-color: #e6f4ea;    /* nền xanh nhạt */
                                    border: 1px solid #28a745;    /* viền xanh lá đậm */
                                    color: #155724;               /* text xanh đậm */
                                    padding: .5rem 1rem;          /* khoảng đệm */
                                    border-radius: .5rem;         /* bo góc mềm */
                                    font-weight: 500;
                                    font-size: .95rem;
                                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
                                }

                                /* Icon xanh lá để nhấn mạnh thành công */
                                .thank-you-message .fa-check-circle {
                                    color: #28a745;
                                    font-size: 1.2rem;
                                }

                                /* Khi hover (tuỳ chọn) */
                                .thank-you-message:hover {
                                    background-color: #d4edda;
                                    border-color: #218838;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
                                }


                                @media (max-width: 767px) {
                                    .thank-you-message {
                                        display: flex !important;           /* chuyển về flex full-width */
                                        justify-content: center;            /* căn giữa ngang */
                                        align-items: center;                /* căn giữa dọc */
                                        width: 100%;                        /* chiếm hết chiều ngang */
                                        padding: 0.5rem 0.75rem;            /* đệm nhỏ gọn */
                                        font-size: 0.9rem;                  /* chữ hơi nhỏ */
                                        text-align: center;                 /* nếu xuống dòng vẫn đẹp */
                                        border-radius: 0.5rem;              /* bo góc mềm mại */
                                    }

                                    .thank-you-message .fa-check-circle {
                                        font-size: 1rem;                    /* biểu tượng nhỏ hơn */
                                        margin-right: 0.5rem;               /* khoảng cách vừa đủ */
                                    }
                                }

                            </style>
                            <div class="col-12 text-end">
                                <div ng-if="checkSendRating" class="thank-you-message d-inline-flex align-items-center" style="margin-bottom: 10px">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <span>Cảm ơn bạn đã gửi đánh giá. Đánh giá của bạn đang được xét duyệt.</span>
                                </div>
                                <button type="button" class="btn btn-primary px-4" ng-click="submitReview()">Gửi đánh giá</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
 <script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>


 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const detailEl = document.getElementById('productDetailContent');
         const btn      = document.getElementById('toggleProductDetailBtn');

         detailEl.addEventListener('shown.bs.collapse',  () => btn.classList.add('opened'));
         detailEl.addEventListener('hidden.bs.collapse', () => btn.classList.remove('opened'));
     });

     document.addEventListener('DOMContentLoaded', function() {
         var detailEl = document.getElementById('productDetailContent');
         var bsCollapse = new bootstrap.Collapse(detailEl, {
             toggle: true  // sẽ mở sẵn
         });
         // và đồng thời set nút thành opened
         document
             .getElementById('toggleProductDetailBtn')
             .classList.add('opened');
     });

 </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.quantity-selector');
        if (!container) return;

        const input = container.querySelector('.qty-input');
        const btnMinus = container.querySelector('.qty-btn.minus');
        const btnPlus  = container.querySelector('.qty-btn.plus');

        btnMinus.addEventListener('click', () => {
            let val = parseInt(input.value) || 1;
            if (val > parseInt(input.min)) {
                input.value = val - 1;
                input.dispatchEvent(new Event('change'));
            }
        });

        btnPlus.addEventListener('click', () => {
            let val = parseInt(input.value) || 0;
            input.value = val + 1;
            input.dispatchEvent(new Event('change'));
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        // Thumbnails swiper
        const galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 8,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        // Main gallery swiper
        new Swiper('.gallery-top', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.gallery-top .swiper-button-next',
                prevEl: '.gallery-top .swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs,
            },
        });
    });

</script>

<script>
        document.addEventListener('DOMContentLoaded', function(){
            const MAX_CHARS = 200;
            document.querySelectorAll('.review-content').forEach(function(el){
                const full = el.textContent.trim();
                if(full.length > MAX_CHARS){
                    const shortText = full.slice(0, MAX_CHARS) + '...';
                    el.textContent = shortText;
                    const btn = document.createElement('button');
                    btn.className = 'btn-read-more';
                    btn.textContent = 'Xem thêm';
                    el.after(btn);
                    btn.addEventListener('click', function(){
                        if(btn.textContent === 'Xem thêm'){
                            el.textContent = full;
                            btn.textContent = 'Thu gọn';
                        } else {
                            el.textContent = shortText;
                            btn.textContent = 'Xem thêm';
                        }
                    });
                }
            });
        });
    </script>

<script>
     app.controller('Product', function ($rootScope, $scope, $interval, cartItemSync) {
         $scope.product = @json($product);
         $scope.item_qty = 1;

         $scope.addToCart = function () {
             url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
             url = url.replace('productId', {{$product->id}});

             jQuery.ajax({
                 type: 'POST',
                 url: url,
                 headers: {
                     'X-CSRF-TOKEN': CSRF_TOKEN
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

         $scope.buyNow = function () {
             url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
             url = url.replace('productId', {{$product->id}});

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
                         $interval.cancel($rootScope.promise);
                         $rootScope.promise = $interval(function () {
                             cartItemSync.items = response.items;
                             cartItemSync.total = response.total;
                             cartItemSync.count = response.count;
                         }, 1000);

                         window.location.href = "{{ route('cart.checkout') }}";

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

         $scope.formReview = { rating: 0 };
         $scope.formReview.product_id = {{ $product->id }};
         $scope.submitReview = function () {
             jQuery.ajax({
                 type: 'POST',
                 url: '{{ route('front.submitRating') }}',
                 headers: {
                     'X-CSRF-TOKEN': CSRF_TOKEN
                 },
                 data: {
                     formReview: $scope.formReview
                 },
                 success: function (response) {
                     if (response.success) {
                         $scope.formReview = { rating: 0 };
                         $scope.errors = [];
                         $scope.checkSendRating = true;
                         $scope.$apply();
                     } else {
                         $scope.errors = response.errors;
                         toastr.warning('Thao tác thất bại');
                     }
                 },
                 error: function () {
                     toastr.error('Thao tác thất bại');
                 },
                 complete: function () {
                     $scope.$applyAsync();
                 }
             });
         }
     })
 </script>
@endpush
