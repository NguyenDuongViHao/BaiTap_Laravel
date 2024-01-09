@extends('products.layouts.app')

@section('title', 'Product Details')

@section('header')
    @parent
    &gt; <a href="{{ route('products.index') }}">Product</a>
    &gt; {{ $p->name }}
@endsection

@section('header1')
    <p style="float: right; margin:0;" class="btn bg-success"><a href="{{ route('products.index') }}">Previous</a><br></p>
@endsection


@section('content')
    {{-- <h1>{{ $p->name }}</h1>

    <a href="{{ route('products.edit', ['product' => $p]) }}">Sửa</a><br>

    <form action="{{ route('products.destroy', ['product' => $p]) }}" method="post"
        onsubmit="return confirm('Bạn có chắc muốn xoá SV này?');">
        @csrf
        @method('DELETE')
        <input type="submit" value="xóa">
    </form>
    <br>
    <img src="{{ $p->image }}" style="with:100px; max-height:50px; object-fit:contain;">
    <p>Loại: {{ $p->category->name }}</p>
    <p>Giá: {{ $p->price }}</p>
    <div>
        <h3>Mô tả</h3>
        {{ $p->desc }}
    </div>
    <br> --}}


<div class="contentShow">
    <div class="card border-0 ">
           <div>
                <h1>{{ $p->name }}</h1>
                <img src="{{ $p->image }}" >
           </div>
            <div class="card-body">
                <p class="card-text">Product type: {{ $p->category->name }}</p>
                <p class="card-text">Price: {{ $p->price }}</p>
                <p class="card-text">Description:  {{ $p->desc }}</p>


                <div>
                    <a href="{{ route('products.edit', ['product' => $p]) }} " class="btn bg-secondary w-50">Sửa</a>

                    <form action="{{ route('products.destroy', ['product' => $p]) }}" method="post"
                        onsubmit="return confirm('Bạn có chắc muốn xoá SV này?');">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn bg-danger w-50" value="xóa">
                    </form>
                </div>

            </div>


    </div>
</div>
@endsection
