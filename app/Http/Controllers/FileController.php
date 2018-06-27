<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request) {
        $path = $request->file('file')->store('public');
        $pathArr = explode('/', $path);
        return ['data' => 'https://webblog.yolostudio.cn/storage/'.$pathArr[1], 'status' => 'success'];
    }
}
