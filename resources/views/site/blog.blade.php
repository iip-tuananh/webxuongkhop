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
    <div class="inner-header-section-area" style="background-image: url(/site/img/all-images/bg/bg9.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-header">
                        <h1 class="text-anime-style-1">
                           {{ $title }}
                        </h1>
                        <a href="{{ route('front.home-page') }}" class="bradecrumb">Trang chủ
                            <i class="fa-solid fa-angle-right"></i>  {{ $title }}

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                <style>
                    /* 1. Đảm bảo các cột stretch đều nhau */
                    .row.align-items-stretch {
                        align-items: stretch;
                    }

                    /* 2. Card chính dùng flex-column và full height */
                    .vl-blog-1-item {
                        display: flex;
                        flex-direction: column;
                        height: 100%;
                        background: #fff;
                        border-radius: 0.5rem;
                        overflow: hidden;
                        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
                    }

                    /* 3. Thumbnail cố định chiều cao & cover */
                    .vl-blog-1-thumb {
                        flex-shrink: 0;
                        height: 200px;             /* fix cao 200px, bạn có thể tuỳ chỉnh */
                        overflow: hidden;
                    }
                    .vl-blog-1-thumb img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        display: block;
                    }

                    /* 4. Nội dung card linh hoạt chiếm phần còn lại */
                    .vl-blog-1-content {
                        flex: 1 1 auto;
                        display: flex;
                        flex-direction: column;
                        padding: 1rem;
                    }

                    /* 5. Title chỉ 2 dòng, nếu quá thì ... */
                    .vl-blog-1-title a {
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        line-height: 1.3;
                        margin-bottom: 0.75rem;
                    }

                    /* 6. Đẩy nút “Đọc thêm” xuống đáy */
                    .vl-blog-1-icon {
                        margin-top: auto;
                    }

                    /* 7. Khoảng cách giữa các card (nếu cần override Bootstrap) */
                    .row.g-4 {
                        row-gap: 1.5rem;
                        column-gap: 1.5rem;
                    }

                </style>
                <div class="col-lg-9">
                    <div class="vl-blog-4-area-inner">
                        <div class="container">
                            @if($posts->count())
                                <div class="row align-items-stretch">
                                    @foreach($posts as $post)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="vl-blog-1-item">
                                                <div class="vl-blog-1-thumb image-anime">
                                                    <img src="{{ @$post->image->path ?? '' }}" alt="">
                                                </div>
                                                <div class="vl-blog-1-content">
                                                    <h4 class="vl-blog-1-title">
                                                        <a href="{{ route('front.blogDetail', ['slug' => $post->slug]) }}">
                                                            {{ $post->name }}
                                                        </a>
                                                    </h4>

                                                    <div class="vl-blog-1-icon">
                                                        <a href="{{ route('front.blogDetail', ['slug' => $post->slug]) }}" class="learnmore">Đọc thêm
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99992 0.833496C4.04188 0.833496 0.833252 4.04212 0.833252 8.00016C0.833252 11.9582 4.04188 15.1668 7.99992 15.1668C11.958 15.1668 15.1666 11.9582 15.1666 8.00016C15.1666 4.04212 11.958 0.833496 7.99992 0.833496ZM7.33325 5.3335C7.06359 5.3335 6.82052 5.49592 6.71732 5.74504C6.61415 5.99416 6.67119 6.2809 6.86185 6.47157L7.72379 7.3335L5.52851 9.52876C5.26817 9.7891 5.26817 10.2112 5.52851 10.4716C5.78887 10.7319 6.21097 10.7319 6.47133 10.4716L8.66659 8.2763L9.52852 9.13823C9.71919 9.3289 10.0059 9.38596 10.2551 9.28276C10.5042 9.17956 10.6666 8.9365 10.6666 8.66683V6.00016C10.6666 5.63198 10.3681 5.3335 9.99992 5.3335H7.33325Z" fill="#02015A"/>
                                                            </svg></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="space30"></div>

                                            {{ $posts->links('site.pagination.paginate2') }}


                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="row">
                                    <p>Chưa có bài viết.</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space30"></div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
