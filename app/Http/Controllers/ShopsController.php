<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use DateInterval;
use DateTimeZone;

class ShopsController extends Controller
{

    // Function to convert timezone from UTC to Europe/Berlin

    function timeConverter($sale_date)
    {
        $userTimezone = new \DateTimeZone('Europe/Berlin');
        $gmtTimezone = new \DateTimeZone('UTC');
        $myDateTime = new \DateTime($sale_date, $gmtTimezone);
        $offset = $userTimezone->getOffset($myDateTime);
        $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
        $myDateTime->add($myInterval);
        $result = $myDateTime->format('Y-m-d H:i:s');
        return $result;
    }

    // Function to comapre version and to calculate sale date according to timezone. We presume standard timezone is UTC.
    
    function versionCompare($version, $sale_date)
    {
        if (version_compare($version, '1.0.17+60', '<')) {
                            return $this->timeConverter($sale_date);
                            
                        }
                        else{
                            return $sale_date;
                        }
    }

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

      return datatables()->of($data)
                        ->addColumn('sale_date', function($data){
                        $version = $data->version;
                        $sale_date = $data->sale_date;
                        return $this->versionCompare($version, 
                                                    $sale_date);
                            })
                        ->make(true);
     }
     return view('shops')->with('product', $productView);
    }
}
