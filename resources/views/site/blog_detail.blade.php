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
    <!--===== HERO AREA STARTS =======-->
    <div class="inner-header-section-area" style="background-image: url(/site/img/all-images/bg/bg9.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <img src="/site/img/elements/elements28.png" alt="" class="elements28">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-header">
                        <h1 class="text-anime-style-1">{{ $blog->name }}</h1>
                        <div class="space28"></div>
                        <a href="index.html" class="bradecrumb">Home <i class="fa-solid fa-angle-right"></i> Our Blog <i class="fa-solid fa-angle-right"></i> Blog Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->


    <!--===== BLOG AREA STARTS =======-->
    <div class="vl-blog-details-section sp8" style="padding: 50px 0 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="blog-auhtor-details-side">
                        <div class="category-list-area">
                            <h3>Danh mục</h3>
                            <div class="space10"></div>
                            <ul>
                                <li><a href="{{ route('front.home-page') }}">Trang chủ<span><i class="fa-solid fa-angle-right"></i></span></a></li>
                                <li><a href="{{ route('front.about_page') }}">Về chúng tôi <span><i class="fa-solid fa-angle-right"></i></span></a></li>
                                <li><a href="{{ route('front.products') }}">Sản phẩm<span><i class="fa-solid fa-angle-right"></i></span></a></li>
                                <li><a href="{{ route('front.blogs') }}">Tin tức<span><i class="fa-solid fa-angle-right"></i></span></a></li>
                                <li><a href="{{ route('front.hirings') }}">Tuyển dụng<span><i class="fa-solid fa-angle-right"></i></span></a></li>
                                <li><a href="{{ route('front.contact') }}">Liên hệ<span><i class="fa-solid fa-angle-right"></i></span></a></li>
                            </ul>
                        </div>

                        <div class="space30"></div>
                        <div class="recent-posts-area">
                            <h3>Tin mới nhất</h3>

                            @foreach($newPosts as $newPost)
                                <div class="recent-posts">
                                    <div class="img1">
                                        <img src="{{ @$newPost->image->path ?? '' }}" alt="" style="width: 120px; height: 120px">
                                    </div>
                                    <div class="content">
                                        <h4><a href="{{ route('front.blogDetail', ['slug' => $newPost->slug]) }}">{{ $newPost->name }}</a></h4>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="blog-others-sidebar padding-left">
                        <div class="img1">
                            <img src="{{ @$blog->image->path ?? '' }}" alt="">
                        </div>
                        <div class="space32"></div>
                        <ul class="list-author">
                            <li><a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                                        <path d="M5.5384 1C5.68692 1 5.82936 1.06637 5.93438 1.18452C6.0394 1.30267 6.0984 1.46291 6.0984 1.63V2.8081H12.112V1.6381C12.112 1.47101 12.171 1.31077 12.276 1.19262C12.381 1.07447 12.5235 1.0081 12.672 1.0081C12.8205 1.0081 12.963 1.07447 13.068 1.19262C13.173 1.31077 13.232 1.47101 13.232 1.6381V2.8081H15.4C15.8242 2.8081 16.2311 2.99762 16.5311 3.33499C16.8311 3.67236 16.9998 4.12997 17 4.6072V17.2009C16.9998 17.6781 16.8311 18.1357 16.5311 18.4731C16.2311 18.8105 15.8242 19 15.4 19H2.6C2.17579 19 1.76895 18.8105 1.46891 18.4731C1.16888 18.1357 1.00021 17.6781 1 17.2009V4.6072C1.00021 4.12997 1.16888 3.67236 1.46891 3.33499C1.76895 2.99762 2.17579 2.8081 2.6 2.8081H4.9784V1.6291C4.97861 1.46217 5.03771 1.30216 5.1427 1.1842C5.2477 1.06625 5.39002 1 5.5384 1ZM2.12 7.9678V17.2009C2.12 17.2718 2.13242 17.342 2.15654 17.4075C2.18066 17.4731 2.21602 17.5326 2.26059 17.5827C2.30516 17.6329 2.35808 17.6727 2.41631 17.6998C2.47455 17.7269 2.53697 17.7409 2.6 17.7409H15.4C15.463 17.7409 15.5255 17.7269 15.5837 17.6998C15.6419 17.6727 15.6948 17.6329 15.7394 17.5827C15.784 17.5326 15.8193 17.4731 15.8435 17.4075C15.8676 17.342 15.88 17.2718 15.88 17.2009V7.9804L2.12 7.9678ZM6.3336 14.1571V15.6565H5V14.1571H6.3336ZM9.6664 14.1571V15.6565H8.3336V14.1571H9.6664ZM13 14.1571V15.6565H11.6664V14.1571H13ZM6.3336 10.5778V12.0772H5V10.5778H6.3336ZM9.6664 10.5778V12.0772H8.3336V10.5778H9.6664ZM13 10.5778V12.0772H11.6664V10.5778H13ZM4.9784 4.0672H2.6C2.53697 4.0672 2.47455 4.08117 2.41631 4.1083C2.35808 4.13544 2.30516 4.17522 2.26059 4.22536C2.21602 4.27551 2.18066 4.33504 2.15654 4.40055C2.13242 4.46607 2.12 4.53629 2.12 4.6072V6.7087L15.88 6.7213V4.6072C15.88 4.53629 15.8676 4.46607 15.8435 4.40055C15.8193 4.33504 15.784 4.27551 15.7394 4.22536C15.6948 4.17522 15.6419 4.13544 15.5837 4.1083C15.5255 4.08117 15.463 4.0672 15.4 4.0672H13.232V4.9033C13.232 5.07039 13.173 5.23063 13.068 5.34878C12.963 5.46693 12.8205 5.5333 12.672 5.5333C12.5235 5.5333 12.381 5.46693 12.276 5.34878C12.171 5.23063 12.112 5.07039 12.112 4.9033V4.0672H6.0984V4.8952C6.0984 5.06229 6.0394 5.22253 5.93438 5.34068C5.82936 5.45883 5.68692 5.5252 5.5384 5.5252C5.38988 5.5252 5.24744 5.45883 5.14242 5.34068C5.0374 5.22253 4.9784 5.06229 4.9784 4.8952V4.0672Z" fill="#31353D"/>
                                    </svg> {{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }} <span> | </span></a>
                            </li>
                            <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M4.16406 17.5C4.16406 14.2783 6.77574 11.6667 9.9974 11.6667C13.2191 11.6667 15.8307 14.2783 15.8307 17.5M13.3307 5.83333C13.3307 7.67428 11.8383 9.16667 9.9974 9.16667C8.15645 9.16667 6.66406 7.67428 6.66406 5.83333C6.66406 3.99238 8.15645 2.5 9.9974 2.5C11.8383 2.5 13.3307 3.99238 13.3307 5.83333Z" stroke="#31353D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg> {{ $blog->user_create->name }} <span> | </span></a></li>
                        </ul>
                        <div class="space24"></div>
                        <h2>
                           {{ $blog->name }}
                        </h2>
                        <div class="space18"></div>
                        <div>
                            {!! $blog->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== BLOG AREA ENDS =======-->


    <div class="vl-blog-4-area sp1">

    </div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
