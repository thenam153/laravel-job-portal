@extends('product.main')
@section('title')
Trang chủ
@endsection

@section('header')
@include('product.modules.header')
@endsection

@section('banner')
@include('product.modules.banner-category')
@endsection

@section('popular')
@include('product.modules.popular')
@endsection

@section('area')
@include('product.modules.category')
@endsection

@section('calltoaction')
@include('product.modules.calltoaction')
@endsection

@section('footer')
@include('product.modules.footer')
@endsection