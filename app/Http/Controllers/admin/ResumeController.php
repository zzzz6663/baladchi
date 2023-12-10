<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Resume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        $resumes = Resume::query();
        if ($request->search) {
            $search = $request->search;
            $resumes->where('name', 'LIKE', "%{$search}%");
                // ->orWhereHas('province', function ($query) use ($search) {
                //     $query->where('name', 'LIKE', "%{$search}%");
                // });

        }

        if (in_array($request->confirm, ['confirmed', "rejected"])) {
        }
        if ($request->confirm=="confirm" ) {
            $resumes->where('confirm',"!=", null);

        }
        if ($request->confirm=="wait" ) {
            $resumes->where('confirm', null);
        }
        // if($request->province){
        //     $resumes->where('province_id',$request->province);
        // }
        $resumes = $resumes->latest()->paginate(10);
        return view('admin.resume.all',compact(['resumes']));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $allresumes)
    {

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
     public function confirm_resume(Request $request, Resume $resume)
    {
        $resume->update(['confirm'=>Carbon::now()]);
        alert()->success('با موفقیت تایید شد ');
        return back();
    }
}
