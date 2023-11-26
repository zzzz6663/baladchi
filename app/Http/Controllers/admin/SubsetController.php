<?php

namespace App\Http\Controllers\admin;
use App\Models\Subset;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubsetController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
// foreach (Category::where('parent_id','!=',null)->get() as $category){
//    $subset= Subset::create([
//         "category_id" => $category->parent_id,
//         "name" => $category->name,
//     ]);
//     foreach ($category->subs as $subset){
//          subset::create([
//         "subset_id" => $subset->id,
//         "name" => $subset->name,
//     ]);
//     }
// }


        $subsets = Subset::query();
        if ($request->search) {
            $search = $request->search;
           $subsets->where('name', 'LIKE', "%{$search}%");
        }
        $category=null;

if ($request->category_id) {
    $category=Category::find($request->category_id);
    // dd( $category);
   $subsets->where('category_id', $request->category_id);
}
        $subsets=$subsets->orderBy('id', 'DESC')->get() ;
        return  view('admin.subset.all',compact(['subsets','category']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.subset.create' );
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
        //   'name'=>'required|unique:subs,name',
          'name'=>'required',
          'icon'=>'nullable',
          'category_id'=>'required'
      ]);
      $category=Category::find($data['category_id']);
         $subset= Subset::create($data);
    //   $category->subs()->attach($subset->id);
        alert()->success(' زیر دسته  جدید اضافه شد ','پیام جدید',false);
        return back();

        return redirect(route('subset.index'));
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
    public function edit(Subset $subset)
    {
        return  view('admin.subset.edit',compact('subset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subset $subset)
   {
    $data=$request->validate([
        'name'=>'required',
        'icon'=>'nullable',
        'category_id'=>'required'
    ]);
    $category=Category::find($data['category_id']);

          $subset->update($data);
        alert()->success('دسته بندی   به روز رسانی شد ','پیام جدید');
        return redirect(route('subset.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subset $subset)
    {
        $subset->delete();
        alert()->success('دسته بندی حذف شد  ','پیام جدید');
        return back();
        //
    }


    public function subset_copy_question(Subset $subset ,Request $request)
    {

        if( $request->isMethod('post')){
            $data=$request->validate([
                'subset_id'=>"required"
            ]);
            $s_subset=subset::find($data['subset_id']);
            $questions=$s_subset->questions()->pluck('id')->toArray();
            $subset->questions()->sync($questions);
            alert()->success('سوالات با موفقیت کپی شد ');;
return redirect()->route('subset.index');


        }
        return  view('admin.subset.subset_copy_question',compact('subset'));
    }


}
