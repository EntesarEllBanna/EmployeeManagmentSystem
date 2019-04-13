<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use DB;
class AccountRQController extends Controller
{
    public function index()
    {
        $items = DB::table("account")
            ->leftjoin("country","country_id","country.id")
            ->selectRaw("account.*,country.name as country,country.iso2")
            ->get();        
        return view("accountrq.index",compact("items"));
    }

    public function create()
    {
        $countries = DB::table("country")->get();
        return view("accountrq.create",compact("countries"));
    }

    public function store(AccountRequest $request)
    {        
        $fullname= $request["fullname"];
        $email= $request["email"];
        $gender= $request["gender"];
        $country_id= $request["country_id"];
        $active= $request["active"]?1:0;
        
        DB::table("account")->insert(["fullname"=>$fullname,"active"=>$active
                                     ,"gender"=>$gender,"email"=>$email,"country_id"=>$country_id]);
        \Session::flash("msg","i:Account created successfully");
        return redirect("/accountrq/create");
    }
    public function show($id)
    {
        $item = DB::table("account")->find($id);
        if($item==NULL)
            return redirect("/accountrq");
        return view("accountrq.show",compact("item"));
    }

    public function edit($id)
    {
        $item = DB::table("account")->find($id);
        if($item==NULL)
            return redirect("/account");
        $countries = DB::table("country")->get();
        return view("accountrq.edit",compact("item","countries"));
    }
    public function update(AccountRequest $request, $id)
    {        
        $fullname= $request["fullname"];
        $email= $request["email"];
        $gender= $request["gender"];
        $country_id= $request["country_id"];
        $active= $request["active"]?1:0;
        
        DB::table("account")->where("id",$id)->update(["fullname"=>$fullname,"active"=>$active
                                     ,"gender"=>$gender,"email"=>$email,"country_id"=>$country_id]);
        \Session::flash("msg","s:Account updated successfully");
        return redirect("/accountrq");
    }
    public function destroy($id)
    {
        DB::table("account")->where("id",$id)->delete();
        \Session::flash("msg","w:Account deleted successfully");
        return redirect("/accountrq");
    }
}
