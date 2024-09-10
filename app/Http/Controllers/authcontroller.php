<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authcontroller extends Controller
{
    public function index(){
        return view('index');
    }

    public function kursus(){
        return view('kursus.kursus');
    }
}
