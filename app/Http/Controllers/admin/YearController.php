<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function get_brand_year_list(Request $request){
        $brand=Brand::find($request->id);
        return response()->json([
            'body' => view('home.advertise.categories.common.get_brand_year_list',compact('brand'))->render(),
        ]);

    }
}
