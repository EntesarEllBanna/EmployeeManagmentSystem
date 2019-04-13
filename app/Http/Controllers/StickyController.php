<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StickyController extends Controller
{
    public function index(){
        return view("sticky.index");
    }
    public function about(){
        return view("sticky/about");
    }
    public function contact(){
        return view("sticky.contact");
    }
}
