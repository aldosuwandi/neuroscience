<!DOCTYPE html>
<html>
<head>
    <title>{{ $channel['title'] }}</title>
</head>
<body>
    <h1><a href="{{url({{ $channel['link'] }}">{{ $channel['title'] }}</a></h1>
    <ul>
        @foreach($items as $item)
        <li>
            <a href="{{url({{ $item['loc'] }}">{{ (empty($item['title'])) ? $item['loc'] : $item['title'] }}</a>
            <small>(last updated: {{ date('Y-m-d\TH:i:sP', strtotime($item['lastmod'])) }})</small>
        </li>
        @endforeach
    </ul>
</body>
</html>