@extends('layouts.main')

@section('css')

@endsection

@section('title')
Chỉnh sửa tiêu đề menu "{{ $titlePage }}"
@endsection

@section('page_title')
Chỉnh sửa tiêu đề menu "{{ $titlePage }}"
@endsection

@section('content')
<div ng-controller="Post" ng-cloak>
  @include('admin.title_pages.form')
</div>
@endsection
@section('script')
@include('admin.title_pages.TitlePage')
<script>
  app.controller('Post', function ($scope, $http, $timeout) {
    $scope.form = new TitlePage(@json($object), {scope: $scope});
    $scope.loading = {};

    $scope.submit = function() {
      $scope.loading.submit = true;
      let data = $scope.form.submit_data;
      $.ajax({
        type: 'POST',
        url: "/admin/title-pages/update",
        headers: {
          'X-CSRF-TOKEN': CSRF_TOKEN
        },
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            toastr.success(response.message);
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
    }
  });
</script>
@endsection
