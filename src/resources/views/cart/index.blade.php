@extends('layouts.app')

@section('title', 'カート')

@section('content')
    <h1>カート</h1>
    @if ($cartItems->isEmpty())
        <p>カートに商品がありません。</p>
    @else
        <ul>
            @foreach ($cartItems as $item)
                <li>
                    <h2>{{ $item->product->product_name }}</h2>
                    <p>価格: {{ number_format($item->product->price) }}円</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
