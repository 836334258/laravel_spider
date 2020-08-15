<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $kw=$request->kw;


        $paginate=Article::query()
            ->where('name',"like","%{$kw}%")
            ->orWhere('content',"like","%{$kw}%")
            ->latest()
            ->paginate();

        $q['kw']=$kw;
        return view('welcome',compact('paginate','kw','q'));
    }
}
