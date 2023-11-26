<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::query();
        if ($request->search) {
            $search = $request->search;
            $cities->where('name', 'LIKE', "%{$search}%");
                // ->orWhereHas('province', function ($query) use ($search) {
                //     $query->where('name', 'LIKE', "%{$search}%");
                // });

        }
        // if($request->province){
        //     $cities->where('province_id',$request->province);
        // }
        $cities = $cities->paginate(50);
        return view('admin.cities.all', compact(['cities']));
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
    public function show(City $city)
    {
        $users=$city->users()->latest()->paginate(10);
        return view('admin.cities.show',compact(['city','users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit',compact(['city']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $data=$request->validate([
            'lat'=>'required',
            'lon'=>'required',
        ]);

        // if ($request->hasFile('image')) {
        //   $image = $request->file('image');
        //   $name_img = 'image_' . $city->id . '.' . $image->getClientOriginalExtension();
        //   $image->move(public_path('/media/city/'), $name_img);
        //   $path = public_path('/media/city/' . $name_img);
        //   if (file_exists($path)) {
        //     Image::make($path)->fit(667, 389)->save(public_path('/media/city/large' . $name_img));
        //     Image::make($path)->fit(362, 353)->save(public_path('/media/city/small' . $name_img));
        //       Image::make($path)->fit(356, 468)->save(public_path('/media/city/normal' . $name_img));
        //   }
        //   $data['image'] = $name_img;
        // }
        // if ($request->hasFile('banner')) {
        //   $banner = $request->file('banner');
        //   $name_img = 'banner_' . $city->id . '.' . $banner->getClientOriginalExtension();
        //   $banner->move(public_path('/media/city/'), $name_img);
        //   $path = public_path('/media/city/' . $name_img);
        //   if (file_exists($path)) {
        //       Image::make($path)->fit(1920, 520)->save(public_path('/media/city/' . $name_img));
        //   }
        //   $data['banner'] = $name_img;
        // }
        $city->update($data);
        alert()->success('عکس با موفقیت به روز شد ');
        return redirect()->route('city.index');
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
      public function upload_image_tiny_mc(Request $request)
    {
        // $fileName=$request->file('file')->getClientOriginalName();
        // $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        if ($request->hasFile('file')) {
            $tiny = $request->file('file');
            $fileName = $request->file('file')->getClientOriginalName();
            $tiny->move(public_path('/media/tiny/'), $fileName);
        }
        return response()->json(['location' => '/media/tiny/' . $fileName]);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }

}
