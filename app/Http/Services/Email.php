<?php

namespace App\Http\Services;

use Mail;
use Naux\Mail\SendCloudTemplate;

class Email
{
    public static function SendCloud($data , $user , $template_name)
    {
        $template = new SendCloudTemplate($template_name, $data);
        $res = Mail::raw($template, function ($message) use ($user) {
            $message->from('xiaohaitao_1995@163.com', '海涛个人style');
            $message->to($user->email);
        });
    }
}