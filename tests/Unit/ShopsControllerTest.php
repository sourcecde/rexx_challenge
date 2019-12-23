<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShopsController extends Controller
{
    function index(Request $request)
    {

    // Product Listing For Dropdown Menu //

    $productView = DB::table('shops')
    					->groupBy('product_name')
    					->get();

    // Declare Variable and assign value //
    
    $customer_name = $request->customer_name;
    $product_id = $request->product_id;
    $price_min = $request->price_min;
    $price_max = $request->price_max;

    // Filter Search for the Main Output in Datatable //

     if(request()->ajax())
     {
     $data = DB::table('shops')
				->where(function($query) use ($customer_name,$product_id,$price_min,$price_max) {
					if($customer_name)
						$query->where('customer_name', 'like', '%' . $customer_name . '%');

					if($product_id)
						$query->where('product_id', $product_id);

					if($price_min)
						$query->whereBetween('product_price', [$price_min, $price_max]);
				})
				->get();

      return datatables()->of($data)->make(true);
     }
     return view('shops')->with('product', $productView);
    }
}
