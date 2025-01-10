@extends('layouts.app')

@section('title', $product->product_name)

@section('content')
    <h1>{{ $product->product_name }}</h1>
    <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->product_name }}" style="width:300px; height:auto;">
    <p>{{ $product->description }}</p>
    <p>価格: {{ number_format($product->price) }}円</p>
    <p>カテゴリー: {{ $product->category->categories_name ?? '未分類' }}</p>

    <!-- カートに追加フォーム -->
    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit">カートに追加</button>
    </form>
@endsection
