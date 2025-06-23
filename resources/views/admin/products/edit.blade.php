@extends('layouts.main')

@section('css')

@endsection

@section('title')
    Chỉnh sửa sản phẩm
@endsection

@section('page_title')
    Chỉnh sửa sản phẩm
@endsection

@section('content')
    <div ng-controller="EditProduct" ng-cloak>
        @include('admin.products.form')
    </div>
@endsection

@section('script')
    @include('admin.products.Product')

    <script>
        app.controller('EditProduct', function ($scope, $http) {
            $scope.arrayInclude = arrayInclude;

            $scope.form = new Product(@json($object), {scope: $scope});

            $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;

                $.ajax({
                    type: 'POST',
                    url: "/admin/products/" + "{{ $object->id }}" + "/update",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('Product.index') }}";
                        } else {
                            toastr.warning(response.message);
                            $scope.errors = response.errors;
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });
            }

            @include('admin.products.formJs');

        });
    </script>
@endsection
