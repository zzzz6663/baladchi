<?php

namespace App\Http\Controllers\admin;

use App\Models\Counsel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CounselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $counsels = Counsel::query();
        if ($request->search) {
            $search = $request->search;
            // $counsels->where('name', 'LIKE', "%{$search}%")
            //     ->orWhereHas('subset', function ($query) use ($search) {
            //         $query->where('name', 'LIKE', "%{$search}%");
            //     });
        }
        $counsels = $counsels->latest()->get();
        return  view('admin.counsel.all', compact(['counsels']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return  view('admin.counsel.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return redirect()->route('counsel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(counsel $counsel)
    {

        return  view('admin.counsel.show', compact(['counsel']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(counsel $counsel)
    {
        return  view('admin.counsel.edit', compact(['counsel']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, counsel $counsel)
    {

        $data = $request->validate([
              'name'=>'required|unique:counsels,name,'. $counsel->id,
        ]);

        $counsel->update($data);
        alert()->success(' مهارت    به روز رسانی شد ' );
        return redirect()->route('counsel.index');
        // return redirect(route('counsel.index', ['telic_id' => $request->telic_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(counsel $counsel)
    {
        // $counsel->delete();
        // alert()->success(' مهارت  حذف شد  ' );
        // return back();
        //
    }
    public function confirm_counsel(counsel $counsel)
    {
        if($counsel->confirm){
            alert()->warning('این خرد جمعی قبلا  تایید شده ');
        }else{
            $counsel->update(['status'=>'show','confirm'=>Carbon::now()]);

            alert()->success('خرد جمعی باموفقیت تایید شد');
        }
        return back();
    }
}
