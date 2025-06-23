@extends('layouts.main')

@section('css')
@endsection

@section('page_title')
Quản lý đánh giá sản phẩm {{ @$product->name ?? '' }}
@endsection

@section('title')
Quản lý đánh giá sản phẩm {{ @$product->name ?? '' }}
@endsection

@section('buttons')
    <a href="javascript:void(0)" class="btn btn-outline-success" data-toggle="modal" data-target="#create-review" class="btn btn-info" ng-click="errors = null"><i class="fa fa-plus"></i> Thêm mới</a>
@endsection
@section('content')
<div ng-cloak>
    <div class="row" ng-controller="Reviews">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-list">
                    </table>
                </div>
            </div>
        </div>

    </div>
    @include('admin.rates.edit')
    @include('admin.rates.create')

</div>
@endsection

@section('script')
@include('admin.rates.Rate')
<script>
    const params = new URLSearchParams(window.location.search);
    const productId = params.get('product-id');

    let datatable = new DATATABLE('table-list', {
		ajax: {
			url: '/admin/rates/searchData',
			data: function (d, context) {
				DATATABLE.mergeSearch(d, context);
                d.product_id = productId;
            }
		},
		columns: [
			{data: 'DT_RowIndex', orderable: false, title: "STT", className: "text-center"},
            {data: 'product_id', title: 'Sản phẩm'},
            {data: 'user_name', title: 'Khách hàng'},
            {data: 'title', title: 'Tiêu đề'},
            {data: 'rating', title: 'Đánh giá'},
            {
                data: 'status',
                title: "Trạng thái",
                render: function (data) {
                    return getStatus(data, @json(\App\Model\Admin\Rate::STATUSES));
                },
                className: "text-center"
            },
            {data: 'created_at', title: 'Ngày tạo'},
            {data: 'approve_date', title: 'Ngày duyệt'},
            {data: 'approve_id', title: 'Người duyệt'},
			{data: 'action', orderable: false, title: "Hành động"}
		],
		search_columns: [
			{data: 'user_name', search_type: "text", placeholder: "Khách hàng"},
            {
                data: 'status', search_type: "select", placeholder: "Trạng thái",
                column_data: @json(\App\Model\Admin\Rate::STATUSES)
            }
		],
	}).datatable;

    createReviewCallback = (response) => {
        datatable.ajax.reload();
    }

    app.controller('Reviews', function ($rootScope, $scope, $http) {
        $scope.loading = {};
        $scope.form = {}

        $('#table-list').on('click', '.edit', function () {
            $scope.data = datatable.row($(this).parents('tr')).data();
            $.ajax({
                type: 'GET',
                url: "/admin/rates/" + $scope.data.id + "/getDataForEdit",
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: $scope.data.id,

                success: function(response) {
                if (response.success) {
                    $scope.booking = response.data;
                    $rootScope.$emit("editReview", $scope.booking);
                } else {
                    toastr.warning(response.message);
                    $scope.errors = response.errors;
                }
                },
                error: function(e) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function() {
                    $scope.loading.submit = false;
                    $scope.$applyAsync();
                }
            });
            $scope.errors = null;
            $scope.$apply();
            $('#edit-review').modal('show');
        });
    })

    $(document).on('click', '.export-button', function(event) {
        event.preventDefault();
        let data = {};
        mergeSearch(data, datatable.context[0]);
        window.location.href = $(this).data('href') + "?" + $.param(data);
    })
</script>
@include('partial.confirm')
@endsection
