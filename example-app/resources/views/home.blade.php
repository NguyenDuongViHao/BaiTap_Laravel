@extends('products.layouts.app')

@section('title', 'Home')

@section('header')
    @parent
@endsection

@section('content')
    <a href="{{ route('products.index') }}">Danh sach san pham</a>
@endsection
