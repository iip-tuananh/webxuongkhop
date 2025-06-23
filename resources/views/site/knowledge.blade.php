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
    <style>
        /* Tạo gutter ngang nếu cần */
        .gutter-x-30 {
            margin-left: -15px;
            margin-right: -15px;
        }
        .gutter-x-30 > .col-sm-12,
        .gutter-x-30 > .col-md-6 {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Đảm bảo card đều cao */
        .blog-card-two.h-100 {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Căn ảnh full-width, giữ tỉ lệ */
        .blog-card-two__image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        /* Khoảng cách nội dung */
        .blog-card-two__content {
            padding: 16px;
        }

        /* Link “xem thêm” luôn ở đáy */
        .blog-card-two__link {
            align-self: flex-end;
            margin-top: 12px;
        }

        .blog-card-two__image {
            height: 180px;        /* hoặc chỉnh cao bạn muốn */
            overflow: hidden;
            border-radius: 8px;   /* bo nhẹ góc nếu cần */
        }

        .blog-card-two__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;    /* cover & crop trung tâm */
        }

        .blog-card-two__title {
            /* đặt line-height = 1.3em, 2 dòng → height = 2.6em */
            line-height: 1.3em;
            height: 2.6em;
            overflow: hidden;
        }

        /* hoặc dùng line-clamp để linh động hơn */
        .blog-card-two__title a {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2; /* 2 dòng */
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Kiến thức</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>

                @if(@$category)
                    @if(@$category->parent)
                        <li><span>{{ @$category->parent->name ?? '' }}</span></li>
                    @endif
                    <li><span>{{ $category->name }}</span></li>
                @else
                    <li><span>Kiến thức</span></li>
                @endif
            </ul>
        </div>
    </section>

    <section class="blog-one blog-one--page">
        <div class="container">
            <div class="row gutter-y-60">
                @php
                    use Carbon\Carbon;
                    Carbon::setLocale('vi');
                    $days = [
                        Carbon::SUNDAY    => 'Chủ nhật',
                        Carbon::MONDAY    => 'Thứ 2',
                        Carbon::TUESDAY   => 'Thứ 3',
                        Carbon::WEDNESDAY => 'Thứ 4',
                        Carbon::THURSDAY  => 'Thứ 5',
                        Carbon::FRIDAY    => 'Thứ 6',
                        Carbon::SATURDAY  => 'Thứ 7',
                    ];

                @endphp
                <div class="col-lg-8">
                    <div class="row gutter-y-30 gutter-x-30">
                        @foreach($posts as $blog)
                            @php
                                $d = $blog->created_at;
                            @endphp

                            <div class="col-sm-12 col-md-6">
                                <div class="blog-card-two wow fadeInUp h-100" data-wow-duration='1500ms' data-wow-delay='100ms'>
                                    <a href="{{ route('front.getKnowledgeDetail', $blog->slug) }}" class="blog-card-two__image">
                                        <img src="{{ @$blog->image->path ?? '' }}" alt="{{ $blog->name }}">
                                        <p class="blog-card-two__date">
                                            {{ $d->format('d') }} {{ $days[$d->dayOfWeek] }}, {{ $d->format('Y') }}
                                        </p>
                                    </a>
                                    <div class="blog-card-two__content d-flex flex-column">
                                        <ul class="list-unstyled blog-card-two__meta mb-2">
                                            <li>
                                                <a href="{{ route('front.getKnowledgeDetail', $blog->slug) }}">
                                                    <i class="fas fa-user-circle"></i> by {{ $blog->user_create->name }}
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-card-two__title mb-2 flex-grow-0">
                                            <a href="{{ route('front.getKnowledgeDetail', $blog->slug) }}"   title="{{ $blog->name }}">{{ $blog->name }}</a>
                                        </h3>
                                        <p class="blog-card-two__text flex-grow-1">
                                            {{ Str::limit(strip_tags($blog->intro), 120, '...') }}

                                        </p>
                                        <a href="{{ route('front.getKnowledgeDetail', $blog->slug) }}" class="blog-card-two__link mt-auto">
                                            <i class="icon-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 mt-4">
                            {{ $posts->links('site.pagination.paginate2') }}
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="sidebar">
                        <aside class="widget-area">

                            <div class="sidebar__single wow fadeInUp" data-wow-delay='300ms'>
                                <h4 class="sidebar__title">Bài viết mới</h4>
                                <ul class="sidebar__posts list-unstyled">
                                    @foreach($otherBlog as $b)
                                            <?php
                                            $d = $b->created_at;
                                            ?>
                                        <li class="sidebar__posts__item">
                                            <div class="sidebar__posts__image">
                                                <img src="{{ @$b->image->path ?? '' }}" alt="firdip">
                                            </div>
                                            <div class="sidebar__posts__content">
                                                <p class="sidebar__posts__meta"><a href="{{ route('front.getKnowledgeDetail', $b->slug) }}"   title="{{ $blog->name }}"><i class="icon-clock"></i>{{ $d->format('d') }} {{ $days[$d->dayOfWeek] }}, {{ $d->format('Y') }}</a></p>
                                                <h4 class="sidebar__posts__title"><a href="{{ route('front.getKnowledgeDetail', $b->slug) }}">{{ $b->name }}</a></h4>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="sidebar__single wow fadeInUp" data-wow-delay='300ms'>
                                <h4 class="sidebar__title">Danh mục</h4>
                                <ul class="sidebar__categories list-unstyled">
                                    @foreach($allCate as $cate)
                                        <li class="sidebar__categories__item"><a href="{{ route('front.knowledge', $cate->slug) }}"> <i class="icon-arrow-left"></i>{{ $cate->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>


                        </aside>
                    </div>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-one blog-one-page -->

@endsection

@push('scripts')
    <script>
    </script>
@endpush
