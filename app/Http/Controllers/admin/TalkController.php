<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Talk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TalkController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $talks = Talk::query();
        if ($request->search) {
            $search = $request->search;
            // $talks->where('name', 'LIKE', "%{$search}%")
            //     ->orWhereHas('subset', function ($query) use ($search) {
            //         $query->where('name', 'LIKE', "%{$search}%");
            //     });
        }
        $talks = $talks->latest()->get();
        return  view('admin.talk.all', compact(['talks']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return  view('admin.talk.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return redirect()->route('talk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(talk $talk)
    {

        return  view('admin.talk.show', compact(['talk']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(talk $talk)
    {
        return  view('admin.talk.edit', compact(['talk']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, talk $talk)
    {

        $data = $request->validate([
              'name'=>'required|unique:talks,name,'. $talk->id,
        ]);

        $talk->update($data);
        alert()->success(' مهارت    به روز رسانی شد ' );
        return redirect()->route('talk.index');
        // return redirect(route('talk.index', ['telic_id' => $request->telic_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(talk $talk)
    {
        // $talk->delete();
        // alert()->success(' مهارت  حذف شد  ' );
        // return back();
        //
    }
    public function confirm_talk(talk $talk)
    {
        if($talk->confirm){
            alert()->warning('این   نظر قبلا  تایید شده ');
        }else{
            $talk->update(['confirm'=>Carbon::now()]);

            alert()->success('  نظر باموفقیت تایید شد');
        }
        return back();
    }
}
