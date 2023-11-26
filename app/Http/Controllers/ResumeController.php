<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $user=auth()->user();
        $for_validate=[
            'title'=>"required|max:256",
            'location'=>"required|max:256",
            'type'=>"required",

            'from'=>"required|max:256",
            'to'=>"required|max:256",
            'info'=>"required",
        ];
           $validator = Validator::make($request->all(), $for_validate);
    if ($validator->fails()) {
        return response()->json($validator->errors());
    }
    $all_data = $validator->safe()->all();


    if ($request->hasFile('attach')) {
        $attach = $request->file('attach');
        $rand = rand(10, 100);
        $name_img = 'attach_' . $user->id  . '.' . $attach->getClientOriginalExtension();
        $attach->move(public_path('/media/resume/'), $name_img);
        $all_data['attach'] = $name_img;
    }
        $user->resumes()->create($all_data);
    return response()->json([
        'status' =>"ok",
        'all' =>$request->all(),
        'all_data' =>$all_data,
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Resume $resume)
    {
        $user=auth()->user();
      return view('home.panel.edit_resumes',compact(['resume','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        $user=auth()->user();
        $data=$request->validate(
            [
                'title'=>"required|max:256",
                'location'=>"required|max:256",
                'from'=>"required|max:256",
                'to'=>"required|max:256",
                'info'=>"required",
            ]
        );
        $data['confirm']=null;

        if ($request->hasFile('attach')) {
            $attach = $request->file('attach');
            $rand = rand(10, 100);
            $name_img = 'attach_' . $user->id  . '.' . $attach->getClientOriginalExtension();
            $attach->move(public_path('/media/resume/'), $name_img);
            $data['attach'] = $name_img;
        }


        // $data= $request->validate($data);

        $resume->update($data);
        alert()->success('رزومه با موفقیت به روز شد ');
        return redirect()->route('panel.resume');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        $resume->update(['title'=>'sss']);
        $resume->delete();
        alert()->success('رزومه با موفقیت حذف شد ');
        return redirect()->route('panel.resume');
        // return Redirect::route('panel.resume');
    }
}
