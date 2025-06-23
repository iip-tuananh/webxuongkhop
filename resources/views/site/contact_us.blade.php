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
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }


</style>

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
@endsection

@section('content')
    <div class="inner-header-section-area" style="background-image: url(/site/img/all-images/bg/bg9.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-header">
                        <h1 class="text-anime-style-1">
                            Liên hệ
                        </h1>
                        <div class="space28"></div>
                        <a href="index.html" class="bradecrumb">Trang chủ <i class="fa-solid fa-angle-right"></i>Liên hệ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-inner-section-area sp2" ng-controller="contactPage">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="heading4 text-center space-margin60">
                        <div class="space24"></div>
                        <h2 class="vl-section-title text-anime-style-3">{{ $config->web_title }}</h2>
                    </div>
                </div>
            </div>
            <style>
                /* Container card flex */
                .single-box {
                    display: flex;
                    align-items: flex-start;   /* icon ở trên cùng cạnh text */
                }

                /* Khung icon cố định */
                .single-box .icons {
                    width: 30px;
                    height: 30px;
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-single-boxarea2">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-box">
                                    <div class="icons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                            <path d="M16.305 29.3327C23.6688 29.3327 29.6383 23.3631 29.6383 15.9993C29.6383 8.63555 23.6688 2.66602 16.305 2.66602C8.94122 2.66602 2.97168 8.63555 2.97168 15.9993C2.97168 23.3631 8.94122 29.3327 16.305 29.3327Z" stroke="#1C293F" stroke-width="2.5"></path>
                                            <path d="M16.9351 9.15785C16.9351 8.51839 16.4167 8 15.7772 8C15.1378 8 14.6194 8.51839 14.6194 9.15785H16.9351ZM18.9116 18.3738C18.4594 17.9217 17.7264 17.9217 17.2743 18.3738C16.8221 18.826 16.8221 19.559 17.2743 20.0112L18.9116 18.3738ZM19.59 22.3269C20.0421 22.7791 20.7751 22.7791 21.2273 22.3269C21.6795 21.8747 21.6795 21.1417 21.2273 20.6895L19.59 22.3269ZM14.6194 9.15785V14.5611H16.9351V9.15785H14.6194ZM17.2743 20.0112L19.59 22.3269L21.2273 20.6895L18.9116 18.3738L17.2743 20.0112ZM16.9351 16.8768C16.9351 17.5163 16.4167 18.0347 15.7772 18.0347V20.3504C17.6956 20.3504 19.2508 18.7951 19.2508 16.8768H16.9351ZM15.7772 18.0347C15.1378 18.0347 14.6194 17.5163 14.6194 16.8768H12.3037C12.3037 18.7951 13.8589 20.3504 15.7772 20.3504V18.0347ZM14.6194 16.8768C14.6194 16.2374 15.1378 15.719 15.7772 15.719V13.4033C13.8589 13.4033 12.3037 14.9585 12.3037 16.8768H14.6194ZM15.7772 15.719C16.4167 15.719 16.9351 16.2374 16.9351 16.8768H19.2508C19.2508 14.9585 17.6956 13.4033 15.7772 13.4033V15.719Z" fill="#1C293F"></path>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <h4>Giờ làm việc</h4>
                                        <a href="#">{{ $config->work_hours }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="single-box">
                                    <div class="icons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                            <path d="M16.3031 28C20.9697 23.2 25.6364 18.9019 25.6364 13.6C25.6364 8.29807 21.4577 4 16.3031 4C11.1484 4 6.96973 8.29807 6.96973 13.6C6.96973 18.9019 11.6364 23.2 16.3031 28Z" stroke="#1C293F" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M16.3037 17.332C18.5129 17.332 20.3037 15.5412 20.3037 13.332C20.3037 11.1229 18.5129 9.33203 16.3037 9.33203C14.0945 9.33203 12.3037 11.1229 12.3037 13.332C12.3037 15.5412 14.0945 17.332 16.3037 17.332Z" stroke="#1C293F" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <h4>Địa chỉ</h4>
                                        <a href="#">{{ $config->address_company }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="single-box">
                                    <div class="icons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.87 19.87 0 0 1 12 18.09 19.5 19.5 0 0 1 6 12a19.87 19.87 0 0 1-3.07-8.63A2 2 0 0 1 4.08 2h3a2 2 0 0 1 2 1.72 12.05 12.05 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.05 12.05 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="#1C293F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.5 2.5c1.5 1.5 2.25 3.25 2.25 5" stroke="#1C293F" stroke-width="2" stroke-linecap="round"/>
                                            <path d="M19.5 1.5c2 2 3 4.5 3 7" stroke="#1C293F" stroke-width="2" stroke-linecap="round"/>
                                        </svg>

                                    </div>
                                    <div class="text">
                                        <h4>Hotline</h4>
                                        <a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space60"></div>

                <div class="col-lg-6">
                    <div class="images image-anime reveal" style="opacity: 1; visibility: inherit; translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                        {!! $config->location !!}
                    </div>
                </div>
                <div class="col-lg-6 aos-init" data-aos="zoom-in-up" data-aos-duration="1000">
                    <div class="contact-boxarea">
                        <h4>Liên hệ với chúng tôi</h4>
                        <div class="space20"></div>
                        <p>Với đội ngũ tư vấn viên chất lượng. Hãy để lại mọi thắc mắc của bạn
                            <br class="d-lg-block d-none"> Chúng tôi sẽ sớm liên hệ lại với bạn </p>
                        <div class="space6"></div>
                        <div class="row">
                            <form id="contactForm">
                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <input type="text" placeholder="Họ tên*" name="name">
                                        <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <input type="text" placeholder="Số điện thoại*" name="phone">
                                        <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <input type="text" placeholder="Địa chỉ*" name="address">
                                        <div class="invalid-feedback d-block" ng-if="errors['address']"><% errors['address'][0] %></div>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <textarea placeholder="Lời nhắn*" name="message"></textarea>
                                        <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="space10"></div>
                                    <div class="input-area">
                                        <button type="submit" ng-click="submitForm()" class="vl-btn4">Gửi thông tin<span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11 0.25C5.06294 0.25 0.25 5.06294 0.25 11C0.25 16.9371 5.06294 21.75 11 21.75C16.9371 21.75 21.75 16.9371 21.75 11C21.75 5.06294 16.9371 0.25 11 0.25ZM10 7C9.5955 7 9.2309 7.24364 9.0761 7.61732C8.92134 7.99099 9.0069 8.42111 9.2929 8.70711L10.5858 10L7.29289 13.2929C6.90237 13.6834 6.90237 14.3166 7.29289 14.7071C7.68342 15.0976 8.31658 15.0976 8.70711 14.7071L12 11.4142L13.2929 12.7071C13.5789 12.9931 14.009 13.0787 14.3827 12.9239C14.7564 12.7691 15 12.4045 15 12V8C15 7.44772 14.5523 7 14 7H10Z" fill="white"></path>
                    </svg></span></button>
                                    </div>
                                    <div class="col-lg-12" ng-if="sendSuccess">
                                        <div class="space10"></div>
                                        <div class="send-success-message">
                                            <i class="fa-solid fa-circle-check"></i>
                                            <p>Cảm ơn bạn đã để lại lời nhắn. Tin nhắn đã được gửi</p>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        app.controller('contactPage', function ($rootScope, $scope, $sce, $interval) {
            $scope.errors = [];
            $scope.sendSuccess = false;
            $scope.submitForm = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#contactForm').serialize();
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
                            jQuery('#contactForm')[0].reset();
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
        })

    </script>
@endpush
