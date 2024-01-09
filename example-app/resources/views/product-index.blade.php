@extends('products.layouts.app')

@section('title', 'Product List')

@section('header')
    @parent
    &gt; <a href="{{ route('products.index') }}">Product</a>
@endsection

@section('header1')
    <p style="float: right; margin:0;" class="btn bg-success"><a href="{{ route('products.create') }}">Add product</a><br></p>
@endsection

@section('content')
    {{-- <h1>Danh sach sản phẩm</h1> --}}
    {{-- <a href="{{ route('products.create') }}">Thêm</a><br> --}}



    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Products</h3>
            <div class="card-tools">

            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        {{-- <th>Sales</th>
              <th>More</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lst as $p)
                        <tr>
                            <td>
                                <img src="{{ $p->image }}" style="width:100px; max-height:50px; object-fit:contain;" alt="hinh">
                                {{ $p->name }}
                            </td>
                            <td>{{ $p->price }}</td>

                            <td>
                                <a href="{{ route('products.show', ['product' => $p]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
