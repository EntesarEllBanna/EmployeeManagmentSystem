<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasualController extends Controller
{
    public function index(){
        return view("casual.index");
    }
    public function about(){
        return view("casual.about");
    }
    public function store(){
        return view("casual.store");
    }
    public function products(){
        return view("casual.products");
    }
}
