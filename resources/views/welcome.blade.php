<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>spider</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Spider</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('index')}}">主页 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('soar.index')}}">Soar <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="{{route('search')}}">
            @csrf
            <input class="form-control mr-sm-2" name="kw" value="{{isset($kw)?$kw:""}}" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row row-cols-3">
        @foreach($paginate as $article)
            <div class="card" style="width: 18rem;">
                <img src="http://{{$article->avatar}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$article->name}}</h5>
                    <p class="card-text">{{$article->content}}</p>
                </div>
            </div>
        @endforeach
    </div>

    @if(!$paginate->items())
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">暂无结果。。。</h1>
            </div>
        </div>
    @endif
</div>

<div class="d-flex justify-content-center mt-3">
{{--    appends 是关键--}}
    {{ $paginate->appends(isset($q)?$q:[])->links() }}
</div>

</body>
</html>
