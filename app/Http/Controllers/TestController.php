<?php

namespace App\Http\Controllers;

use App\Mail\SpiderSuccess;
use App\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function test()
    {
        $response=Http::get("https://www.qiushibaike.com/text/");

        preg_match_all('')
        dump($response->body()) ;
    }
}
