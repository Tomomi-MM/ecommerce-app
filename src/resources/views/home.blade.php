@extends('layouts.app')

@section('title', 'ホーム - 商品一覧')

@section('content')
    <h1>商品一覧</h1>

    <div class="product-list">
        @foreach ($products as $product)
            <div class="product-item">
                <!-- 商品画像 -->
                <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->product_name }}" style="width:200px; height:auto;">
                <!-- 商品名（詳細ページへのリンク） -->
                <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->product_name }}</a></h2>
                <!-- 商品価格 -->
                <p>価格: {{ number_format($product->price) }}円</p>
            </div>
        @endforeach
    </div>
@endsection

