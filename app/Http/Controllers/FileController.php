<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function upload(Request $request)
    {
        $result = $request->file('file')->store('api_docs');
        return ['result'=>$result];
    }
}
