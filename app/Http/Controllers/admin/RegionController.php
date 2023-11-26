<?php

namespace App\Http\Controllers\admin;
use App\Models\Region;
use App\Models\Subset;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;

class RegionController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $regions = Region::query();
        $city=null;
        if ($request->city_id) {
            $city=City::find($request->city_id);
            $regions->where('city_id', 'LIKE', $request->City_id);

         }
        if ($request->search) {
            $search = $request->search;
           $regions->where('name', 'LIKE', "%{$search}%")
            ->orWhereHas('city',function ($query) use ($search){
                $query->where('name', 'LIKE', "%{$search}%");
            })
           ;
        }

        $regions=$regions->latest()->get() ;
        return  view('admin.region.all',compact(['regions',"city"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.region.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data=$request->validate([
        //   'name'=>'required|unique:regions,name',
        'name'=>'required',
          'city_id'=>'required'
      ]);
         $region= Region::create($data);
    //   $category->regions()->attach($region->id);
        alert()->success(' منطقه  جدید اضافه شد ','پیام جدید',false);
        return back();

        return redirect(route('region.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return  view('admin.region.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
   {
    $data=$request->validate([
        'name'=>'required',
        'city_id'=>'required'
    ]);
          $region->update($data);
        alert()->success(' منطقه   به روز رسانی شد ','پیام جدید');
        return redirect(route('region.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(region $region)
    {

        //
    }


}
