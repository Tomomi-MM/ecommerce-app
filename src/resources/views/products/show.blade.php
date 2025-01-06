@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>価格: {{ number_format($product->price) }}円</p>

    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <label for="quantity">数量:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">
        <button type="submit">カートに追加</button>
    </form>
@endsection
