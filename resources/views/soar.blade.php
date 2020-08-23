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
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="{{route('search')}}">
            @csrf
            <input class="form-control mr-sm-2" name="kw" value="{{isset($kw)?$kw:""}}" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="container">
    <form method="post" action="{{route('soar.post')}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Sql 语句</label>
            <textarea name="sql" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">提交</button>
    </form>

    <br/>
    {{!! $res??'' !!}}
</div>



</body>
</html>
