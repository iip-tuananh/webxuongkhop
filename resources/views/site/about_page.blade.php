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
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Về chúng tôi</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li><span>{{ $post->name }}</span></li>
            </ul>
        </div>
    </section>

    <section class="project-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="project-details__inner">
                        <h4 class="project-details__inner__title">{{ $post->name }}</h4>
                        <p class="project-details__inner__text">{{ $post->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="project-details__thumb">
                        <img src="{{@$post->image->path ?? ''}}" alt="firdip image">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="project-details__left">
                        {!! $post->body !!}
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
