<?php

namespace App\Http\Controllers;

use App\Models\investment;
use App\Models\Stock;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function stock(){
        $stock = Stock::all();
        return view('admin.stock.stocks',compact('stock'));
    }

    public function addstock(Request $request){
        $stockquantity = $request->input('quantity');
        $stockprice = $request->input('stockprice');
        $salesprice = $request->input('saleprice');


        /////////STOCK AMOUNT
        $stockamount = $stockquantity * $stockprice;
        $profits = ($salesprice * $stockquantity)-$stockamount;


        ///create stock
        $createstock = Stock::create([
           'itemstocked'=>$request->input('itemstocked'),
            'stockquantity'=>$stockquantity,
            'stockamount'=>$stockamount,
            'stockprice'=>$stockprice,
            'saleprice'=>$salesprice,
            'profits'=>$profits,
            'fkuser'=>1
        ]);


        if($createstock !== null){
            $currentcapitalx = investment::where('fkuser',1)->get();
            $currentcapital= $currentcapitalx[0]->capital;
            $currentworkingcapital = $currentcapitalx[0]->workingcapital;
            $newcapital = $currentcapital-$stockamount;

            $updatecapital = investment::where('fkuser',1)->update([
                'capital'=>$newcapital,
                'workingcapital'=>$currentworkingcapital + $stockamount
            ]);
        }

        return back()->with('success','Stock Added');

    }
}
