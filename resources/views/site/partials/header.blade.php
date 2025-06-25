<header class="homepage4-body" ng-controller="headerPartial">
    <div id="vl-header-sticky" class="vl-header-area vl-transparent-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-top-area">
                        <div class="header-list">
                            <ul>
                                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <g clip-path="url(#clip0_5594_78877)">
                                                <path d="M7.5013 16.668H5.0013C4.11725 16.668 3.2694 16.3168 2.64428 15.6917C2.01916 15.0665 1.66797 14.2187 1.66797 13.3346V5.83464C1.66797 4.95058 2.01916 4.10273 2.64428 3.47761C3.2694 2.85249 4.11725 2.5013 5.0013 2.5013H14.168C15.052 2.5013 15.8999 2.85249 16.525 3.47761C17.1501 4.10273 17.5013 4.95058 17.5013 5.83464V8.33464M6.66797 1.66797V3.33464M12.5013 1.66797V3.33464M1.66797 6.66797H17.5013M15.418 13.0371L14.168 14.2871" stroke="#1C293F" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M14.1667 18.3333C16.4679 18.3333 18.3333 16.4679 18.3333 14.1667C18.3333 11.8655 16.4679 10 14.1667 10C11.8655 10 10 11.8655 10 14.1667C10 16.4679 11.8655 18.3333 14.1667 18.3333Z" stroke="#1C293F" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_5594_78877">
                                                    <rect width="20" height="20" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>&nbsp; {{ $config->work_hours }}</a></li>
                            </ul>
                        </div>
                        <ul>
                            <li><a href="mailto:{{ $config->email }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M2.92857 15.0714L7.57143 9.5M17.7857 15.0714L13.1429 9.5M2 5.78571L8.70893 10.2583C9.30461 10.6554 9.6024 10.854 9.92434 10.9311C10.2089 10.9994 10.5054 10.9994 10.7899 10.9311C11.1119 10.854 11.4097 10.6554 12.0054 10.2583L18.7143 5.78571M4.97143 16H15.7429C16.7829 16 17.303 16 17.7003 15.7976C18.0497 15.6196 18.3338 15.3354 18.5119 14.986C18.7143 14.5888 18.7143 14.0687 18.7143 13.0286V5.97143C18.7143 4.93134 18.7143 4.41128 18.5119 4.01402C18.3338 3.66457 18.0497 3.38046 17.7003 3.20252C17.303 3 16.7829 3 15.7429 3H4.97143C3.93134 3 3.41128 3 3.01402 3.20252C2.66457 3.38046 2.38046 3.66457 2.20252 4.01402C2 4.41128 2 4.93133 2 5.97143V13.0286C2 14.0687 2 14.5888 2.20252 14.986C2.38046 15.3354 2.66457 15.6196 3.01402 15.7976C3.41128 16 3.93133 16 4.97143 16Z" stroke="#1C293F" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg> {{ $config->email }}</a> <span> | </span></li>
                            <li><a href="tel:{{ $config->hotline }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10.8763 5.83333C11.6903 5.99214 12.4383 6.39022 13.0247 6.97662C13.6111 7.56301 14.0092 8.31105 14.168 9.125M10.8763 2.5C12.5674 2.68787 14.1443 3.44514 15.3482 4.64751C16.5521 5.84987 17.3114 7.42584 17.5013 9.11667M14.5846 18.3333C7.45096 18.3333 1.66797 12.5503 1.66797 5.41667C1.66797 5.09482 1.67974 4.77572 1.70288 4.45977C1.72943 4.09718 1.7427 3.91589 1.83772 3.75086C1.91642 3.61417 2.05589 3.48455 2.19795 3.41604C2.36948 3.33333 2.56954 3.33333 2.96964 3.33333H5.3174C5.65387 3.33333 5.8221 3.33333 5.96632 3.38871C6.09371 3.43763 6.20714 3.51708 6.29665 3.62008C6.39798 3.73669 6.45547 3.8948 6.57046 4.21101L7.54222 6.88337C7.67597 7.25127 7.74289 7.43522 7.73155 7.60975C7.72155 7.76364 7.66897 7.91173 7.5798 8.03755C7.47869 8.18023 7.31084 8.28094 6.97516 8.48235L5.83464 9.16667C6.83622 11.3741 8.62638 13.1666 10.8346 14.1667L11.519 13.0262C11.7204 12.6904 11.8211 12.5226 11.9637 12.4215C12.0896 12.3323 12.2376 12.2797 12.3916 12.2697C12.5661 12.2584 12.7501 12.3253 13.118 12.4591L15.7903 13.4308C16.1065 13.5458 16.2646 13.6033 16.3812 13.7047C16.4842 13.7942 16.5637 13.9076 16.6126 14.035C16.668 14.1792 16.668 14.3474 16.668 14.6839V17.0317C16.668 17.4317 16.668 17.6318 16.5852 17.8033C16.5167 17.9454 16.3871 18.0849 16.2505 18.1636C16.0854 18.2586 15.9041 18.2718 15.5416 18.2984C15.2256 18.3216 14.9065 18.3333 14.5846 18.3333Z" stroke="#1C293F" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>&nbsp;{{ $config->hotline }}</a></li>
                        </ul>
                    </div>
                </div>
{{--                <div class="space16 d-lg-block d-none"></div>--}}
            </div>

            <div class="row align-items-center row-bg1">
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="vl-logo">
                        <a href="{{ route('front.home-page') }}"><img src="{{ @$config->image->path ?? '' }}" alt=""></a>
                    </div>
                </div>



                <div class="col-lg-7 d-none d-lg-block">
                    <div class="vl-main-menu text-center">
                        <nav class="vl-mobile-menu-active">
                            <ul>
                                <li>
                                    <a href="{{ route('front.home-page') }}">Trang chủ <span class="arrow-size"></span></a>
                                </li>

                                <li>
                                    <a href="{{ route('front.about_page') }}">Về chúng tôi<span class="arrow-size"></span></a>
                                </li>

                                <li>
                                    <a href="{{ route('front.products') }}">Sản phẩm<span class="arrow-size"></span></a>
                                </li>

                                <li>
                                    <a href="{{ route('front.blogs') }}">Tin tức<span class="arrow-size"></span></a>
                                </li>

                                <li>
                                    <a href="{{ route('front.contact') }}">Liên hệ<span class="arrow-size"></span></a>
                                </li>

                                <li>
                                    <a href="{{ route('front.hirings') }}">Tuyển dụng<span class="arrow-size"></span></a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-6 d-flex justify-content-end align-items-center">
                    <div class="vl-hero-btn">
                        <div class="btn-area1">
                            <ul>
                                <li> </li>
                                <li>
                                    <a href="{{ route('cart.index') }}" class="cart-link">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="17" viewBox="0 0 14 17" fill="none">
                                            <path d="M3.11719 6V4.5C3.11719 2.42893 4.79612 0.75 6.8672 0.75C8.93825 0.75 10.6172 2.42893 10.6172 4.5V6H12.8672C13.2814 6 13.6172 6.33579 13.6172 6.75V15.75C13.6172 16.1642 13.2814 16.5 12.8672 16.5H0.867187C0.452977 16.5 0.117188 16.1642 0.117188 15.75V6.75C0.117188 6.33579 0.452977 6 0.867187 6H3.11719ZM3.11719 7.5H1.61719V15H12.1172V7.5H10.6172V9.00003H9.1172V7.5H4.61719V9.00003H3.11719V7.5ZM4.61719 6H9.1172V4.5C9.1172 3.25736 8.1098 2.25 6.8672 2.25C5.62453 2.25 4.61719 3.25736 4.61719 4.5V6Z" fill="#06030E"></path>
                                        </svg>

                                        <span class="cart-badge"><% cart.count %></span>
                                    </a>
                                </li>

                                <li class="header__search">
                                    <a href="#" class="search-icon header__search header-search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                            <path d="M14.3865 12.4626L17.5986 15.6746L16.5379 16.7353L13.3259 13.5233C12.171 14.4473 10.7063 15 9.11328 15C5.38728 15 2.36328 11.976 2.36328 8.25C2.36328 4.524 5.38728 1.5 9.11328 1.5C12.8393 1.5 15.8633 4.524 15.8633 8.25C15.8633 9.843 15.3105 11.3077 14.3865 12.4626ZM12.8818 11.9061C13.7989 10.9609 14.3633 9.6717 14.3633 8.25C14.3633 5.34938 12.0139 3 9.11328 3C6.21266 3 3.86328 5.34938 3.86328 8.25C3.86328 11.1506 6.21266 13.5 9.11328 13.5C10.535 13.5 11.8242 12.9356 12.7694 12.0185L12.8818 11.9061Z" fill="#06030E"></path>
                                        </svg></a>
                                </li>

                            </ul>

                        </div>
                    </div>
                    <div class="vl-header-action-item d-block d-lg-none ms-3">
                        <button type="button" class="vl-offcanvas-toggle">
                            <i class="fa-solid fa-bars-staggered"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="header-search-form-wrapper">
        <div class="tx-search-close tx-close"><i class="fa-solid fa-xmark"></i></div>
        <div class="header-search-container">
            <form role="search" class="search-form">
                <input type="search"  ng-model="keyword" class="search-field" placeholder="Tìm kiếm sản phẩm …" value="" name="s">
                <button type="button" ng-click="search()" class="search-submit"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                        <path d="M14.3865 12.4626L17.5986 15.6746L16.5379 16.7353L13.3259 13.5233C12.171 14.4473 10.7063 15 9.11328 15C5.38728 15 2.36328 11.976 2.36328 8.25C2.36328 4.524 5.38728 1.5 9.11328 1.5C12.8393 1.5 15.8633 4.524 15.8633 8.25C15.8633 9.843 15.3105 11.3077 14.3865 12.4626ZM12.8818 11.9061C13.7989 10.9609 14.3633 9.6717 14.3633 8.25C14.3633 5.34938 12.0139 3 9.11328 3C6.21266 3 3.86328 5.34938 3.86328 8.25C3.86328 11.1506 6.21266 13.5 9.11328 13.5C10.535 13.5 11.8242 12.9356 12.7694 12.0185L12.8818 11.9061Z" fill="#06030E"/>
                    </svg></button>
            </form>
        </div>
    </div>
</header>


