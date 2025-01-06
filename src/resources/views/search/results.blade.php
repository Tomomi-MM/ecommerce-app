<!DOCTYPE html>
<html>
<head>
    <title>楽天市場検索結果</title>
</head>
<body>
    <h1>検索結果</h1>
    @if(isset($results['Items']) && count($results['Items']) > 0)
        <ul>
            @foreach($results['Items'] as $item)
                <li>
                    <a href="{{ $item['Item']['itemUrl'] }}" target="_blank">
                        {{ $item['Item']['itemName'] }}
                    </a>
                    <p>{{ $item['Item']['itemPrice'] }}円</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>該当する商品がありません。</p>
    @endif
</body>
</html>
