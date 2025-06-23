@extends('layouts.main')

@section('css')
@endsection

@section('title')
Quản lý quy trình điều trị
@endsection

@section('page_title')
Quản lý quy trình điều trị
@endsection

@section('content')
<div ng-cloak>
	<div class="row" ng-controller="TreatmentSteps">
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
</div>
    <style>
        .btn-step {
            background: linear-gradient(135deg, #28a745, #4ba604);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 4px 12px;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            transition: transform 0.1s, box-shadow 0.1s;
            cursor: pointer;
        }
        .btn-step:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
        }
    </style>
@endsection
@section('script')
<script>
    let columns = [
        {data: 'DT_RowIndex', orderable: false, title: "STT"},
        {
            data: 'image', title: "Hình ảnh", orderable: false, className: "text-center",
        },
        {data: 'title',title: 'Tiêu đề'},
        {
            data: 'step',
            title: 'Thứ tự',
            className: 'text-center',
            render: function(data, type, row, meta) {
                return `<button class="btn-step">${data}</button>`;
            }
        },
        {data: 'created_by',title: 'Người tạo'},
        {data: 'updated_by',title: 'Người cập nhật'},
        {data: 'updated_at',title: 'Ngày cập nhật'},
        {data: 'action', orderable: false, title: "Hành động"}
    ];

    let datatable = new DATATABLE('table-list', {
        ajax: {
            url: '{{route('treatmentSteps.searchData')}}',
            data: function (d, context) {
                DATATABLE.mergeSearch(d, context);
            }
        },
        columns: columns,
        search_columns: [
            {data: 'title', search_type: "text", placeholder: "Tiêu đề"},
        ],
        search_by_time: false,
        @if(Auth::user()->type == App\Model\Common\User::SUPER_ADMIN || Auth::user()->type == App\Model\Common\User::QUAN_TRI_VIEN)
        create_link: "{{ route('treatmentSteps.create') }}"
        @endif
    }).datatable;

    app.controller('Services', function ($scope, $rootScope, $http) {

    })
</script>
@include('partial.confirm')
@endsection
