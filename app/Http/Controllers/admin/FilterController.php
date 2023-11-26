<?php

namespace App\Http\Controllers\admin;

use App\Models\Telic;
use App\Models\Filter;
use App\Models\Subset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $filters = Filter::query();
        $subset=null;
        if ($request->search) {
            $search = $request->search;
           $filters->where('name', 'LIKE', "%{$search}%");
        }
        $r=[];
        $filters=$filters->latest()->get();

        return  view('admin.filter.all',compact(['filters']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.filter.create' );
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
          'fa'=>'required|unique:filters,fa',
          'en'=>'required|unique:filters,en',
      ]);
         $filter= Filter::create($data);
        // alert()->success(' سوال    جدید اضافه شد ');
        return back();

        return redirect(route('filter.index'));
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
    public function edit(Filter $filter)
    {
        return  view('admin.filter.edit',compact('filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filter $filter)
   {
    $data=$request->validate([
        'fa'=>'required',
          'en'=>'nullable',
      ]);
          $filter->update($data);
        alert()->success(' سوال    به روز  شد ');

        return redirect(route('filter.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filter $filter)
    {
        $filter->delete();
        alert()->success(' زیر دسته نهایی حذف شد  ','پیام جدید');
        return back();
        //
    }
    public function change_telic_required(Telic $telic,Request $request)
    {
        $filter=Filter::find($request->filter);
        $rel_filter=$telic->filters()->where('filter_id',$filter->id)->first();
        if(!$rel_filter){
            return response()->json([
                'status' =>false ,
            ]);
        }
        if( $rel_filter->pivot->required){
            $telic->filters()->updateExistingPivot($filter->id, array('required' => 0), false);
            return response()->json([
                'status' =>0 ,
            ]);
        }else{
            $telic->filters()->updateExistingPivot($filter->id, array('required' => 1), false);
            return response()->json([
                'status' =>1 ,
            ]);
        }

        return response()->json([
            'all' =>$request->all() ,
        ]);
    }
      public function change_subset_required(Subset $subset,Request $request)
    {
        $filter=Filter::find($request->filter);
        $rel_filter=$subset->filters()->where('filter_id',$filter->id)->first();
        if(!$rel_filter){
            return response()->json([
                'status' =>false ,
            ]);
        }
        if( $rel_filter->pivot->required){
            $subset->filters()->updateExistingPivot($filter->id, array('required' => 0), false);
            return response()->json([
                'status' =>0 ,
            ]);
        }else{
            $subset->filters()->updateExistingPivot($filter->id, array('required' => 1), false);
            return response()->json([
                'status' =>1 ,
            ]);
        }

        return response()->json([
            'all' =>$request->all() ,
        ]);
    }
    public function add_filter_to_telic(Telic $telic,Request $request)
    {
        if($request->method() == 'POST'){
            $data=$request->validate([
                'filters'=>'required|array|min:1'
            ]);
            $telic->filters()->sync($data['filters']);
            alert()->success('سوالات به این دسته بندی اضافه شد ');
            return redirect()->route('telic.index');
        }
        return  view('admin.filter.add_filter_to_telic',compact(['telic']));
        //
    }
    public function add_filter_to_subset(Subset $subset,Request $request)
    {
        if($request->method() == 'POST'){
            $data=$request->validate([
                'filters'=>'required|array|min:1'
            ]);
            $subset->filters()->sync($data['filters']);
            alert()->success('سوالات به این دسته بندی اضافه شد ');
            return redirect()->route('subset.index');
        }
        return  view('admin.filter.add_filter_to_subset',compact(['subset']));
        //
    }
}
