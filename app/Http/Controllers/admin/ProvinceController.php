<?php

namespace App\Http\Controllers\admin;

use Gumlet\ImageResize;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = Province::query();
        if ($request->search) {
            $search = $request->search;
            $provinces->where('name', 'LIKE', "%{$search}%");
                // ->orWhereHas('province', function ($query) use ($search) {
                //     $query->where('name', 'LIKE', "%{$search}%");
                // });

        }
        // if($request->province){
        //     $provinces->where('province_id',$request->province);
        // }
        $provinces = $provinces->paginate(10);
        return view('admin.provinces.all',compact(['provinces']));
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
    public function show(Province $province)
    {
        $users=$province->users()->latest()->paginate(10);
        return view('admin.provinces.show',compact(['province','users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        return view('admin.provinces.edit',compact(['province']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
      $data=$request->validate([
          'image'=>'required|max:2048',
      ]);

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name_img = 'image_' . $province->id . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/media/province/'), $name_img);
        $path = public_path('/media/province/' . $name_img);
        if (file_exists($path)) {
            Image::make($path)->fit(667, 389)->save(public_path('/media/province/large' . $name_img));
            Image::make($path)->fit(362, 253)->save(public_path('/media/province/small' . $name_img));
            Image::make($path)->fit(362, 353)->save(public_path('/media/city/small' . $name_img));
        }
        $data['image'] = $name_img;
      }
      $province->update($data);
      alert()->success('عکس با موفقیت به روز شد ');
      return redirect()->route('province.index');
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
