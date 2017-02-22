<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield ('title') {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css?v=' . filemtime('css/app.css'), true) }}">
    <link rel="icon" href="{{ URL::asset('favicon.ico', true) }}">
    @yield ('meta')
    <meta property="fb:app_id" content="729337813885152">
    <meta name="root" content="{{ URL::secure('/') }}">
</head>
<body>
    <nav class="mainnav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <a href="{{ URL::secure('/') }}" class="logo">
                        @icon('logo')
                    </a>
                    <h1 class="insensible">Статьи о программировании</h1>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <form action="{{ URL::secure('/') }}" class="search">
                        <input type="text" name="search" placeholder="Поиск...">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                @yield ('content')
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="sidebar sidebar-categories">
                    <h3>Категории</h3>
                    @foreach ($categories as $category)
                        <a href='{{ URL::secure("category/$category->slug") }}' class="{{ Request::segment(2) == $category->slug ? 'active' : '' }}">
                            {{ $category->title }}<span class="count">{{ $category->getArticlesCount() }}</span>
                        </a>
                    @endforeach
                </div>
                <div class="sidebar">
                    <h3>Популярные статьи</h3>
                    @foreach ($popular_articles as $article)
                        <a href='{{ URL::secure("article/$article->id") }}'>
                            {{ $article->title }}
                        </a>
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
                    <a href="https://www.facebook.com/codepaper.ru" target="_blank">Facebook</a>
                </span>
            </div>
        </div>
    </footer>
    <script src="{{ URL::asset('js/all.js', true) }}"></script>
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
