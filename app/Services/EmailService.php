<?php


namespace App\Services;


use App\Mail\SpiderSuccess;
use App\User;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public static function send($view='success',$msg="success")
    {
        $user=new User();
        $user->email='836334258@qq.com';
        $user->name="king";

        Mail::to($user)
            ->cc($user)
            ->send(new SpiderSuccess($msg,$view));
    }
}