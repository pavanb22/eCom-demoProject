<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    public function get_data()
    {
        return ["name"=>"Pavan"];
    }
}
