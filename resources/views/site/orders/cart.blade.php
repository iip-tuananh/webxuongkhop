@extends('site.layouts.master')
@section('title')
    Giỏ hàng
@endsection

@section('css')
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f5f5f5; }
        .cart-container {
            margin: 2rem auto;
            background: #fff;
            border-radius: 6px;
            overflow: hidden;
            border: 1px solid #ccc;
        }
        /* Header */
        .cart-header, .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }
        .cart-header {
            background: #fafafa;
            font-weight: bold;
        }
        .col {
            padding: 1rem;
        }
        .col.product     { flex: 2; }
        .col.price,
        .col.qty,
        .col.subtotal   { flex: 1; text-align: center; }
        /* Product info */
        .item-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .item-info img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 1px solid #eee;
            border-radius: 4px;
        }
        .item-info .name {
            font-size: 1rem;
            line-height: 1.3;
        }
        .item-info .remove {
            display: block;
            margin-top: .25rem;
            color: #e60023;
            font-size: .85rem;
            text-decoration: none;
        }
        /* Giá */
        .col.price .old-price {
            text-decoration: line-through;
            color: #999;
            display: block;
            font-size: .9rem;
        }
        .col.price .new-price {
            color: #e60023;
            font-weight: bold;
            font-size: 1.1rem;
        }
        /* Quantity */
        .qty-selector {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow: hidden;
        }
        .qty-selector button {
            background: #fff;
            border: none;
            padding: .25rem .5rem;
            cursor: pointer;
            font-size: 1rem;
        }
        .qty-selector input {
            width: 50px;
            text-align: center;
            border: none;
            font-size: 1rem;
            outline: none;
        }
        /* Thành tiền */
        .col.subtotal .subtotal {
            font-weight: bold;
            color: #333;
        }
        /* Summary & Checkout */
        .cart-summary {
            padding: 1rem;
            text-align: right;
        }
        .cart-summary .total-label {
            font-size: 1.1rem;
            margin-right: 1rem;
        }
        .cart-summary .cart-total {
            font-size: 1.3rem;
            font-weight: bold;
            color: #e60023;
        }
        .checkout-btn {
            display: inline-block;
            margin-top: 1rem;
            background: #243c99;
            color: #fff;
            padding: .75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }
        .checkout-btn:hover {
            background: #1e337d;
        }

        /* Responsive (mobile) */
        @media (max-width: 768px) {
            .cart-header { display: none; }
            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }
            .col { width: 100%; padding: .75rem 1rem; }
            .col.price, .col.qty, .col.subtotal {
                text-align: left;
            }
            .col.price::before { content: "Đơn giá: "; font-weight: bold; }
            .col.qty::before   { content: "Số lượng: "; font-weight: bold; }
            .col.subtotal::before { content: "Thành tiền: "; font-weight: bold; }
        }

        .loading-spin {
            display: none;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }



    </style>
@endsection

@section('content')
    <div class="vl-blog-details-section sp8" style="padding: 200px 0 0 0" ng-controller="Cart">
        <div class="container">
            <nav aria-label="breadcrumb" class="mt-4 mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('front.home-page') }}">Trang chủ</a>

                        <i class="fa-solid fa-angle-right"></i>   Giỏ hàng
                    </li>

                </ol>
            </nav>

            <div class="cart-container"  ng-if="countItem">
                <!-- header -->
                <div class="cart-header">
                    <div class="col product">Thông tin sản phẩm</div>
                    <div class="col price">Đơn giá</div>
                    <div class="col qty">Số lượng</div>
                    <div class="col subtotal">Thành tiền</div>
                </div>

                <!-- example item 1 -->
                <div class="cart-item"  ng-repeat="item in items">
                    <div class="col product">
                        <div class="item-info">
                            <img src="<% item.attributes.image %>" alt="">
                            <div>
                                <div class="name"><% item.name %></div>
                                <a href="#" class="remove" ng-click="removeItem(item.id)">Xóa</a>
                            </div>
                        </div>
                    </div>
                    <div class="col price">
                        <span class="old-price" ng-if="item.attributes.base_price > 0"><% item.attributes.base_price | number %>₫</span>
                        <span class="new-price unit-price"><% item.price | number %>₫</span>
                    </div>
                    <div class="col qty">
                        <div class="qty-selector">
                            <button class="qty-btn minus" ng-click="decrementQuantity(item); changeQty(item.quantity, item.id)">−</button>
                            <input type="number" class="qty-input" value="<%item.quantity%>" min="1" ng-model="item.quantity" ng-change="changeQty(item.quantity, item.id)">
                            <button class="qty-btn plus" ng-click="incrementQuantity(item); changeQty(item.quantity, item.id)">+</button>
                        </div>
                    </div>
                    <div class="col subtotal">
                        <span class="subtotal"><% (item.price * item.quantity) | number %>₫</span>
                    </div>
                </div>

                <!-- thêm các item khác tương tự... -->

                <!-- summary -->
                <div class="cart-summary">
                    <span class="total-label">Tổng tiền:</span>
                    <span class="cart-total"><% total | number%>₫</span><br>
                    <a href="{{ route('cart.checkout') }}"> <button class="checkout-btn">Thanh toán</button> </a>
                </div>
            </div>

            <div class="large-12 col" ng-if="!countItem">
                <div class="col-inner">
                    <div class="woocommerce"><div class="text-center pt pb">
                            <div class="woocommerce-notices-wrapper"></div><p class="cart-empty woocommerce-info">Chưa có sản phẩm nào trong giỏ hàng.</p>		<p class="return-to-shop">
                                <a class="button primary wc-backward" href="{{route('front.home-page')}}">
                                    Quay trở lại cửa hàng			</a>
                            </p>
                        </div></div>


                </div>
            </div>

            <div class="overlay" id="overlay">
                <div class="loading-spin large centered"></div>
            </div>
        </div>



    </div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.cart-item').forEach(item => {
        item.addEventListener('click', e => {
            if (e.target.classList.contains('qty-btn')) {
                const input = item.querySelector('.qty-input');
                console.log( input.value)
                let val = parseInt(input.value,10) || 1;
                if (e.target.classList.contains('minus')) val = Math.max(1, val - 1);
                else val++;
                input.value = val;
                // updateCart();
            }
        });
        // khi gõ số trực tiếp
        item.querySelector('.qty-input').addEventListener('change', e => {
            if (e.target.value < 1) e.target.value = 1;
            // updateCart();
        });
    });
</script>

<script>
    app.controller('Cart', function ($rootScope, $scope, $interval, cartItemSync) {
        $scope.items = @json($cartCollection);
        $scope.total = "{{$total_price}}";
        $scope.checkCart = true;

        $scope.countItem = Object.keys($scope.items).length;

        jQuery(document).ready(function () {
            if ($scope.total == 0) {
                $scope.checkCart = false;
                $scope.$applyAsync();
            }
        })

        $scope.changeQty = function (qty, product_id) {
            updateCart(qty, product_id)
        }

        $scope.incrementQuantity = function (product) {
            product.quantity = Math.min(product.quantity + 1, 9999);
        };

        $scope.decrementQuantity = function (product) {
            product.quantity = Math.max(product.quantity - 1, 0);
        };

        function updateCart(qty, product_id) {
            jQuery.ajax({
                type: 'POST',
                url: "{{route('cart.update.item')}}",
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: {
                    product_id: product_id,
                    qty: qty
                },
                beforeSend: function() {
                    jQuery('.loading-spin').show();
                    showOverlay();
                },
                success: function (response) {
                    if (response.success) {
                        $scope.items = response.items;
                        $scope.total = response.total;

                        $interval.cancel($rootScope.promise);

                        $rootScope.promise = $interval(function(){
                            cartItemSync.items = response.items;
                            cartItemSync.total = response.total;
                            cartItemSync.count = response.count;
                        }, 1000);

                        $scope.$applyAsync();
                    }
                },
                error: function (e) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    jQuery('.loading-spin').hide();
                    hideOverlay();
                    $scope.$applyAsync();
                }
            });
        }

        $scope.removeItem = function (product_id) {
            jQuery.ajax({
                type: 'GET',
                url: "{{route('cart.remove.item')}}",
                data: {
                    product_id: product_id
                },
                success: function (response) {
                    if (response.success) {
                        $scope.items = response.items;
                        $scope.total = response.total;
                        if ($scope.total == 0) {
                            $scope.checkCart = false;
                        }

                        $interval.cancel($rootScope.promise);

                        $rootScope.promise = $interval(function(){
                            cartItemSync.items = response.items;
                            cartItemSync.total = response.total;
                            cartItemSync.count = response.count;
                        }, 1000);

                        $scope.countItem = Object.keys($scope.items).length;

                        $scope.$applyAsync();
                    }
                },
                error: function (e) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.$applyAsync();
                }
            });
        }

        function showOverlay() {
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'flex';
        }

        function hideOverlay() {
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'none';
        }

    })

</script>
@endpush
