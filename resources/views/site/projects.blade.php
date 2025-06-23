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
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                    <li><span>/</span></li>
                    <li>Dự án</li>
                </ul>
                <h2>Dự án tiêu biểu</h2>
            </div>
        </div>
    </section>

    <section class="projects-page">
        <div class="container">
            <style>
                /* 1) Biến container thành flex để các col cùng chiều cao */
                .project-list {
                    display: flex;
                    flex-wrap: wrap;
                    margin: -15px; /* bù padding cho col */
                }
                .project-list > .col-xl-4,
                .project-list > .col-lg-6,
                .project-list > .col-md-6 {
                    display: flex;
                    padding: 15px;
                    box-sizing: border-box;
                }

                /* 2) Card chính flex column, kéo dài hết chiều cao col */
                .project-three__single {
                    display: flex;
                    flex-direction: column;
                    flex: 1;
                }

                /* 3) Khung ảnh cố định tỉ lệ 4:3 */
                .project-three__img-box {
                    flex-shrink: 0;
                }
                .project-three__img {
                    position: relative;
                    width: 100%;
                    padding-top: 75%;    /* aspect-ratio 4:3 */
                    overflow: hidden;
                }

                /* 4) Ảnh phủ kín khung, crop đều */
                .project-three__img img {
                    position: absolute;
                    top: 0; left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* 5) Phần content nằm phía dưới ảnh */
                .project-three__content {
                    flex-shrink: 0;
                    padding: 15px 0;
                }

                /* 6) Căn tiêu đề cho cân đối */
                .project-three__title {
                    margin: 0;
                    font-size: 1.1rem;
                    text-align: center;
                }

            </style>
            <div class="row project-list">
                @foreach($projects as $project)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <!--Project Three Single-->
                        <div class="project-three__single">
                            <div class="project-three__img-box">
                                <div class="project-three__img">
                                    <img src="{{ @$project->image->path ?? '' }}" alt="">
                                    <div class="project-three__arrow">
                                        <a href="{{ route('front.getProjectDetail', $project->slug) }}"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                    <div class="project-three__content">
                                        <h3 class="project-three__title">
                                            <a href="{{ route('front.getProjectDetail', $project->slug) }}">{{ $project->name }}</a>
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
    <script>
    </script>
@endpush
