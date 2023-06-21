<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DB_Connect extends Controller
{
    function select()
    {
        // echo "<pre>";
        // print_r(DB::table('actor')->where('actor_id', 1)->get());
        // $result = DB::table('actor')->select(['actor_id', 'first_name'])->where('actor_id', 1)->get();

        //  echo $result;
        DB::table('actor')->where('actor_id', 201)->update(['last_name'=>"DAS"]);
    }
    // function insert
}
