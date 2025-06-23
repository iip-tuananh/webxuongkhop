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
                    <li>{{ $service->name }}</li>
                </ul>
                <h2>{{ $service->name }}</h2>
            </div>
        </div>
    </section>


    <section class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="service-details__left">
                        <div class="service-details__category">
                            <ul class="service-details__category-list list-unstyled">
                                @foreach($allServices as $item)
                                    <li class="{{ url()->current() == route('front.getServiceDetail', $item->slug) ? 'active' : '' }}">
                                        <a href="{{route('front.getServiceDetail', $item->slug)}}">{{ $item->name }}<span class="fa fa-angle-right"></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="service-details__right">
                        <div class="service-details__img">
                            <img src="{{ @$service->image->path ?? '' }}" alt="">
                            <div class="service-details__icon">
                                <span class="icon-wallpaper-4"></span>
                            </div>
                        </div>

                        <div class="service-details__content">
                            {!! $service->content !!}
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
