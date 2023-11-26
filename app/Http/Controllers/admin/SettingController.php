<?php

namespace App\Http\Controllers\admin;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings =Setting::query();
        if ($request->search) {
            $search = $request->search;
            $settings->where('name', 'LIKE', "%{$search}%");
                // ->orWhereHas('province', function ($query) use ($search) {
                //     $query->where('name', 'LIKE', "%{$search}%");
                // });

        }
        // if($request->province){
        //     $settings->where('province_id',$request->province);
        // }
        $settings = $settings->latest()->paginate(10);
        return view('admin.setting.all',compact(['settings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit',compact(['setting']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $data=$request->validate([
            'name'=>"required",
            'val'=>"required",
        ]);
        $setting->update($data);
        alert()->success(" اطلاعات با موفقیت به روز شد ") ;
        return redirect()->route("setting.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
