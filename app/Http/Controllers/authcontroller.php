<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authcontroller extends Controller
{

    public function home(){
        return view('index');
    }

    public function kursus(){
        return view('kursus.kursus');
    }
}
