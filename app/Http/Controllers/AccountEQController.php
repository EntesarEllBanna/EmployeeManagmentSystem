<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Account;
use App\Country;

class AccountEQController extends Controller
{
    public function index()
    {
        $items=Account::all();
        return view("accounteq.index",compact("items"));
    }
    public function paging()
    {
        $items=Account::paginate(7);
        return view("accounteq.paging",compact("items"));
    }
    public function search(Request $request)
    {
        $q=$request["q"];
        //echo $q;die();
        //$items=Account::where("fullname","like","%$q%")->orWhere("email","like","%$q%")->get();
        $items=Account::whereRaw("fullname like ? or email like ?",["%$q%","%$q%"])->get();
        return view("accounteq.search",compact("items","q"));
    }
    public function searchpaging(Request $request)
    {
        $q=$request["q"];
        $items=Account::whereRaw("fullname like ? or email like ?",["%$q%","%$q%"])
            ->paginate(7)
            ->appends(["q"=>$q]);
        return view("accounteq.searchpaging",compact("items","q"));
    }
    public function searchpagingadv(Request $request)
    {
        $q=$request["q"];
        $active=$request["active"];
        $gender=$request["gender"];
        
        $items=Account::whereRaw("1=1");
        if($q!=NULL && $q!="")
            $items=$items->whereRaw("(fullname like ? or email like ?)",["%$q%","%$q%"]);
        if($active!=NULL && $active!="")
            $items=$items->whereRaw("active = ?",[$active]);
        if($gender!=NULL && $gender!="")
            $items=$items->whereRaw("gender = ?",[$gender]);
        
        $items=$items->paginate(7)->appends(["q"=>$q,"active"=>$active,"gender"=>$gender]);
        return view("accounteq.searchpagingadv",compact("items","q","gender","active"));
    }

    public function create()
    {
        $countries = Country::all();
        return view("accounteq.create",compact("countries"));
    }

    public function store(AccountRequest $request)
    {        
        $account = new Account();
        
        $account->fullname= $request["fullname"];
        $account->email= $request["email"];
        $account->gender= $request["gender"];
        $account->country_id= $request["country_id"];
        $account->active= $request["active"]?1:0;
       
        $account->save();
        
        \Session::flash("msg","i:Account created successfully");
        return redirect("/accounteq/create");
    }
    public function show($id)
    {
        $item=Account::find($id);
        if($item==NULL)
            return redirect("/accounteq/searchpagingadv");
        return view("accounteq.show",compact("item"));
    }

    public function edit($id)
    {
         $item=Account::find($id);
        if($item==NULL)
            return redirect("/account");
        $countries = Country::get();
        return view("accounteq.edit",compact("item","countries"));
    }
    public function update(AccountRequest $request, $id)
    {        
        $account = Account::find($id);
        
        $account->fullname= $request["fullname"];
        $account->email= $request["email"];
        $account->gender= $request["gender"];
        $account->country_id= $request["country_id"];
        $account->active= $request["active"]?1:0;
       
        $account->save();
        
        \Session::flash("msg","s:Account updated successfully");
        return redirect("/accounteq/searchpagingadv");
    }
    public function destroy($id)
    {
        $account = Account::find($id);
        if($account==NULL)
            return redirect("/account");
        $account->delete();
        \Session::flash("msg","w:Account deleted successfully");
        return redirect("/accounteq/searchpagingadv");
    }
}
