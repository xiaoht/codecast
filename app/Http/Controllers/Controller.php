<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnMsg($code = 200 , $data = [] , $msg = '')
    {
        $res = array(
            'code' => $code,
            'data' => $data,
            'msg'  => $msg
        );
        return json_encode($res);
    }
}
