<?php

namespace App\Http\Controllers\admin;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::query();
        if ($request->search) {
            $search = $request->search;
           $categories->where('name', 'LIKE', "%{$search}%");

        }
        $categories=$categories->orderBy('id', 'DESC')->get() ;
        return  view('admin.category.all',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.category.create' );
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
          'name'=>'required',
          'icon'=>'nullable',
          'price'=>'nullable',
      ]);
         $category= Category::create($data);
        alert()->success('دسته بندی جدید اضافه شد ','پیام جدید');
        return redirect(route('category.index'));
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
    public function edit(Category $category)
    {
        return  view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
   {
    $data=$request->validate([
        'name'=>'required',
        'icon'=>'nullable',
        'price'=>'nullable',
    ]);
          $category->update($data);
        alert()->success('دسته بندی   به روز رسانی شد ','پیام جدید');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        alert()->success('دسته بندی حذف شد  ','پیام جدید');
        return back();
        //
    }
    public function sub_cat_list(Category $category)
    {
        return response()->json([
            'html' => view('admin.category.sub_cat_list',compact(['category']))->render(),
            'list' => view('admin.category.sub_list',compact(['category']))->render(),
        ]);
    }
    public function add_sub_to_category(Category $category ,Request $request)
    {
        if ($request->method() == 'POST'){
            $data=$request->validate([
                'name'=>'required',
                'parent_id'=>'required',
            ]);
        }

        view('admin.category.add_sub_to_category',compact(['category']));
    }
}
