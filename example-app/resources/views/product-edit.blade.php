@extends('products.layouts.app')

@section('title', 'Edit product')

@section('header')
    @parent
    &gt; <a href="{{ route('products.index') }}">Product</a>
    &gt; Edit product
@endsection

@section('header1')
    <p style="float: right; margin:0;" class="btn bg-success"><a href="{{ route('products.show', ['product' => $p]) }}">Previous</a><br></p>
@endsection


@section('content')
    <div class="contentEdit">
        <form action="{{ route('products.update', ['product' => $p]) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <h1 style="margin: 2rem; background: rgb(150, 208, 247); border-radius: 10px; text-align: center;" >Edit product</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                <input  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{old('name', $p->name)}}">
                @if ($errors->has('name')) {{$errors->first('name')}}<br>@endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input  class="form-control" id="exampleInputPassword1" name="price" value="{{old('price', $p->price)}}">
                @if ($errors->has('price')) {{$errors->first('price')}}<br>@endif
            </div>

            <div class="mb-3">
                <label for="">Product type: </label>
                <select name="category">
                    <option value="">--Chọn lại--</option>
                    @foreach ($lst as $cat)
                        <option value="{{ $cat->id }}" @if ($cat->id==old('category', $p->category_id)) selected @endif>{{ $cat->name }}</option>
                    @endforeach
                </select><br>
                @if ($errors->has('category')) {{$errors->first('category')}}<br>@endif
            </div>

            <div class="mb-3">
                <label for="exampleInputDes1" class="form-label">Description</label>
                <textarea class="form-control" name="desc">{{old('desc', $p->desc)}}</textarea>

                @if ($errors->has('desc')) {{$errors->first('desc')}}<br>@endif
            </div>

            <div class="mb-3">
                <label for="">Image :  </label>
                <img src="{{ $p->image }}" style="with:100px; max-height:50px; object-fit:contain;"><br>

                <input type="file" name="image" accept="image/*">
                @if ($errors->has('image'))
                    {{ $errors->first('image') }}<br>
                @endif
            </div>

            <button type="submit" class="w-100 btn btn-lg btn-primary">Edit</button>


        </form>
    </div>
@endsection


 {{-- @csrf
            @method('PUT')
            <label for="">Tên sản phẩm</label><input name="name" value="{{ old('name', $p->name) }}"><br>
            @if ($errors->has('name'))
                {{ $errors->first('name') }}<br>
            @endif
            <label for="">Giá: </label> <input name="price" value="{{ old('price', $p->price) }}"><br>
            @if ($errors->has('price'))
                {{ $errors->first('price') }}<br>
            @endif

            <label for="">Loại sản phẩm: </label>
            <select name="category">
                <option value="">--Chọn lại--</option>
                @foreach ($lst as $cat)
                    <option value="{{ $cat->id }}" @if ($cat->id == old('category', $p->category_id)) selected @endif>{{ $cat->name }}
                    </option>
                @endforeach
            </select><br>
            @if ($errors->has('category'))
                {{ $errors->first('category') }}<br>
            @endif

            <label for="">Mô tả: </label>
            <textarea name="desc">{{ old('desc', $p->desc) }}</textarea><br>
            @if ($errors->has('desc'))
                {{ $errors->first('desc') }}<br>
            @endif

            <label for="">Hình: </label>
            <img src="{{ $p->image }}" style="with:100px; max-height:50px; object-fit:contain;"><br>

            <input type="file" name="image" accept="image/*">
            @if ($errors->has('image'))
                {{ $errors->first('image') }}<br>
            @endif

            <input type="submit"> --}}
