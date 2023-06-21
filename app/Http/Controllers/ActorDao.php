<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorDao extends Controller
{
    function getData(){
        return view("userManagement")->with("dataArr", Actor::all());
    }
}
