<div class="vl-footer4-section-area" style="background-image: url(/site/img/all-images/bg/bg4.png); background-position: center; background-repeat: no-repeat; background-size: cover;" ng-controller="footerBlock">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-description-area">
                    <img src="{{ @$config->image->path ?? '' }}" alt="">
                    <div class="space24"></div>
                    <p>{{ $config->web_title }}</p>
                </div>
            </div>


            <div class="col-lg col-md-6 d-none d-md-block">
                <div class="space30 d-md-none d-block"></div>
                <div class="footer-widget-area foot-padding1" style="padding-left: 30px">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><a href="{{ route('front.about_page') }}">Về chúng tôi</a></li>
                        <li><a href="{{ route('front.products') }}">Sản phẩm</a></li>
                        <li><a href="{{ route('front.blogs') }}">Tin tức</a></li>
                        <li><a href="{{ route('front.hirings') }}">Tuyển dụng</a></li>
                        <li><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg col-md-6">
                <div class="space30 d-lg-none d-block"></div>
                <div class="footer-widget-area">
                    <h3>Liên hệ</h3>
                    <ul>
                        <li><a href="tel:{{ $config->hotline }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M14.05 6C15.0268 6.19057 15.9244 6.66826 16.6281 7.37194C17.3318 8.07561 17.8095 8.97326 18 9.95M14.05 2C16.0793 2.22544 17.9716 3.13417 19.4163 4.57701C20.8609 6.01984 21.7721 7.91101 22 9.94M18.5 21C9.93959 21 3 14.0604 3 5.5C3 5.11378 3.01413 4.73086 3.04189 4.35173C3.07375 3.91662 3.08968 3.69907 3.2037 3.50103C3.29814 3.33701 3.4655 3.18146 3.63598 3.09925C3.84181 3 4.08188 3 4.56201 3H7.37932C7.78308 3 7.98496 3 8.15802 3.06645C8.31089 3.12515 8.44701 3.22049 8.55442 3.3441C8.67601 3.48403 8.745 3.67376 8.88299 4.05321L10.0491 7.26005C10.2096 7.70153 10.2899 7.92227 10.2763 8.1317C10.2643 8.31637 10.2012 8.49408 10.0942 8.64506C9.97286 8.81628 9.77145 8.93713 9.36863 9.17882L8 10C9.2019 12.6489 11.3501 14.7999 14 16L14.8212 14.6314C15.0629 14.2285 15.1837 14.0271 15.3549 13.9058C15.5059 13.7988 15.6836 13.7357 15.8683 13.7237C16.0777 13.7101 16.2985 13.7904 16.74 13.9509L19.9468 15.117C20.3262 15.255 20.516 15.324 20.6559 15.4456C20.7795 15.553 20.8749 15.6891 20.9335 15.842C21 16.015 21 16.2169 21 16.6207V19.438C21 19.9181 21 20.1582 20.9007 20.364C20.8185 20.5345 20.663 20.7019 20.499 20.7963C20.3009 20.9103 20.0834 20.9262 19.6483 20.9581C19.2691 20.9859 18.8862 21 18.5 21Z" stroke="#31353D" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg> {{ $config->hotline }}</a></li>
                        <li>
                            <a href="#"  class="d-flex align-items-center">
                                 <span class="icon-wrapper me-2">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#31353D" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#31353D" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                 </span>

                                <span class="text">{{ $config->address_company }}</span>

                            </a>
                        </li>
                        <li><a href="mailto:medicaxhospital@com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 18L9 12M20 18L15 12M3 8L10.225 12.8166C10.8665 13.2443 11.1872 13.4582 11.5339 13.5412C11.8403 13.6147 12.1597 13.6147 12.4661 13.5412C12.8128 13.4582 13.1335 13.2443 13.775 12.8166L21 8M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z" stroke="#31353D" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg> {{ $config->email }}</a></li>
                    </ul>
                    <div class="space20"></div>
                    <ul class="social-links">
                        <li><a href="{{ $config->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="{{ $config->facebook }}"><i class="fa-brands fa-youtube"></i></a></li>

                    </ul>
                </div>
            </div>

            <style>
                .footer-consult-form {
                    max-width: 320px;
                    margin: 0 auto;
                    padding: 16px;
                    border: 2px solid #0b3065cf;
                    border-radius: 8px;
                    background: #fff;
                    box-sizing: border-box;
                }
                .footer-consult-form .title {
                    font-size: 18px;
                    font-weight: 700;
                    color: #0b3065cf;
                    text-transform: uppercase;
                    text-align: center;
                    margin-bottom: 8px;
                }
                .footer-consult-form .subtitle {
                    font-size: 13px;
                    color: #333;
                    text-align: center;
                    margin-bottom: 16px;
                    line-height: 1.4;
                }
                .footer-consult-form .form-group {
                    margin-bottom: 12px;
                }
                .footer-consult-form input,
                .footer-consult-form textarea {
                    width: 100%;
                    padding: 8px 10px;
                    font-size: 14px;
                    border: 1px solid #0b3065cf;
                    border-radius: 4px;
                    box-sizing: border-box;
                }
                .footer-consult-form textarea {
                    resize: vertical;
                    min-height: 80px;
                }
                .footer-consult-form button {
                    width: 100%;
                    padding: 10px 0;
                    font-size: 15px;
                    font-weight: 600;
                    color: #fff;
                    background: #0b3065cf;
                    border: none;
                    border-radius: 20px;
                    cursor: pointer;
                    transition: background .2s;
                }
                .footer-consult-form button:hover {
                    background: #0b3065cf;
                }

                /* responsive cực nhỏ */
                @media (max-width: 360px) {
                    .footer-consult-form {
                        padding: 12px;
                    }
                    .footer-consult-form .title {
                        font-size: 16px;
                    }
                    .footer-consult-form .subtitle {
                        font-size: 12px;
                    }
                    .footer-consult-form input,
                    .footer-consult-form textarea {
                        font-size: 13px;
                    }
                    .footer-consult-form button {
                        font-size: 14px;
                        padding: 8px 0;
                    }
                }
            </style>

            <style>
                /* ==== Mobile: tối ưu form tư vấn ==== */
                @media (max-width: 768px) {
                    .footer-consult-form {
                        /* cho form chiếm hết chiều ngang của cột */
                        width: 100%;
                        max-width: 100%;
                        margin: 0 auto;
                        padding: 12px 16px;
                        border-radius: 6px;
                    }

                    .footer-consult-form .title {
                        font-size: 16px;
                        line-height: 1.2;
                    }
                    .footer-consult-form .subtitle {
                        font-size: 12px;
                        margin-bottom: 12px;
                    }

                    .footer-consult-form .form-group {
                        margin-bottom: 10px;
                    }
                    .footer-consult-form input,
                    .footer-consult-form textarea {
                        font-size: 14px;
                        padding: 8px;
                    }
                    .footer-consult-form textarea {
                        min-height: 70px;
                    }

                    .footer-consult-form button {
                        font-size: 14px;
                        padding: 10px 0;
                        border-radius: 16px;
                    }
                }

                /* Cho màn rất nhỏ nữa */
                @media (max-width: 360px) {
                    .footer-consult-form {
                        padding: 8px 12px;
                        border-width: 1px;
                    }
                    .footer-consult-form .title {
                        font-size: 14px;
                    }
                    .footer-consult-form .subtitle {
                        font-size: 11px;
                    }
                    .footer-consult-form input,
                    .footer-consult-form textarea {
                        padding: 6px;
                        font-size: 13px;
                    }
                    .footer-consult-form button {
                        font-size: 13px;
                        padding: 8px 0;
                    }
                }

            </style>

            <div class="col-lg col-md-6 footer-register-form">
                <div class="footer-consult-form">
                    <div class="title">Đăng ký nhận tư vấn</div>
                    <div class="subtitle">
                        Vui lòng để lại thông tin và nhu cầu của Quý khách để được nhận tư vấn
                    </div>
                    <form id="footerConsultForm">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Họ và tên (*)" >
                            <div class="invalid-feedback d-block" ng-if="errorsR['name']"><% errorsR['name'][0] %></div>

                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Số điện thoại (*)" >
                            <div class="invalid-feedback d-block" ng-if="errorsR['phone']"><% errorsR['phone'][0] %></div>

                        </div>
                        <div class="form-group">
                            <input type="text" name="address" placeholder="Địa chỉ (*)">
                            <div class="invalid-feedback d-block" ng-if="errorsR['address']"><% errorsR['address'][0] %></div>

                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Lời nhắn"></textarea>
                            <div class="invalid-feedback d-block" ng-if="errorsR['message']"><% errorsR['message'][0] %></div>

                        </div>
                        <button type="button" ng-click="submitFooterRegister()">Đăng ký ngay</button>
                        <div class="col-lg-12" ng-if="sendFooterSuccess">
                            <div class="space10"></div>
                            <div class="send-success-message">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>Chúc mừng bạn đã nhận một phiếu miễn phí</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="space100"></div>
        <div class="col-lg-12">
            <div class="copyright-area">
                <a href="#">© Bản quyền thuộc về Công Ty Mỹ Phẩm Lê Vân. All Right Reserved</a>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        app.controller('footerBlock', function ($rootScope, $scope, $sce, $interval) {
            $scope.submitFooterRegister = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#footerConsultForm').serialize();
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
                            jQuery('#footerConsultForm')[0].reset();
                            $scope.errorsR = [];
                            $scope.sendFooterSuccess = true;
                            $scope.$apply();
                        } else {
                            $scope.errorsR = response.errors;
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
        });
    </script>

@endpush
