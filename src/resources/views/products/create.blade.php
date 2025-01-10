@extends('layouts.app')

@section('title', '商品登録')

@section('content')
    <h1>商品登録</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="product_name">商品名:</label>
        <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}" required>

        <label for="description">説明:</label>
        <textarea name="description" id="description" required>{{ old('description') }}</textarea>

        <label for="price">価格:</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" required>

        <label for="img">商品画像:</label>
        <input type="file" name="img" id="img" required>

        <label for="category_id">カテゴリー:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->categories_name }}</option>
            @endforeach
        </select>

        <button type="submit">登録</button>
    </form>
@endsection
