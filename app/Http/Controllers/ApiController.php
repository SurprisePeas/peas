<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendVerifyCode;

class ApiController extends Controller
{
    public function sendVerifyCode(Request $request)
    {
        // 验证phone字段
        $this->validate($request, ['phone'=>'required|size:11|exists:users']);
        // 将任务分发到队列
        dispatch(new SendVerifyCode($request->phone));
        return ['success'=>true];
    }
}
