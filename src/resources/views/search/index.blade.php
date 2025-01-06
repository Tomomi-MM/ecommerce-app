@extends('layouts.app')

@section('title', '商品検索')

@section('content')
    <h1>商品検索</h1>
    <form action="{{ route('search.results') }}" method="GET">
        <label for="keyword">キーワード:</label>
        <input type="text" name="keyword" id="keyword">
        <label for="genre">ジャンルID:</label>
        <input type="text" name="genre" id="genre">
        <button type="submit">検索</button>
    </form>
@endsection
