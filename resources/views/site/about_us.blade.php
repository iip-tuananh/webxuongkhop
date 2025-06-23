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
                            Về chúng tôi
                        </h1>
                        <a href="{{ route('front.home-page') }}" class="bradecrumb">Home <i class="fa-solid fa-angle-right"></i>Về chúng tôi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-inner-section-area sp1" style="padding: 50px 0 100px;">
        <div class="container">
            <div class="row align-items-center">
                {!! $config->web_des !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    </script>

    <script>
        $(function(){
            var $carousel = $('.testimonial-one__carousel');

            function equalizeHeights() {
                var maxH = 0;
                // reset
                $carousel.find('.testimonial-one__single').css('height','auto');
                // tính max
                $carousel.find('.testimonial-one__single').each(function(){
                    maxH = Math.max( maxH, $(this).outerHeight() );
                });
                // gán cho tất cả
                $carousel.find('.testimonial-one__single').css('height', maxH + 'px');
            }

            // Khi Owl khởi tạo xong hoặc refresh (thêm/resize)
            $carousel.on('initialized.owl.carousel refreshed.owl.carousel', function(){
                equalizeHeights();
            });

            // Force refresh 1 lần để khơi event trên (nếu bạn chỉ dùng data-owl-options)
            $carousel.trigger('refresh.owl.carousel');

            // Re-equalize mỗi khi window resize
            $(window).on('resize', equalizeHeights);
        });
    </script>




@endpush
