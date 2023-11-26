<?php

namespace App\Http\Controllers\admin;
use App\Models\Telic;
use App\Models\Subset;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TelicController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $telics = Telic::query();
        $subset=null;
        if ($request->search) {
            $search = $request->search;
           $telics->where('name', 'LIKE', "%{$search}%")
            ->orWhereHas('subset',function ($query) use ($search){
                $query->where('name', 'LIKE', "%{$search}%");
            })
           ;
        }
        if ($request->subset_id) {
            $subset=Subset::find($request->subset_id);
           $telics->where('subset_id', $request->subset_id);
        }
        $telics=$telics->orderBy('id', 'DESC')->get() ;
        return  view('admin.telic.all',compact(['telics','subset']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.telic.create' );
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
        //   'name'=>'required|unique:telics,name',
        'name'=>'required',
          'icon'=>'nullable',
          'subset_id'=>'required'
      ]);
         $telic= Telic::create($data);
    //   $category->telics()->attach($telic->id);
        alert()->success(' زیر دسته نهایی  جدید اضافه شد ','پیام جدید',false);
        return back();

        return redirect(route('telic.index'));
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
    public function edit(Telic $telic)
    {
        return  view('admin.telic.edit',compact('telic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telic $telic)
   {
    $data=$request->validate([
        'name'=>'required',
        'icon'=>'nullable',
        'subset_id'=>'required'
    ]);
          $telic->update($data);
        alert()->success(' زیر دسته نهایی   به روز رسانی شد ','پیام جدید');
        return redirect(route('telic.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telic $telic)
    {
        $telic->delete();
        alert()->success(' زیر دسته نهایی حذف شد  ','پیام جدید');
        return back();
        //
    }
 public function telic_copy_question(Telic $telic ,Request $request)
    {

        if( $request->isMethod('post')){
            $data=$request->validate([
                'telic_id'=>"required"
            ]);
            $s_telic=Telic::find($data['telic_id']);
            $questions=$s_telic->questions()->pluck('id')->toArray();
            $telic->questions()->sync($questions);
            alert()->success('سوالات با موفقیت کپی شد ');;
return redirect()->route('telic.index');


        }
        return  view('admin.telic.telic_copy_question',compact('telic'));
    }

}
