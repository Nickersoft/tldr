<!DOCTYPE html>
<html>

<head>
    <title>TL;DR - The Summarized Search Engine</title>

    <link href="/css/all.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="ui container">
        @yield('content')
    </div>
    <script src="/js/require.js"></script>
    <script src="/js/main.min.js"></script>
</body>

</html>
