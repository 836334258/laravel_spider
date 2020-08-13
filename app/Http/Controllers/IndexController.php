<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $paginate=Article::query()
            ->latest()
            ->paginate();

        return view('welcome',compact('paginate'));
    }
}
