<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield ('title') {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css?v=' . filemtime('css/app.css')) }}">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}">
    @yield ('meta')
    <meta property="fb:app_id" content="729337813885152">
    <meta name="root" content="{{ URL::to('/') }}">
</head>
<body>
    <nav class="mainnav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <a href="{{ URL::to('/') }}" class="logo">
                        @icon('logo')
                    </a>
                    <h1 class="insensible">Статьи о программировании</h1>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <form action="{{ URL::to('/') }}" class="search">
                        <input type="text" name="search" placeholder="Поиск...">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 {{ Request::is('article/*') ? 'single-bg' : '' }}">
                @yield ('content')
            </div>
            <div class="col-xs-12 col-md-3 col-md-offset-1">
                <div class="sidebar">
                    <h3>Категории</h3>
                    @foreach ($categories as $category)
                        <a href='{{ URL::to("category/$category->slug") }}'>{{ $category->title }}<span class="count">{{ $category->getArticlesCount() }}</span></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="text">
                <span>&copy; {{ config('app.name') }} 2017</span>
                <span class="pull-right">
                    <a href="https://vk.com/codepaper" target="_blank">Вконтакте</a>
                    <a href="https://www.facebook.com/codepaper.ru" target="_blank">Фейсбук</a>
                </span>
            </div>
        </div>
    </footer>
    <script src="{{ URL::asset('js/all.js') }}"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-90727834-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
