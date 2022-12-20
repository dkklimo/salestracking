<?php

namespace App\Http\Controllers;

use App\Models\investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $data= investment::all();
       return view('admin.dashboard',compact('data'));
    }

    public function initiate(){

        $initiate = investment::create([
            'fkuser'=>1,       
        ]);

        return back()->with('success', 'Investment Initiated');

    }

    public function addcapital(Request $request){
        $currentcapitalx = investment::where('fkuser',1)->get();
        $currentcapital= $currentcapitalx[0]->capital;
        $data = investment::where('fkuser',1)->update([
            'capital'=>$currentcapital + $request->input('capital'),
        ]);

    

        return back()->with('success','Capital Updated Successfully');


    }
}
