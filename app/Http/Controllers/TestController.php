<?php

namespace App\Http\Controllers;

use App\Mail\SpiderSuccess;
use App\Services\SpiderService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function test()
    {
        app('spider')->crawling();
    }
}
