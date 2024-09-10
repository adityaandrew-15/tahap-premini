<?php

namespace App\Http\Controllers;

use App\Models\kursus;
use Illuminate\Http\Request;

class authcontroller extends Controller
{
    public function home(){
        return view('index');
    }
    public function kursus(){
        $data = kursus::all();
        return view('kursus',compact('data'));
    }
}
