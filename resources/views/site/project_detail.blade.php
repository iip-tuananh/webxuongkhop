@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
@endsection
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>
@section('css')

@endsection


@section('content')
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(/site/images/backgrounds/page-header-bg.jpg)">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                    <li><span>/</span></li>
                    <li>Chi tiết dự án</li>
                </ul>
                <h2>{{ $project->name }}</h2>
            </div>
        </div>
    </section>

    <section class="project-details">
        <div class="container">
            <style>
                /* 1. Ẩn icon mặc định và reset background */
                .swiper-button-prev,
                .swiper-button-next {
                    background-image: none;   /* tắt icon background mặc định */
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    backdrop-filter: blur(8px);
                    -webkit-backdrop-filter: blur(8px); /* cho Safari */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    color: #fff;
                    z-index: 10;
                    transition: background 0.2s, transform 0.2s;
                }

                /* 2. Vị trí 2 nút */
                .swiper-button-prev {
                    left: 10px;
                }
                .swiper-button-next {
                    right: 10px;
                }

                /* 3. Thêm icon mũi tên bằng pseudo-element */
                .swiper-button-prev::after,
                .swiper-button-next::after {
                    font-family: inherit;
                    font-size: 18px;
                    font-weight: bold;
                    line-height: 1;
                }
                .swiper-button-prev::after { content: '‹'; }  /* hoặc '\2039' */
                .swiper-button-next::after { content: '›'; }  /* hoặc '\203A' */

                /* 4. Hiệu ứng hover/focus */
                .swiper-button-prev:hover,
                .swiper-button-next:hover,
                .swiper-button-prev:focus,
                .swiper-button-next:focus {
                    background: rgba(255, 255, 255, 0.5);
                    transform: translateY(-50%) scale(1.1);
                }


                @media (max-width: 767px) {
                    /* cho cả container, wrapper và slide đều auto height */
                    .project-details__img.swiper,
                    .project-details__img .swiper-wrapper,
                    .project-details__img .swiper-slide {
                        height: auto !important;
                    }

                    /* ảnh full width, auto height */
                    .project-details__img .swiper-slide img {
                        display: block;
                        width: 100%;
                        height: auto;
                        object-fit: cover;
                    }
                }
            </style>
            <div class="project-details__img-box">
                <!-- Slider container -->
                <div class="swiper project-details__img">
                    <div class="swiper-wrapper">
                        @foreach($project->galleries as $gall)
                            <div class="swiper-slide">
                                <img src="{{ $gall->image->path ?? ''}}" alt="">
                            </div>
                        @endforeach

                    </div>
                    <!-- Nút điều hướng -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

                <div class="project-details__details-box" style="z-index: 999">
                    <ul class="list-unstyled project-details__details">
                        <li>
                            <div class="project-details__details-content">
                                <span class="project-details__details-title">Vị trí:</span>
                                <p class="project-details__details-name">{{ $project->location }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="project-details__details-content">
                                <span class="project-details__details-title">Dịch vụ:</span>
                                <p class="project-details__details-name">{{ $project->service }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="project-details__details-content">
                                <span class="project-details__details-title">Quy mô:</span>
                                <p class="project-details__details-name">{{ $project->area }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="project-details__details-content">
                                <span class="project-details__details-title">Ngày bàn giao:</span>
                                <p class="project-details__details-name">{{ $project->completion_time }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="project-details__room-wallpapers">
                {!! $project->content !!}
            </div>

        </div>
    </section>

    <section class="similar-project">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Các dự án khác</span>
                <h2 class="section-title__title">Dự án tiêu biểu</h2>
                <div class="section-title__line"></div>
            </div>
            <style>
                /* 1) Flex container để các col cùng chiều cao */
                .project-threes {
                    display: flex;
                    flex-wrap: wrap;
                    margin: -15px; /* bù cho padding */
                }
                .project-threes > .col-xl-4,
                .project-threes > .col-lg-4 {
                    display: flex;
                    padding: 15px;
                    box-sizing: border-box;
                }

                /* 2) Card chính flex column, giãn đều */
                .project-three__single {
                    display: flex;
                    flex-direction: column;
                    flex: 1;
                }

                /* 3) Khung ảnh tỉ lệ 4:3 */
                .project-three__img-box {
                    flex-shrink: 0;
                }
                .project-three__img {
                    position: relative;
                    width: 100%;
                    padding-top: 75%;    /* 3/4 = 75% */
                    overflow: hidden;
                }

                /* 4) Ảnh phủ kín khung */
                .project-three__img img {
                    position: absolute;
                    top: 0; left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* 5) Phần content bên dưới ảnh */
                .project-three__content {
                    flex-shrink: 0;
                    padding: 15px;
                }

                /* 6) Tiêu đề căn giữa và margin cố định */
                .project-three__title {
                    margin: 0;
                    font-size: 1.1rem;
                    text-align: center;
                }

            </style>
            <div class="row project-threes">

                @foreach($projects as $item)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <!--Project Three Single-->
                        <div class="project-three__single">
                            <div class="project-three__img-box">
                                <div class="project-three__img">
                                    <img src="{{ @$item->image->path ?? '' }}" alt="">
                                    <div class="project-three__arrow">
                                        <a href="{{ route('front.getProjectDetail', $item->slug) }}"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                    <div class="project-three__content">
                                        <h3 class="project-three__title"><a href="{{ route('front.getProjectDetail', $item->slug) }}"> {{ $item->name }}</a>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.project-details__img.swiper', {
                slidesPerView: 1,
                loop: true,
                autoHeight: true,       // <<< bật tính năng này
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: false,
                autoplay: { delay: 3000 },
            });
        });
    </script>
@endpush
