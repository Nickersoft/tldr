<!DOCTYPE html>
<html>

<head>
    <title>TL;DR - The Summarized Search Engine</title>

    <link href="/css/all.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="ui top fixed borderless menu">
        <div class="ui container">
            <div class="item">
                <a href="/"><img class="ui tiny logo image" src="/images/logo.png"></a>
            </div>
            <div class="ui category search item">
                <div class="ui transparent left icon input">
                    <input class="prompt" type="text" placeholder="Search...">
                    <i class="search link icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="ui main container">
        @yield('content')
    </div>
    <script src="/js/require.js"></script>
    <script src="/js/main.min.js"></script>
</body>

</html>
