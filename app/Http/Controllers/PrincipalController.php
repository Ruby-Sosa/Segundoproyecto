<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index(){
        //return
        return view("principal");
    }
    //
    public function principal()
    {
        return view("principal");
    }
}
