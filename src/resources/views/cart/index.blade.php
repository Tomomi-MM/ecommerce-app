@extends('layouts.app')

@section('title', 'カート')

@section('content')
    <h1>カート</h1>
    @if (session('cart') && count(session('cart')) > 0)
        <ul>
            @foreach (session('cart') as $id => $item)
                <li>
                    <h2>{{ $item['name'] }}</h2>
                    <p>数量: {{ $item['quantity'] }}</p>
                    <p>価格: {{ number_format($item['price'] * $item['quantity']) }}円</p>
                    <form action="{{ route('cart.destroy', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>カートは空です。</p>
    @endif
@endsection
