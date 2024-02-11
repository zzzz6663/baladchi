<?php

namespace App\Http\Controllers\admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $skills = Skill::query();

        if ($request->search) {
            $search = $request->search;
            $skills->where('name', 'LIKE', "%{$search}%")
                ->orWhereHas('subset', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }

        if ($request->parent_id) {
            $skills->where('parent_id',$request->parent_id);

        }
        if ($request->child) {
            $skills->where('parent_id','!=',null);
        }
        if ($request->type) {
            $skills->where('type',$request->type);
        }
        if ($request->parent) {
            $skills->where('parent_id' ,null);
        }
        $parent=Skill::find($request->parent_id);
        $skills = $skills->orderBy('id', 'DESC')->get();
        return  view('admin.skill.all', compact(['skills','parent']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $parent=Skill::find($request->parent_id);

        return  view('admin.skill.create', compact(["parent"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
              'name'=>'required|unique:skills,name',
              'parent_id'=>'nullable',
              'type'=>'nullable',
        ]);

        $skill = Skill::create($data);

        alert()->success(' مهارت   جدید اضافه شد ' , false);

        return redirect()->route('skill.index');
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
    public function edit(Skill $skill)
    {

        return  view('admin.skill.edit', compact(['skill']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {

        $data = $request->validate([
              'name'=>'required|unique:skills,name,'. $skill->id,
              'parent_id'=>'nullable',
              'type'=>'nullable',
        ]);

        $skill->update($data);
        alert()->success(' مهارت    به روز رسانی شد ' );
        return redirect()->route('skill.index');
        // return redirect(route('skill.index', ['telic_id' => $request->telic_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        // $skill->delete();
        // alert()->success(' مهارت  حذف شد  ' );
        // return back();
        //
    }
}
