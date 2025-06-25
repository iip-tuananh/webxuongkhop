<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> {{ $config->web_title }} </title>

<!--=====FAB ICON=======-->
<link rel="shortcut icon" href="{{ $config->favicon->path ?? '' }}" type="image/x-icon">

<!--===== CSS LINK =======-->
<link rel="stylesheet" href="/site/css/plugins/bootstrap.min.css">
<link rel="stylesheet" href="/site/css/plugins/aos.css">
<link rel="stylesheet" href="/site/css/plugins/fontawesome.css">
<link rel="stylesheet" href="/site/css/plugins/magnific-popup.css">
<link rel="stylesheet" href="/site/css/plugins/owlcarousel.min.css">
<link rel="stylesheet" href="/site/css/plugins/sidebar.css">
<link rel="stylesheet" href="/site/css/plugins/slick-slider.css">
<link rel="stylesheet" href="/site/css/plugins/nice-select.css">
<link rel="stylesheet" href="/site/css/plugins/swiper-bundle.css">
<link rel="stylesheet" href="/site/css/main.css?v=1234">
<link rel="stylesheet" href="/site/css/callbutton.css?v=12">

<!--=====  JS SCRIPT LINK =======-->
<script src="/site/js/plugins/jquery-3-7-1.min.js"></script>

<style>
    .vl-hero-btn .btn-area1 ul li a {
        height: 40px;
        width: 40px;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        transition: all 0.4s;
        display: inline-block;
        background: #F5F2FF;
    }

     .vl-hero-btn .btn-area1 ul li {
        display: inline-block;
        margin: 0 10px 0 0;
    }

    .vl-hero-btn .btn-area1 ul li a:hover {
        background: var(--ztc-bg-bg-13);
        transition: all 0.4s;
    }

   .vl-hero-btn .btn-area1 ul li a:hover svg {
        filter: brightness(0) invert(1);
        transition: all 0.4s;
    }

    .cart-link {
        position: relative;
        display: inline-block;
    }

    .cart-badge {
        position: absolute;
        top: -6px;    /* kéo lên trên */
        right: -6px;  /* kéo qua bên phải */
        background: #e60023;
        color: #fff;
        font-size: 0.65rem;
        line-height: 1;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
</style>


<style>
    /* === Overlay & Modal base === */
    .modal-overlay {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.6);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }
    .modal-overlay.open {
        display: flex;
    }
    .modal-window {
        background: #fff;
        width: 800px;
        max-width: 95%;
        border-radius: 8px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    }

    .modal-window {
        position: relative;
        z-index: 1000;
    }

    /* nút đóng */
    .modal-close {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 32px;
        height: 32px;
        padding: 0;
        background: #fff;              /* nền trắng nổi lên */
        border: none;
        border-radius: 50%;            /* bo tròn thành vòng tròn */
        font-size: 1.2rem;
        line-height: 32px;             /* căn chữ × vào giữa */
        text-align: center;
        color: #333;                   /* màu chân thực */
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        cursor: pointer;
        z-index: 1001;                 /* cao hơn modal-content */
        transition: background .2s, color .2s;
    }
    .modal-close:hover {
        background: #f5f5f5;
        color: #000;
    }
    /* === Nội dung chia 2 cột === */
    .modal-content-1 {
        display: flex;
        align-items: stretch;    /* ép cả hai cột cao bằng nhau */
    }

    /* form bên trái */
    .modal-form {
        flex: 1;                 /* chiếm 50% */
        padding: 24px 32px;
        box-sizing: border-box;
    }
    .modal-form h2 {
        margin-top: 0;
        font-size: 1.6rem;
        color: #1c293f;
    }
    .modal-form .form-group {
        margin-bottom: 16px;
    }
    .modal-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
    }
    .modal-form input,
    .modal-form textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        box-sizing: border-box;
    }
    .modal-form textarea {
        resize: vertical;
    }
    .btn-submit {
        display: inline-block;
        background: #1c6dd0;
        color: #fff;
        padding: 10px 24px;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background .2s;
    }
    .btn-submit:hover {
        background: #155bb5;
    }

    /* khối ảnh bên phải */
    .modal-image {
        flex: 1;                 /* chiếm 50% */
        position: relative;
        overflow: hidden;
    }
    .modal-image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;       /* cover toàn khuôn hình */
    }

    /* Ví dụ bạn có thể thêm min-height nếu muốn */
    .modal-content-1 {
        min-height: 400px;       /* đảm bảo tối thiểu cao 400px */
    }

</style>

<style>
    /* === Mobile responsiveness === */
    @media (max-width: 768px) {
        /* Modal window co lại vừa màn hình, và có margin 16px  */
        .modal-window {
            width: 100%;
            max-width: 100%;
            margin: 0 16px;
            border-radius: 6px;
        }

        /* Stack form + image dọc thay vì ngang */
        .modal-content-1 {
            display: flex;
            flex-direction: column;
            min-height: auto; /* để ảnh tự cao theo tỉ lệ */
        }

        /* Giảm padding form */
        .modal-form {
            padding: 16px 16px;
        }
        .modal-form h2 {
            font-size: 1.4rem;
        }
        .modal-form .form-group {
            margin-bottom: 12px;
        }
        .btn-submit {
            width: 100%;
            padding: 10px;
        }

        /* Phần ảnh: bạn có 2 lựa chọn: */
        /* 1) Giữ lại ảnh với chiều cao cố định: */
        .modal-image {
            width: 100%;
            height: 200px;
            flex: none;
        }
        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* 2) Hoặc ẩn ảnh đi trên mobile, chỉ show form */
        .modal-image { display: none; }
    }

    /* Nếu bạn muốn hỗ trợ luôn các màn cực nhỏ (< 480px) */
    @media (max-width: 480px) {
        .modal-window { margin: 0 8px; }
        .modal-form { padding: 12px 12px; }
        .modal-form h2 { font-size: 1.2rem; }
    }

    .homepage4-body .header-sticky .header-top-area {
        visibility: hidden;
        opacity: 0;
        transition: all 0.4s;
        height: 0;
        position: absolute;
    }

    .homepage4-body .vl-transparent-header .header-top-area {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 16px;
        border-bottom: 1px solid #E6E6E7;
        visibility: visible;
        opacity: 1;
        transition: all 0.4s;
    }

    .homepage4-body .vl-transparent-header .header-top-area ul li {
        display: inline-block;
    }

    .homepage4-body .vl-transparent-header:not(.header-sticky) .header-top-area {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 16px;
        border-bottom: 1px solid #E6E6E7;
        visibility: visible;
        opacity: 1;
        transition: all 0.4s;
    }

    /* khi đã sticky => ẩn */
    .homepage4-body .vl-transparent-header.header-sticky .header-top-area {
        display: none;
    }


    .homepage4-body .vl-transparent-header .header-top-area .header-list ul li a {
        color: var(--ztc-text-text-14);
        font-family: var(--ztc-family-font1);
        font-size: var(--ztc-font-size-font-s18);
        font-style: normal;
        font-weight: var(--ztc-weight-medium);
        line-height: 18px;
        display: inline-block;
        transition: all 0.4s;
    }

    .homepage4-body .vl-transparent-header .header-top-area ul li a {
        color: var(--ztc-text-text-14);
        font-family: var(--ztc-family-font1);
        font-size: var(--ztc-font-size-font-s18);
        font-style: normal;
        font-weight: var(--ztc-weight-medium);
        line-height: 18px;
        display: inline-block;
        transition: all 0.4s;
    }

    @media (max-width: 767px) {
        .homepage4-body .header-top-area {
            display: none !important;
        }
    }

    @media (max-width: 768px) {
        .homepage4-body .vl-transparent-header .vl-logo img {
            width: auto;
            height: 80px;
        }

        .footer-register-form {
            margin-top: 20px;
        }


        /* Thu nhỏ khoảng cách khung */
        .play-btn {
            position: absolute; /* nếu bạn đang dùng absolute */
            bottom: 8px; /* lùi sát đáy hơn */
            right: 8px; /* lùi sát mép phải hơn */
        }

        /* Thu font và padding cho link */
        .play-btn a.popup-youtube {
            font-size: 14px !important; /* override style inline */
            padding: 4px 6px; /* co gọn padding */
            line-height: 1; /* cho khớp chiều cao */
        }

        /* Khoảng cách giữa icon và text */
        .play-btn a.popup-youtube span {
            margin-right: 4px;
        }

        /* Thu nhỏ icon play */
        .play-btn a.popup-youtube i.fa-play {
            font-size: 16px;
        }

        .others-section-area .video-play-area .play-btn a span {
            height: 50px;
            width: 50px;
            line-height: 50px;
        }

        .others-section-area .video-play-area .play-btn {
            bottom: 10px;
        }

    }




</style>
