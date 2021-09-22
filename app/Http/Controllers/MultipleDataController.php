<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//import both database model files and add public $connections = 'mysql2'

class MultipleDataController extends Controller
{
    function list()
    {
        //return DB::table('users')->get();
        return DB::connection('mysql2')->table('users')->get();
    }
}
