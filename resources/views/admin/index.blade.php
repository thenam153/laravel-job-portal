@extends('admin.main')

@section('title')
Trang chủ
@endsection

@section('content')
@include('admin/modules/index')
@endsection

@section('title_content')
Thống kế
@endsection


@section('script')



<script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="assets/js/lib/chart-js/chartjs-init.js"></script>

@endsection