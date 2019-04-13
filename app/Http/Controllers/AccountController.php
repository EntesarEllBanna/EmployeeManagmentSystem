<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AccountController extends Controller
{
    public function index()
    {
        //$items = DB::table("account")->get();
        /*select account.*,(select name from country where id=country_id)as country from account*/
        /*$items = DB::table("account")
            ->selectRaw("account.*,(select name from country where id=country_id)as country")
            ->get();*/
        
        /*SELECT account.*,country.name as country FROM `account` 
         left join country on account.country_id=country.id*/
        $items = DB::table("account")
            ->leftjoin("country","country_id","country.id")
            //->select("account.*","country.name as country","country.iso2")
            ->selectRaw("account.*,country.name as country,country.iso2")
            ->get();
        
        
        /*$items = DB::table("city")
            ->leftjoin("country","country_id","country.id")
            ->selectRaw("city.*,country.name as country")
            ->get();*/
        return view("account.index",compact("items"));
    }

    public function create()
    {
        $countries = DB::table("country")->get();
        return view("account.create",compact("countries"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|max:50',
            'email' => 'required|max:50|email',
            'gender' => 'required|max:1',
            'country_id' => 'required',
        ],[            
            'fullname.required' => 'Please enter Full Name',
            'email.required' => 'Please enter E-mail'
        ]);
        
        $fullname= $request["fullname"];
        $email= $request["email"];
        $gender= $request["gender"];
        $country_id= $request["country_id"];
        $active= $request["active"]?1:0;
        
        DB::table("account")->insert(["fullname"=>$fullname,"active"=>$active
                                     ,"gender"=>$gender,"email"=>$email,"country_id"=>$country_id]);
        \Session::flash("msg","i:Account created successfully");
        return redirect("/account/create");
    }
    public function show($id)
    {
        $item = DB::table("account")->find($id);
        if($item==NULL)
            return redirect("/account");
        return view("account.show",compact("item"));
    }

    public function edit($id)
    {
        $item = DB::table("account")->find($id);
        if($item==NULL)
            return redirect("/account");
        $countries = DB::table("country")->get();
        return view("account.edit",compact("item","countries"));
    }
    public function update(Request $request, $id)
    {        
        $validatedData = $request->validate([
            'fullname' => 'required|max:50',
            'email' => 'required|max:50|email',
            'gender' => 'required|max:1',
            'country_id' => 'required',
        ]);
        
        $fullname= $request["fullname"];
        $email= $request["email"];
        $gender= $request["gender"];
        $country_id= $request["country_id"];
        $active= $request["active"]?1:0;
        
        DB::table("account")->where("id",$id)->update(["fullname"=>$fullname,"active"=>$active
                                     ,"gender"=>$gender,"email"=>$email,"country_id"=>$country_id]);
        \Session::flash("msg","s:Account updated successfully");
        return redirect("/account");
    }
    public function destroy($id)
    {
        DB::table("account")->where("id",$id)->delete();
        \Session::flash("msg","w:Account deleted successfully");
        return redirect("/account");
    }
}
