<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$items = DB::table("country")->get();
        //$items = DB::connection("mysql2")->table("country")->get();
        $items = DB::connection("mysql")->table("country")->get();
        return view("country.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("country.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|unique:country',
            'iso2' => 'required|max:2',
        ],["name.required"=>"Please enter Country Name",
          /*"name.max"=>"Name Can't greater than 50 letter(s)",
          "iso2.required"=>"Please enter ISO2",
          "iso2.max"=>"ISO2 Can't greater than 2 letter(s)"*/]);
        
        /*echo $request["name"];
        echo "<hr>";
        echo $request["iso2"];*/
        $name= $request["name"];
        $iso2= $request["iso2"];
        
        DB::table("country")->insert(["name"=>$name,"iso2"=>$iso2]);
        \Session::flash("msg","i:Country created successfully");
        return redirect("/country/create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DB::table("country")->find($id);//find شغالة بس على البريماري كي ويكون اسم العمود اي دي
        //$item = DB::table("country")->where("id",$id)->first();
        if($item==NULL)
            return redirect("/country");
        return view("country.show",compact("item"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::table("country")->find($id);//find شغالة بس على البريماري كي ويكون اسم العمود اي دي
        //$item = DB::table("country")->where("id",$id)->first();
        if($item==NULL)
            return redirect("/country");
        return view("country.edit",compact("item"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|unique:country,name,'.$id,
            'iso2' => 'required|max:2',
        ],["name.required"=>"Please enter Country Name",
          /*"name.max"=>"Name Can't greater than 50 letter(s)",
          "iso2.required"=>"Please enter ISO2",
          "iso2.max"=>"ISO2 Can't greater than 2 letter(s)"*/]);
        
        $name= $request["name"];
        $iso2= $request["iso2"];
        /*echo "$id, $name, $iso2";*/
        DB::table("country")->where("id",$id)->update(["name"=>$name,"iso2"=>$iso2]);
        \Session::flash("msg","s:Country updated successfully");
        return redirect("/country");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("country")->where("id",$id)->delete();
        \Session::flash("msg","w:Country deleted successfully");
        return redirect("/country");
    }
}
