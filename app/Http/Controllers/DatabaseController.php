<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DatabaseController extends Controller
{
    public function intro(){
        $countryList = DB::table("country")->get();//select * from country
        return view("database.intro",compact("countryList"));
    }
}