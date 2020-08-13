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
    <div class="container">
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
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $paginate->links() }}
    </div>

    </body>
</html>
