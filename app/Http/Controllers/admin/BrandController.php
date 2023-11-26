<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Telic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::query();
        if ($request->search) {
            $search = $request->search;
            $brands->where('name', 'LIKE', "%{$search}%")
                ->orWhereHas('subset', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }
        $telic = null;
        if ($request->telic_id) {
            $telic = Telic::find($request->telic_id);
            $brands->where('telic_id',$request->telic_id);
        }
        $brands = $brands->orderBy('id', 'DESC')->get();
        return  view('admin.brand.all', compact(['brands', 'telic']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brand = Brand::find($request->brand_id);
        $telic = Telic::find($request->telic_id);

        if(!$request->telic_id){
            $telic=$brand->telic;
        }
        return  view('admin.brand.create', compact(['brand', 'telic']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            //   'name'=>'required|unique:brands,name',
            'name' => 'required',
            'icon' => 'nullable',
            'telic_id' => 'nullable',
            'parent_id' => 'nullable',
            'years' => 'nullable',
        ]);

        $brand = brand::create($data);

        if($request->years){
            $brand->years()->delete();
            for($i=0;$i<sizeof($request->years);$i++){
                $brand->years()->create([
                    'year'=>$request->years[$i]
                ]);
            }
           }
           if ($request->hasFile('icon')) {
            $destinationPath = 'icon';
            $file = $request->file('icon');
            $name =  $brand->id . '_icon' . '.' . $file->getClientOriginalExtension();
            // $file->move(public_path($destinationPath), $name);
            $file->move(public_path('/media/brand/'), $name);
            $brand->update(['icon' => $name]);
        }
        alert()->success(' برند   جدید اضافه شد ' , false);

        return back();
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
    public function edit(Brand $brand)
    {
        $telic = $brand->telic;
        return  view('admin.brand.edit', compact(['brand', 'telic']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            //   'name'=>'required|unique:brands,name',
            'name' => 'required',
            'icon' => 'nullable',
        ]);

        if($request->years){
            $brand->years()->delete();
            for($i=0;$i<sizeof($request->years);$i++){
                $brand->years()->create([
                    'year'=>$request->years[$i]
                ]);
            }
           }
        $brand->update($data);
        if ($request->hasFile('icon')) {
            $destinationPath = 'icon';
            $file = $request->file('icon');
            $name =  $brand->id . '_icon' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/brand/'), $name);
            $brand->update(['icon' => $name]);
        }
        alert()->success(' برند    به روز رسانی شد ' );
        return back();
        // return redirect(route('brand.index', ['telic_id' => $request->telic_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        alert()->success(' برند  حذف شد  ' );
        return back();
        //
    }
}
