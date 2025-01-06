@extends('layouts.app')

@section('title', 'ホーム - 商品一覧')

@section('content')
    <h1>商品一覧</h1>

    <div class="product-list">
        @foreach ($products as $product)
            <div class="product-item">
                <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->product_name }}" style="width:200px; height:auto;">
                <h2>{{ $product->product_name }}</h2>
                <p>{{ $product->description }}</p>
                <p>価格: {{ number_format($product->price) }}円</p>
                <p>カテゴリー: {{ $product->category->categories_name ?? '未分類' }}</p>
            </div>
        @endforeach
    </div>
@endsection

