<?php

namespace App\Http\Controllers;

use App\Models\kursus;
use Illuminate\Http\Request;

class authcontroller extends Controller
{
    public function index(){
        return view('index');
    }
}
