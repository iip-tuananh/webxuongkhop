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
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(/site/images/backgrounds/page-header-bg.jpg)">
        </div>
        <div class="container">
            <div class="page-header__inner">
                @if($category)

                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><span>/</span></li>
                        <li>{{ $categoryParent->name }}</li>
                        <li><span>/</span></li>
                        <li>{{ $category->name }}</li>
                    </ul>
                    <h2>{{ $category->name }}</h2>

                @else
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><span>/</span></li>
                        <li>{{ $categoryParent->name }}</li>
                    </ul>
                    <h2>{{ $categoryParent->name }}</h2>
                @endif

            </div>
        </div>
    </section>

    <section class="blog-sibebar">
        <div class="container">
            <style>
                /* 1) Đặt hàng services-list thành flex container */
                .services-list {
                    display: flex;
                    flex-wrap: wrap;
                    margin: -15px;  /* bù padding cho từng item */
                }

                /* 2) Mỗi cột flex để đồng đều chiều cao */
                .services-list > .col-md-6 {
                    display: flex;
                    padding: 15px;  /* khoảng giữa các item */
                }

                /* 3) Card chính kéo cao đều nhau */
                .blog-one__single {
                    display: flex;
                    flex-direction: column;
                    flex: 1;
                    background: #fff;
                    border: 1px solid #eee;
                    border-radius: 6px;
                    overflow: hidden;
                }

                /* 4) Khung ảnh 16:9 */
                .blog-one__img {
                    position: relative;
                    width: 100%;
                    padding-top: 56.25%;  /* 9/16 */
                    overflow: hidden;
                }
                .blog-one__img img {
                    position: absolute;
                    top: 0; left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* 5) Nội dung flex column để đẩy tiêu đề và meta lên trên, text bung hết phần còn lại */
                .blog-one__content {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    padding: 11px;
                }

                /* 6) Ngày & meta cố định vị trí */
                .blog-one__date,
                .blog-one__meta {
                    flex-shrink: 0;
                    margin-bottom: 10px;
                }

                /* 7) Tiêu đề (description) clamp 3 dòng với dấu “…” */
                .blog-one__title {
                    margin: 0 0 15px;
                    font-size: 1.0rem;
                    line-height: 1.4em;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 3;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

            </style>
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-sideabr__left">
                        <div class="row services-list">
                            @foreach($services as $service)
                                <div class="col-md-6 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                    <!--Blog One Start-->
                                    <div class="blog-one__single">
                                        <div class="blog-one__img">
                                            <img src="{{ $service->image->path ?? '' }}" alt="">
                                            <a href="{{ route('front.getServiceDetail', $service->slug) }}">
                                                <span class="blog-one__plus"></span>
                                            </a>
                                        </div>
                                        <div class="blog-one__content">
                                            <div class="blog-one__date">
                                                <p>{{ \Illuminate\Support\Carbon::parse($service->created_at)->format('d/m/Y') }}</p>
                                            </div>
                                            <ul class="list-unstyled blog-one__meta">
                                                <li><a href="#"><i class="far fa-user-circle"></i> by
                                                        {{ $service->user_create->name ?? '' }} </a>
                                                </li>

                                            </ul>
                                            <h3 class="blog-one__title">
                                                <a href="{{ route('front.getServiceDetail', $service->slug) }}" title=" {{ $service->name }}">
                                                    {{ $service->name }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Danh mục</h3>
                            <ul class="sidebar__category-list list-unstyled">
                            @foreach($allCategoryServices as $allCate)
                                    <li><a href="{{ route('front.services', ['parentSlug' => $allCate->slug]) }}">{{ $allCate->name }} <span class="fa fa-angle-right"></span></a></li>
                            @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
    <script>
    </script>
@endpush
