@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path ?? '') }}
@endsection

@section('css')

@endsection

@section('content')
<div ng-controller="registerBlock">
    <style>
        /*.hero3-section-area {*/
        /*    !* đảm bảo slide cao đủ chứa ảnh *!*/
        /*    min-height: 800px; !* hoặc height tuỳ bạn *!*/
        /*}*/
        /*.hero3-section-area .banner-bg {*/
        /*    position: absolute;*/
        /*    top: 0; left: 0;*/
        /*    width: 100%; height: 100%;*/
        /*    overflow: hidden;*/
        /*}*/
        /*.hero3-section-area .banner-bg img {*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    object-fit: cover; !* cắt/scale ảnh cho phủ đầy vùng *!*/
        /*}*/
        /*.hero3-section-area .container {*/
        /*    position: relative;*/
        /*    z-index: 2; !* để nội dung hiển thị trên ảnh *!*/
        /*}*/

        /* --- giữ nguyên cho desktop --- */
        .hero3-section-area {
            position: relative;
            /* bạn có thể dùng aspect-ratio để lock tỉ lệ, thay min-height */
            /* aspect-ratio: 16 / 9; */
            min-height: 800px; /* nếu bạn vẫn muốn */
        }
        .hero3-section-area .banner-bg {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            overflow: hidden;
        }
        .hero3-section-area .banner-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
        }


        @media (max-width: 768px) {
            .hero3-section-area {
                padding-top: 100px !important;
                padding-bottom: 0px !important;
                min-height: auto !important;   /* bỏ giới hạn cứng */
                height: auto !important;       /* co theo ảnh */
            }
            .hero3-section-area .banner-bg {
                position: relative !important; /* để img tính height:auto */
                height: auto !important;
            }
            .hero3-section-area .banner-bg img {
                width: 100% !important;
                height: auto !important;          /* tự cao dựa vào tỉ lệ ảnh */
                object-fit: contain !important;   /* luôn hiển thị đầy đủ */
                object-position: center center !important;
            }
        }
    </style>
    <div class="hero-all-main-slider" >
        <div class="hero-main-slider">
            @foreach($banners as $banner)
                <div class="hero3-section-area sp1 position-relative overflow-hidden">
                    <div class="banner-bg position-absolute top-0 start-0 w-100 h-100">
                        <img src="{{ @$banner->image->path ?? '' }}"
                             class="w-100 h-100 object-fit-cover"
                             alt="Banner">
                    </div>
                </div>
            @endforeach
{{--            <div class="hero3-section-area sp1">--}}
{{--                <div class="bg-img">--}}
{{--                    <img src="/site/img/all-images/hero/hero-img5.png" alt="">--}}
{{--                </div>--}}
{{--                <div class="container">--}}
{{--                    <div class="row align-items-center">--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="hero-header">--}}
{{--                                <h5><img src="/site/img/icons/sub-logo1.svg" alt=""> Gentle Care for Pain-Free Smiles</h5>--}}
{{--                                <div class="space18"></div>--}}
{{--                                <h1>Redefining Dental Care With A Personal Touch</h1>--}}
{{--                                <div class="space20"></div>--}}
{{--                                <p>At Medicax Clinic, we’re dedicated providing exceptional dental care that puts your smile first, with an team skilled professional.</p>--}}
{{--                                <div class="space28"></div>--}}
{{--                                <div class="btn-area1">--}}
{{--                                    <a href="contact.html" class="vl-btn3"><span class="text">Schedule Your Visit Now <i class="fa-solid fa-arrow-right"></i></span></a>--}}
{{--                                    <a href="https://www.youtube.com/watch?v=Y8XpQpW5OVY" class="play-btn popup-youtube"> <span class="video"><i class="fa-solid fa-play"></i></span> Play Video</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="1000">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
        <div class="testimonial-arrows">
            <div class="testimonial-prev-arrow">
                <button><i class="fa-solid fa-angle-left"></i></button>
            </div>
            <div class="testimonial-next-arrow">
                <button><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </div>
    </div>


    <style>
        .video-block {
            position: relative;
            /*display: inline-block;*/
        }

        .video-block img {
            display: block;
            width: 100%;
            height: auto;
        }

        /* icon chính giữa, pointer và hover effect */
        .video-block .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            width: 60px;
            height: 60px;
            background: rgba(0,0,0,0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;
            transition: background .2s;
            overflow: hidden; /* để chứa sóng trong vòng tròn */

            animation: float 3s ease-in-out infinite;
            transition: background .2s;
        }

        /* Sóng lan tỏa */
        .video-block .play-icon::before {
            content: "";
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            animation: ripple 1.5s ease-out infinite;
        }

        /* Khi hover, tăng tốc sóng và làm nổi icon */
        .video-block .play-icon:hover {
            background: rgba(0,0,0,0.7);
        }
        .video-block .play-icon:hover::before {
            animation-duration: 1s;
        }

        /* Keyframes cho sóng */
        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 0.6;
            }
            70% {
                transform: scale(1.8);
                opacity: 0;
            }
            100% {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        /* Keyframes cho hiệu ứng nổi lên–xuống */
        @keyframes float {
            0%, 100% {
                transform: translate(-50%, -50%) translateY(0);
            }
            50% {
                transform: translate(-50%, -50%) translateY(-10px);
            }
        }
        .video-block .play-icon i {
            position: relative; /* đưa icon lên trên sóng */
            font-size: 1.8rem;
            color: #fff;
        }

    </style>
    <div class="about4-section-area sp1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-images-area">
                        <div class="img1 image-anime reveal video-block">
                            <img src="{{ @$about->image->path ?? '' }}" alt="">

                            <a href="{{ $about->youtube }}" class="play-icon play-btn popup-youtube">
                                <span class="video"><i class="fa-solid fa-play"></i></span>
                            </a>

                        </div>

                        <div class="img2">
                            <img src="/site/img/elements/elements18.png" alt="" class="elements18 keyframe5">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about4-heading heading4">
                        <h5 class="vl-section-subtitle" data-aos="fade-left" data-aos-duration="800">
                            Về chúng tôi
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8" fill="none">
                                <path d="M0.667969 4.00033H11.049M8.00137 7.33366L11.3346 4.00033L8.0013 0.666992" stroke="#02015A" stroke-width="1.5"/>
                            </svg>
                        </h5>
                        <div class="space24"></div>
                        <h2 class="vl-section-title text-anime-style-3">{{ $about->title }}</h2>
                        <p data-aos="fade-left" data-aos-duration="900">
                            {!! $about->intro !!}
                        </p>
                        @if ($about->results && count($about->results))
                            <div class="row">
                                @foreach ($about->results as $group)
                                    <div class="col-lg-6">
                                        <div class="counter-boxarea" data-aos="fade-left" data-aos-duration="1000">
                                            <h2><span class="">{{ $group['title'] }}</span></h2>
                                            <p>{{ $group['content'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="case1-section-area" style="margin-bottom: 75px">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="heading6 space-margin60" style="margin-bottom: 40px">
                        <h5 class="vl-section-subtitle"><img src="/site/img/icons/sub-logo1.svg" alt="">Dịch vụ</h5>
                        <h2 class="vl-section-title text-anime-style-3">Dịch vụ của chúng tôi</h2>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="case-slider-area owl-carousel">
                        @foreach($services as $service)
                            <div class="case-boxarea">
                                <div class="img1">
                                    <img src="{{ @$service->image->path ?? '' }}" alt="">
                                </div>
                                <div class="content-area">
                                    <a href="#" class="title">{{ $service->name }}</a>
                                    <div class="description">
                                        {{ $service->description }}
                                    </div>
                                </div>

                            </div>

                        @endforeach
                    </div>
                </div>
            </div>


            <style>
                /* 1. Stage + Item flex như trước */
                .case-slider-area.owl-carousel .owl-stage {
                    display: flex;
                    align-items: stretch;
                }
                .case-slider-area.owl-carousel .owl-item {
                    display: flex;
                }

                /* 2. Ép case-boxarea full height của owl-item */
                .case-boxarea {
                    display: flex;
                    flex-direction: column;
                    flex: 1 1 auto;
                }

                /* 3. Khóa chiều cao vùng ảnh, đảm bảo đồng đều */
                .case-boxarea .img1 {
                    width: 100%;
                    height: 300px;         /* <-- bạn chỉnh cao này cho phù hợp */
                    flex-shrink: 0;        /* không cho phép vùng ảnh co nhỏ */
                    overflow: hidden;
                }
                /* 4. Bắt ảnh fill đầy vùng, crop đều */
                .case-boxarea .img1 img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* 5. Phần content giãn đều phần còn lại */
                .case-boxarea .content-area {
                    flex: 1 1 auto;
                    display: flex;         /* nếu muốn căn giữa nội dung */
                    align-items: center;   /* dọc */
                    justify-content: center;/* ngang */
                    padding: 1rem;
                }

                .case-boxarea {
                    display: flex;
                    flex-direction: column;
                    flex: 1 1 auto;
                }

                .case-boxarea .content-area {
                    display: flex;
                    flex-direction: column;
                    flex: 1 1 auto;
                    padding: 1rem;           /* tuỳ chỉnh khoảng cách bên trong */
                }

                .case-boxarea .content-area .title {
                    font-size: 1.1rem;
                    font-weight: 600;
                    margin-bottom: 0.5rem;
                    text-decoration: none;
                    color: #333;
                }

                .case-boxarea .content-area .description {
                    font-size: 1.2rem;
                    color: #fff;
                    line-height: 1.4;
                    /* flex-none để mô tả không giãn */
                    flex: none;
                }
            </style>
        </div>
    </div>

    <div class="service8 sp2" style="padding: 50px 0 50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="heading8 text-center space-margin60" style="margin-bottom: 30px">
                        <h5 data-aos="fade-left" data-aos-duration="800"><img src="/site/img/icons/sub-logo1.svg" alt="">Quy trình khám chữa</h5>
                        <h2 class="text-anime-style-3">Quy trình khám chữa</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <style>

                </style>
                @foreach($treatmentSteps as $treatmentStep)
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="700">
                        <div class="service8-boxarea">
                            <div class="service8-widgetbox">
                                <div class="img1">
                                    <img src="{{ @$treatmentStep->image->path ?? '' }}" alt="">
                                </div>
                                <div class="content-area text-center">
                                    <div class="icons" style="height: 0; width: 0">
                                        <img src="#" alt="">
                                    </div>
                                    <div class="space24"></div>
                                    <a href="#" class="title">{{ $treatmentStep->title }}</a>
                                </div>
                            </div>

                            <div class="service8-widget-box2" style="background-image: url({{ @$treatmentStep->image->path ?? '' }});
                    background-position: center; background-repeat: no-repeat; background-size: cover; width: 100%">
                                <div class="content-area text-center">

                                    <div class="space24"></div>
                                    <a href="service-single.html" class="title">{{ $treatmentStep->title }}</a>
                                    <div class="space16"></div>
                                    <p>{{ $treatmentStep->content }}</p>
                                    <div class="space24"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <style>
        /* 1. Card làm flex-column để control height */
        .shop-single-boxarea {
            display: flex;
            flex-direction: column;
            height: 100%;            /* chiếm full height của owl-item */
        }

        /* 2. Khóa height cho vùng ảnh, đồng nhất tất cả */
        .shop-single-boxarea .img1 {
            width: 100%;
            height: 200px;           /* tùy chỉnh theo thiết kế */
            flex-shrink: 0;          /* không cho shrink */
            overflow: hidden;
        }
        .shop-single-boxarea .img1 img {
            width: 100%;
            height: 100%;
            object-fit: cover;       /* ảnh phủ kín, crop nếu cần */
        }

        /* 3. Phần nội dung dưới ảnh flex-grow để giãn đều */
        .shop-single-boxarea ul.star,
        .shop-single-boxarea .title,
        .shop-single-boxarea p,
        .shop-single-boxarea .price-cart {
            margin: 0 0 0.5rem;
        }
        .shop-single-boxarea .title,
        .shop-single-boxarea p {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* 4. Ellipsis cho tiêu đề (1 dòng) */
        .shop-single-boxarea .title {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.2;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        /* 5. Ellipsis cho intro (max 2 dòng) */
        .shop-single-boxarea p {
            font-size: 0.875rem;
            line-height: 1.4;
            -webkit-line-clamp: 2;      /* số dòng hiển thị */
            text-overflow: ellipsis;
            -webkit-box-orient: vertical;
            display: -webkit-box;
        }

        /* 6. Đẩy phần giá & cart xuống đáy */
        .shop-single-boxarea .price-cart {
            margin-top: auto;           /* đẩy xuống cuối card */
        }

        /* 7. Đảm bảo owl-item stretch cao bằng nhau */
        .shop-single-slider.owl-carousel .owl-item {
            display: flex;
            align-items: stretch;
        }






        .price-cart {
            display: flex;
            align-items: center;
            gap: 1rem; /* Khoảng cách giữa giá và nút */
        }

        .price-cart .price {
            margin: 0;
            font-size: 1.0rem;
            display: flex;
            align-items: baseline;
            gap: 0.5rem;
        }

        .price-cart .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 1rem;
        }

        .price-cart .new-price {
            color: #e60023; /* Màu đỏ nổi bật, bạn có thể đổi theo theme */
            font-weight: bold;
            font-size: 1.2rem;
        }

        .price-cart .add-to-cart-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #e60023;
            border-radius: 4px;
            padding: 0.5rem;
            transition: background-color 0.2s;
        }

        .price-cart .add-to-cart-btn:hover {
            background-color: #c5001f;
        }

    </style>
    @foreach($categoriesSpecial as $categorySpecial)
        <div class="shop-others-area sp1" style="padding: 70px 0 70px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="heading5 space-margin60">
                            <h5 data-aos="fade-left" data-aos-duration="800"><img src="/site/img/icons/sub-logo1.svg" alt="">{{ $categorySpecial->name }}</h5>
                            <h2 class="text-anime-style-3">{{ $categorySpecial->name }}</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-single-slider owl-carousel">
                            @foreach($categorySpecial->products as $product)
                                <div class="shop-single-boxarea">
                                    <div class="img1 image-anime">
                                        <img src="{{ @$product->image->path ?? '' }}" alt="">
                                    </div>

                                    <div class="space14"></div>
                                    <ul class="star">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <div class="space12"></div>
                                    <a href="{{ route('front.get-product-detail', ['slug' => $product->slug]) }}" class="title" title="{{ $product->name }}">{{ $product->name }}</a>
                                    <div class="space12"></div>
                                    <p> {{ $product->intro }} </p>
                                    <div class="space24"></div>

                                    <div class="price-cart">
                                        <p class="price">
                                            @if($product->base_price > 0)
                                                <span class="old-price">{{ formatCurrency($product->base_price) }}đ</span>
                                            @endif

                                            <span class="new-price">{{ formatCurrency($product->price) }}đ</span>
                                        </p>
                                        <a href="javascript:void(0)" ng-click="addToCart({{ $product->id }})" class="add-to-cart-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                                <path d="M6.11719 6V4.5C6.11719 2.42893 7.79612 0.75 9.8672 0.75C11.9383 0.75 13.6172 2.42893 13.6172 4.5V6H15.8672C16.2814 6 16.6172 6.33579 16.6172 6.75V15.75C16.6172 16.1642 16.2814 16.5 15.8672 16.5H3.86719C3.45298 16.5 3.11719 16.1642 3.11719 15.75V6.75C3.11719 6.33579 3.45298 6 3.86719 6H6.11719ZM6.11719 7.5H4.61719V15H15.1172V7.5H13.6172V9.00003H12.1172V7.5H7.61719V9.00003H6.11719V7.5ZM7.61719 6H12.1172V4.5C12.1172 3.25736 11.1098 2.25 9.8672 2.25C8.62453 2.25 7.61719 3.25736 7.61719 4.5V6Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

    <div class="others-section-area" data-aos="fade-down" data-aos-duration="1000" style="padding: 0 0 20px 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-play-area">
                        <img src="/site/img/elements/elements3.png" alt="" class="elements3">
                        <a href="{{ $videoBlock->youtube }}" class="popup-youtube play-img">
                            <img src="{{ @$videoBlock->image->path ?? '' }}" alt="">
                        </a>
                        <div class="play-btn">
                            <a href="{{ $videoBlock->youtube }}" style="font-size: 18px" class="popup-youtube"><span><i class="fa-solid fa-play"></i></span>{{ $videoBlock->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .video-container {
            position: relative;
            width: 100%;
            /* tỉ lệ 16:9 */
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

    </style>
    <div class="team2-section-area sp1" style="padding: 50px 0 60px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="team-header space-margin60 heading2">
                        <h5><img src="/site/img/icons/sub-logo1.svg" alt="">Cảm nhận của khách hàng</h5>
                        <h2 class="text-anime-style-3">Cảm nhận của khách hàng</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="team-single-slider2 owl-carousel">
                        @foreach($reviewsVideo as $rVideo)
                            <div class="team-single-boxarea">
                                <div class="img1">
                                    <div class="video-container">
                                        <iframe
                                            class="team-video"
                                            data-watch="{{ $rVideo->youtube }}"
                                            title="{{ $rVideo->youtube }}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>

                                </div>
                                <div class="content-area">
                                    <a href="https://www.youtube.com/watch?v=EbfKXOeTjOo" class="title" target="_blank">{{ $rVideo->name }}</a>
                                    <div class="space16"></div>
                                    <p>{{ $rVideo->position }}</p>
                                </div>
                            </div>

                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="testimonial2-section-area sp1" style="background-image: url(/site/img/all-images/bg/bg1.png); background-position: center;
     background-repeat: no-repeat; background-size: cover; padding: 60px 0 60px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="heading2 text-center space-margin60">
                        <h5><img src="/site/img/icons/sub-logo1.svg" alt="">Đánh giá khách hàng</h5>
                        <h2 class="text-anime-style-3">Đánh giá khách hàng</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="testimonial-single-slider2 owl-carousel">
                        @foreach($reviewsText as $rText)
                            <div class="single-slider-box">
                                <div class="list-area">
                                    <ul>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="24" viewBox="0 0 28 24" fill="none">
                                        <path d="M15.3469 5.74159C15.3469 7.20825 15.7303 8.43992 16.4969 9.43659C17.0403 10.1233 17.7775 10.5744 18.7086 10.7899C19.6253 11.0033 20.4919 11.0183 21.2753 10.8366C21.5419 12.4199 21.1086 14.0966 20.0086 15.8733C18.9064 17.6488 17.4853 18.9838 15.7453 19.8783L18.3803 23.6699C19.7136 23.0099 20.9803 22.1733 22.1469 21.1616C23.3303 20.1499 24.3803 18.9866 25.3136 17.6716C26.2469 16.3566 26.9469 14.8716 27.3969 13.1883C27.8469 11.5049 27.9719 9.78825 27.7569 8.02159C27.4769 5.68825 26.7236 3.82159 25.4969 2.43825C24.2714 1.03714 22.7447 0.336586 20.9169 0.336586C19.3086 0.336586 17.9736 0.81992 16.9169 1.79992C15.8714 2.75992 15.3492 4.07548 15.3503 5.74659L15.3469 5.74159ZM0.140263 5.74159C0.140263 7.20825 0.523597 8.43992 1.29026 9.43659C1.83471 10.1366 2.57193 10.5905 3.50193 10.7983C4.43526 11.0038 5.29082 11.016 6.06859 10.8349C6.33526 12.4016 5.9186 14.0849 4.81526 15.8683C3.71526 17.6349 2.29526 18.9683 0.555264 19.8683L3.1836 23.6699C4.51804 23.0099 5.7736 22.1738 6.95026 21.1616C8.14426 20.1348 9.20475 18.9623 10.1069 17.6716C11.0336 16.3549 11.7236 14.8716 12.1736 13.1883C12.6307 11.5062 12.7536 9.75089 12.5353 8.02159C12.2586 5.68825 11.5086 3.82159 10.2853 2.43825C9.06304 1.04714 7.53915 0.351587 5.7136 0.351587C4.10248 0.349365 2.76804 0.836585 1.71026 1.81325C0.664706 2.77325 0.141374 4.08881 0.140263 5.75992V5.74159Z" fill="#1C293F"/>
                                    </svg>
                                </div>
                                <div class="space24"></div>
                                <p class="pera">{{ $rText->message }}</p>
                                <div class="space32"></div>
                                <div class="others-boxarea">
                                    <div class="author-boxarea">
                                        <div class="img">
                                            <img src="{{ @$rText->image->path ?? '' }}" alt="">
                                        </div>
                                        <div class="text">
                                            <a href="#">{{ $rText->name }}</a>
                                            <div class="space12"></div>
                                            <p>{{ $rText->position }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact2-section-area sp2" style="padding: 60px 0 10px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="heading2 text-center space-margin60">
                        <h5><img src="/site/img/icons/sub-logo1.svg" alt="">Đăng ký tư vấn khám miễn phí</h5>
                        <h2>Đăng ký tư vấn khám miễn phí</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="1000">
                    <div class="contact-boxarea">
                        <h4>HỘI ĐỒNG BÁC SĨ CHUYÊN KHOA NHIỀU <br class="d-lg-block d-none">
                            NĂM KINH NGHIỆM</h4>
                        <div class="space20"></div>
                        <p>Đăng ký tư vấn, Khám 1:1 với chuyên gia
                            <br class="d-lg-block d-none">
                            Hoàn toàn miễn phí </p>
                        <div class="space6"></div>
                        <div class="row" >
                            <form id="form-register">
                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <input type="text" name="name" placeholder="Họ và tên*">
                                        <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <input type="text" name="phone" placeholder="Số điện thoại*">
                                        <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <input type="text" name="address" placeholder="Địa chỉ*">
                                        <div class="invalid-feedback d-block" ng-if="errors['address']"><% errors['address'][0] %></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <textarea name="message" placeholder="Lời nhắn"></textarea>
                                        <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>

                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="space10"></div>
                                    <div class="input-area">
                                        <button type="button" ng-click="submitRegister()" class="vl-btn2"><span class="text">Đăng ký ngay<i class="fa-solid fa-arrow-right"></i></span></button>
                                    </div>
                                </div>

                                <style>
                                    .send-success-message {
                                        display: flex;
                                        align-items: center;
                                        background-color: #e6ffed;     /* nền xanh nhạt */
                                        border: 1px solid #71d58b;      /* viền xanh tươi */
                                        color: #2d6a4f;                 /* chữ xanh đậm */
                                        padding: 12px 16px;
                                        border-radius: 8px;
                                        font-size: 1rem;
                                        gap: 12px;                      /* khoảng cách icon - text */
                                        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
                                    }

                                    .send-success-message i {
                                        font-size: 1.4rem;
                                    }

                                    .send-success-message p {
                                        margin: 0;
                                        line-height: 1.4;
                                    }
                                </style>

                                <div class="col-lg-12" ng-if="sendSuccess">
                                    <div class="space10"></div>
                                    <div class="send-success-message">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p>Chúc mừng bạn đã nhận một phiếu miễn phí</p>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="images image-anime reveal">
                        <img src="{{ @$registerBlock->image->path ?? '' }}" alt="">
                    </div>
                </div>
                <div class="space60"></div>
                <style>
                    /* Container card flex */
                    .single-box {
                        display: flex;
                        align-items: flex-start;   /* icon ở trên cùng cạnh text */
                    }

                    /* Khung icon cố định */
                    .single-box .icons {
                        width: 40px;
                        height: 40px;
                        flex-shrink: 0;
                        margin-right: 1rem;
                    }

                    /* SVG scale vừa khung, giữ tỉ lệ */
                    .single-box .icons svg {
                        width: 100%;
                        height: 100%;
                        display: block;
                    }

                    /* Text chiếm phần còn lại, xuống dòng gọn */
                    .single-box .text {
                        flex: 1;
                    }

                    /* Cho phép địa chỉ dài xuống dòng */
                    .single-box .text a {
                        display: inline-block;
                        word-break: break-word;   /* hoặc break-all nếu cần */
                        white-space: normal;
                        color: inherit;
                        text-decoration: none;
                    }

                    .single-box .text a:hover {
                        text-decoration: underline;
                    }

                </style>
                <div class="col-lg-12">
                    <div class="contact-single-boxarea2">
                        <div class="row">
                            <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="800">
                                <div class="single-box">
                                    <div class="icons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                            <path d="M16.305 29.3327C23.6688 29.3327 29.6383 23.3631 29.6383 15.9993C29.6383 8.63555 23.6688 2.66602 16.305 2.66602C8.94122 2.66602 2.97168 8.63555 2.97168 15.9993C2.97168 23.3631 8.94122 29.3327 16.305 29.3327Z" stroke="#1C293F" stroke-width="2.5"/>
                                            <path d="M16.9351 9.15785C16.9351 8.51839 16.4167 8 15.7772 8C15.1378 8 14.6194 8.51839 14.6194 9.15785H16.9351ZM18.9116 18.3738C18.4594 17.9217 17.7264 17.9217 17.2743 18.3738C16.8221 18.826 16.8221 19.559 17.2743 20.0112L18.9116 18.3738ZM19.59 22.3269C20.0421 22.7791 20.7751 22.7791 21.2273 22.3269C21.6795 21.8747 21.6795 21.1417 21.2273 20.6895L19.59 22.3269ZM14.6194 9.15785V14.5611H16.9351V9.15785H14.6194ZM17.2743 20.0112L19.59 22.3269L21.2273 20.6895L18.9116 18.3738L17.2743 20.0112ZM16.9351 16.8768C16.9351 17.5163 16.4167 18.0347 15.7772 18.0347V20.3504C17.6956 20.3504 19.2508 18.7951 19.2508 16.8768H16.9351ZM15.7772 18.0347C15.1378 18.0347 14.6194 17.5163 14.6194 16.8768H12.3037C12.3037 18.7951 13.8589 20.3504 15.7772 20.3504V18.0347ZM14.6194 16.8768C14.6194 16.2374 15.1378 15.719 15.7772 15.719V13.4033C13.8589 13.4033 12.3037 14.9585 12.3037 16.8768H14.6194ZM15.7772 15.719C16.4167 15.719 16.9351 16.2374 16.9351 16.8768H19.2508C19.2508 14.9585 17.6956 13.4033 15.7772 13.4033V15.719Z" fill="#1C293F"/>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <h4>Thời gian làm việc</h4>
                                        <a href="#">{{ $config->work_hours }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="900">
                                <div class="single-box">
                                    <div class="icons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                            <path d="M16.3031 28C20.9697 23.2 25.6364 18.9019 25.6364 13.6C25.6364 8.29807 21.4577 4 16.3031 4C11.1484 4 6.96973 8.29807 6.96973 13.6C6.96973 18.9019 11.6364 23.2 16.3031 28Z" stroke="#1C293F" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.3037 17.332C18.5129 17.332 20.3037 15.5412 20.3037 13.332C20.3037 11.1229 18.5129 9.33203 16.3037 9.33203C14.0945 9.33203 12.3037 11.1229 12.3037 13.332C12.3037 15.5412 14.0945 17.332 16.3037 17.332Z" stroke="#1C293F" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <h4>Địa chỉ</h4>
                                        <a href="#">{{ $config->address_company }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="1000">
                                <div class="single-box">
                                    <div class="icons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                            <path d="M6.13704 24.0013L12.8037 16.0013M27.4704 24.0013L20.8037 16.0013M4.80371 10.668L14.437 17.0901C15.2924 17.6604 15.72 17.9456 16.1822 18.0562C16.5908 18.1542 17.0166 18.1542 17.4252 18.0562C17.8874 17.9456 18.315 17.6604 19.1704 17.0901L28.8037 10.668M9.07038 25.3346H24.537C26.0305 25.3346 26.7773 25.3346 27.3477 25.044C27.8494 24.7884 28.2574 24.3804 28.513 23.8786C28.8037 23.3082 28.8037 22.5614 28.8037 21.068V10.9346C28.8037 9.44117 28.8037 8.69442 28.513 8.124C28.2574 7.62222 27.8494 7.21428 27.3477 6.95862C26.7773 6.66797 26.0305 6.66797 24.537 6.66797H9.07038C7.57691 6.66797 6.83016 6.66797 6.25974 6.95862C5.75796 7.21428 5.35002 7.62222 5.09436 8.124C4.80371 8.69442 4.80371 9.44116 4.80371 10.9346V21.068C4.80371 22.5614 4.80371 23.3082 5.09436 23.8786C5.35002 24.3804 5.75796 24.7884 6.25974 25.044C6.83016 25.3346 7.5769 25.3346 9.07038 25.3346Z" stroke="#1C293F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <h4>Email</h4>
                                        <a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="vl-blog-6-area sp2" style="padding: 30px 0 10px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="vl-blog-1-section-box heading6 text-center space-margin60">
                        <h5 class="vl-section-subtitle"><img src="/site/img/icons/sub-logo1.svg" alt="">Tin tức & Sự kiện</h5>
                        <h2 class="vl-section-title text-anime-style-3">Tin tức & Sự kiện</h2>
                    </div>
                </div>
            </div>
            <style>
                /* 1. Cho mỗi cột cũng cao bằng nhau */
                .row[data-aos] {
                    display: flex;
                    flex-wrap: wrap;
                    /* đảm bảo các .col-lg-4 cùng chiều cao */
                }

                /* 2. Cho mỗi card fill hết height của cột */
                .col-lg-4 {
                    display: flex;
                    flex-direction: column;
                }
                .col-lg-4 .vl-blog-6-item {
                    display: flex;
                    flex-direction: column;
                    flex: 1;               /* chiếm hết khoảng trống */
                    background: #fff;      /* nếu cần */
                    border: 1px solid #eee;/* nếu cần */

                }

                /* 3. Nội dung card cũng flex để đẩy button “Chi tiết” xuống đáy */
                .vl-blog-1-content {
                    display: flex !important;
                    flex-direction: column;
                    flex: 1;
                }

                /* 4. Giới hạn tiêu đề 1 dòng với dấu “…” */
                .vl-blog-1-title a {
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }

                /* 5. Giới hạn intro 3 dòng với dấu “…” */
                .vl-blog-1-content p {
                    margin: 0;
                    /* chỉ áp dụng nếu trình duyệt hỗ trợ WebKit */
                    display: -webkit-box;
                    -webkit-line-clamp: 3;        /* số dòng tối đa */
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                /* 6. Đẩy nút “Chi tiết” xuống đáy */
                .vl-blog-1-icon {
                    margin-top: auto;
                }

                .vl-blog-1-thumb {
                    width: 100%;
                    /* bạn có thể thay 1 / 1 thành 16 / 9, 4 / 3... tuỳ tỉ lệ mong muốn */
                    aspect-ratio: 4 / 3;
                    overflow: hidden;
                    border-radius: 4px; /* nếu muốn bo góc */
                }

                /* 2. Bắt img phủ đầy khung và giữ tỉ lệ, cắt margin thừa */
                .vl-blog-1-thumb img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                }
            </style>
            <div class="row">
                @foreach($news as $post)
                    <div class="col-lg-4 col-md-6" data-aos="fade-left" data-aos-duration="900">
                        <div class="vl-blog-6-item">
                            <div class="vl-blog-1-thumb image-anime">
                                <img src="{{ $post->image->path ?? '' }}" alt="">
                            </div>
                            <div class="vl-blog-1-content">
                                <div class="vl-blog-meta">
                                    <ul>
                                        <li>
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                                    <g clip-path="url(#clip0_600_6756)">
                                                        <path d="M5.61627 0C5.80006 0 5.97633 0.0811248 6.1063 0.225528C6.23626 0.369931 6.30927 0.565783 6.30927 0.77V2.2099H13.7511V0.7799C13.7511 0.575683 13.8241 0.379831 13.9541 0.235428C14.084 0.0910248 14.2603 0.0099 14.4441 0.0099C14.6279 0.0099 14.8042 0.0910248 14.9341 0.235428C15.0641 0.379831 15.1371 0.575683 15.1371 0.7799V2.2099H17.82C18.345 2.2099 18.8484 2.44153 19.2197 2.85388C19.591 3.26622 19.7997 3.82551 19.8 4.4088V19.8011C19.7997 20.3844 19.591 20.9437 19.2197 21.356C18.8484 21.7684 18.345 22 17.82 22H1.98C1.45504 22 0.951572 21.7684 0.580278 21.356C0.208985 20.9437 0.000262479 20.3844 0 19.8011L0 4.4088C0.000262479 3.82551 0.208985 3.26622 0.580278 2.85388C0.951572 2.44153 1.45504 2.2099 1.98 2.2099H4.92327V0.7689C4.92353 0.564874 4.99666 0.369304 5.12659 0.225139C5.25653 0.0809736 5.43265 -2.0819e-07 5.61627 0ZM1.386 8.5162V19.8011C1.386 19.8878 1.40136 19.9736 1.43122 20.0537C1.46107 20.1337 1.50482 20.2065 1.55998 20.2678C1.61514 20.3291 1.68062 20.3777 1.75269 20.4109C1.82475 20.444 1.90199 20.4611 1.98 20.4611H17.82C17.898 20.4611 17.9752 20.444 18.0473 20.4109C18.1194 20.3777 18.1849 20.3291 18.24 20.2678C18.2952 20.2065 18.3389 20.1337 18.3688 20.0537C18.3986 19.9736 18.414 19.8878 18.414 19.8011V8.5316L1.386 8.5162ZM6.60033 16.0809V17.9135H4.95V16.0809H6.60033ZM10.7247 16.0809V17.9135H9.07533V16.0809H10.7247ZM14.85 16.0809V17.9135H13.1997V16.0809H14.85ZM6.60033 11.7062V13.5388H4.95V11.7062H6.60033ZM10.7247 11.7062V13.5388H9.07533V11.7062H10.7247ZM14.85 11.7062V13.5388H13.1997V11.7062H14.85ZM4.92327 3.7488H1.98C1.90199 3.7488 1.82475 3.76587 1.75269 3.79904C1.68062 3.83221 1.61514 3.88082 1.55998 3.94211C1.50482 4.0034 1.46107 4.07615 1.43122 4.15623C1.40136 4.2363 1.386 4.32213 1.386 4.4088V6.9773L18.414 6.9927V4.4088C18.414 4.32213 18.3986 4.2363 18.3688 4.15623C18.3389 4.07615 18.2952 4.0034 18.24 3.94211C18.1849 3.88082 18.1194 3.83221 18.0473 3.79904C17.9752 3.76587 17.898 3.7488 17.82 3.7488H15.1371V4.7707C15.1371 4.97492 15.0641 5.17077 14.9341 5.31517C14.8042 5.45958 14.6279 5.5407 14.4441 5.5407C14.2603 5.5407 14.084 5.45958 13.9541 5.31517C13.8241 5.17077 13.7511 4.97492 13.7511 4.7707V3.7488H6.30927V4.7608C6.30927 4.96502 6.23626 5.16087 6.1063 5.30527C5.97633 5.44968 5.80006 5.5308 5.61627 5.5308C5.43247 5.5308 5.25621 5.44968 5.12624 5.30527C4.99628 5.16087 4.92327 4.96502 4.92327 4.7608V3.7488Z" fill="#061D19"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_600_67562">
                                                            <rect width="19.8" height="22" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg> {{ \Illuminate\Support\Carbon::parse($post->create_at)->format('m/d/Y') }} <span> | </span></a>
                                        </li>
                                        <li>
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                    <path d="M4.9668 17.5C4.9668 14.2783 7.57847 11.6667 10.8001 11.6667C14.0218 11.6667 16.6335 14.2783 16.6335 17.5M14.1335 5.83333C14.1335 7.67428 12.641 9.16667 10.8001 9.16667C8.95918 9.16667 7.4668 7.67428 7.4668 5.83333C7.4668 3.99238 8.95918 2.5 10.8001 2.5C12.641 2.5 14.1335 3.99238 14.1335 5.83333Z" stroke="#061D19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>{{ $post->user_create->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="space18"></div>
                                <h4 class="vl-blog-1-title">
                                    <a href="{{ route('front.blogDetail', ['slug' => $post->slug]) }}">
                                        {{ $post->name }}
                                    </a>
                                </h4>
                                <div class="space14"></div>
                                <p> {{ $post->intro }}</p>
                                <div class="space24"></div>
                                <div class="vl-blog-1-icon">
                                    <a href="{{ route('front.blogDetail', ['slug' => $post->slug]) }}" class="readmore">Chi tiết<i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <div id="popupModal" class="modal-overlay">
        <div class="modal-window">
            <button class="modal-close" id="modalClose">&times;</button>
            <div class="modal-content-1">
                <!-- Left: Form -->
                <div class="modal-form">
                    <h2>Đăng ký tư vấn miễn phí</h2>
                    <form id="popup-register">
                        <div class="form-group">
                            <label for="name">Họ & Tên</label>
                            <input type="text" id="name" name="name" placeholder="Họ và tên">
                            <div class="invalid-feedback d-block" ng-if="errors_['name']"><% errors_['name'][0] %></div>

                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone" placeholder="Số điện thoại">
                            <div class="invalid-feedback d-block" ng-if="errors_['phone']"><% errors_['phone'][0] %></div>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" id="address" name="address" placeholder="Nhập địa chỉ">
                            <div class="invalid-feedback d-block" ng-if="errors_['address']"><% errors_['address'][0] %></div>
                        </div>
                        <div class="form-group">
                            <label for="message">Lời nhắn</label>
                            <textarea id="message" name="message" rows="4" placeholder="Nhập lời nhắn"></textarea>
                            <div class="invalid-feedback d-block" ng-if="errors_['message']"><% errors_['message'][0] %></div>
                        </div>
                        <button type="submit" class="btn-submit" ng-click="submitPopupRegister()">Gửi</button>
                    </form>

                    <div class="col-lg-12" ng-if="sendPopupSuccess">
                        <div class="space10"></div>
                        <div class="send-success-message">
                            <i class="fa-solid fa-circle-check"></i>
                            <p>Chúc mừng bạn đã nhận một phiếu miễn phí</p>
                        </div>
                    </div>
                </div>
                <!-- Right: Image -->
                <div class="modal-image" >
                    <img src="{{ @$registerBlock->image->path ?? '' }}" alt="">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    @if (request()->routeIs('front.home-page'))
        <script>
            window.addEventListener('load', function() {
                document.getElementById('popupModal').classList.add('open');
            });
        </script>
    @endif

    <script>
        // Đóng modal khi click nút close hoặc ngoài modal-window
        document.getElementById('modalClose').addEventListener('click', function(){
            document.getElementById('popupModal').classList.remove('open');
        });
        document.getElementById('popupModal').addEventListener('click', function(e){
            if (e.target === this) {
                this.classList.remove('open');
            }
        });
    </script>

    <script>
        document.getElementById('modalClose').addEventListener('click', function() {
            document.getElementById('popupModal').classList.remove('open');
        });
    </script>
<script>
    function toEmbedUrl(watchUrl) {
        try {
            const url = new URL(watchUrl);
            let videoId = null;

            // trường hợp www.youtube.com/watch?v=...
            if ((url.hostname.endsWith('youtube.com') || url.hostname.endsWith('youtube-nocookie.com'))
                && url.pathname === '/watch') {
                videoId = url.searchParams.get('v');
            }
            // trường hợp youtu.be/ID
            else if (url.hostname === 'youtu.be') {
                videoId = url.pathname.slice(1);
            }

            if (videoId) {
                return `https://www.youtube.com/embed/${videoId}`;
            }
        } catch (e) {
            console.warn('Invalid URL:', watchUrl);
        }
        return null;
    }

    document.querySelectorAll('.team-video').forEach(iframe => {
        const embed = toEmbedUrl(iframe.dataset.watch);
        if (embed) iframe.src = embed;
    });
</script>

<script>
    app.controller('registerBlock', function ($rootScope, $scope, $sce, $interval, cartItemSync) {
        $scope.errors = [];
        $scope.errors_ = [];
        $scope.sendSuccess = false;
        $scope.sendPopupSuccess = false;
        $scope.submitRegister = function () {
            var url = "{{route('front.submitContact')}}";
            var data = jQuery('#form-register').serialize();
            $scope.loading = true;
            jQuery.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: data,
                success: function (response) {
                    if (response.success) {
                        // toastr.success(response.message);
                        jQuery('#form-register')[0].reset();
                        $scope.errors = [];
                        $scope.sendSuccess = true;
                        $scope.$apply();
                    } else {
                        $scope.errors = response.errors;
                        // toastr.warning(response.message);
                    }
                },
                error: function () {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.loading = false;
                    $scope.$apply();
                }
            });
        }

        $scope.submitPopupRegister = function () {
            var url = "{{route('front.submitContact')}}";
            var data = jQuery('#popup-register').serialize();
            $scope.loading = true;
            jQuery.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: data,
                success: function (response) {
                    if (response.success) {
                        jQuery('#popup-register')[0].reset();
                        $scope.errors_ = [];
                        $scope.sendPopupSuccess = true;
                        $scope.$apply();
                    } else {
                        $scope.errors_ = response.errors;
                        // toastr.warning(response.message);
                    }
                },
                error: function () {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.loading = false;
                    $scope.$apply();
                }
            });
        }

        $scope.item_qty = 1;

        $scope.addToCart = function (productId) {
            url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
            url = url.replace('productId', productId);

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
    })

</script>
@endpush
