@extends('layouts.main')

@section('css')

@endsection

@section('title')
Chỉnh sửa quy trình điều trị
@endsection

@section('page_title')
Chỉnh sửa quy trình điều trị
@endsection

@section('content')
<div ng-controller="TreatmentSteps" ng-cloak>
  @include('admin.treatment_steps.form')
</div>
@endsection
@section('script')
@include('admin.treatment_steps.TreatmentStep')
<script>
    app.controller('TreatmentSteps', function ($scope, $http) {
        $scope.form = new TreatmentStep(@json($object), {scope: $scope});
        $scope.loading = {};

        $scope.submit = function() {
            $scope.loading.submit = true;
            let data = $scope.form.submit_data;
            $.ajax({
                type: 'POST',
                url: "/admin/treatment-steps/" + "{{ $object->id }}" + "/update",
                headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    window.location.href = "{{ route('treatmentSteps.index') }}";
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
