@extends('product.main')
@section('title')
Trang chủ
@endsection

@section('header')
@include('product.modules.header')
@endsection

@section('banner')
@include('product.modules.banner-postproject')
@endsection

@section('area')
@include('product.modules.content-post')
@endsection

@section('calltoaction')
@include('product.modules.calltoaction')
@endsection

@section('footer')
@include('product.modules.footer')
@endsection