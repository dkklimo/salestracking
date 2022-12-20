<?php

namespace App\Http\Controllers;

use App\Models\investment;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function sales(){
        $sales=Sale::all();
        return view('admin.sales.sales',compact('sales'));
    }

    public function addsales(Request $request){
        $quantitysold = $request->input('quantitysold');
        $saleprice =$request->input('amountsold');
        $saleamount = $quantitysold * $saleprice;
        $expenditureamount=$request->input('expenditureamount');
        $total = $saleamount-$expenditureamount;
        

        $createsales = Sale::create([
            'itemsold'=>$request->input('itemsold'),
            'quantitysold'=>$quantitysold,
            'amountsold'=>$saleamount,
            'expenditure'=>$request->input('expenditure'),
            'expenditureamount'=>$expenditureamount,
            'totalprice'=>$total,
            'fkuser'=>1,
        ]);
        
        if($createsales!==null){
            $current = investment::where('id',1)->get();
            $currentsales = $current[0]->sales;
            $currentprofit = $current[0]->profits;
            $currentworkingcapital = $current[0]->workingcapital;
            $totalsales = $currentsales + $total;
            $totalprofit = $totalsales-$currentworkingcapital;


            $updateinvestment = investment::where('id',1)->update([
                'sales'=>$totalsales,
                'profits'=>$totalprofit
            ]);
        }


        return back()->with('success','Item Sold Added Successfully');
    }
}
