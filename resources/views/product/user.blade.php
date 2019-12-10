@extends('product.main')
@section('title')
Thông tin người dùng
@endsection

@section('header')
@include('product.modules.header')
@endsection

@section('banner')
@include('product.modules.user-banner')
@endsection

@section('area')
@include('product.modules.user')
@endsection

@section('calltoaction')
@include('product.modules.calltoaction')
@endsection

@section('footer')
@include('product.modules.footer')
@endsection