<?php

namespace App\Http\Controllers\admin;
use App\Models\Telic;
use App\Models\Subset;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $questions = Question::query();
        $subset=null;
        if ($request->search) {
            $search = $request->search;
           $questions->where('name', 'LIKE', "%{$search}%");
        }
        $r=[];
        $questions=$questions->latest()->get();
// foreach ( $questions as $question){
//     $r[$question->en]=$question->fa;
// }
// dd($r);
        return  view('admin.question.all',compact(['questions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.question.create' );
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
        'fa'=>'required|unique:questions,fa',
          'en'=>'required|unique:questions,en',
      ]);
         $question= Question::create($data);
        // alert()->success(' سوال    جدید اضافه شد ');
        return back();

        return redirect(route('question.index'));
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
    public function edit(Question $question)
    {
        return  view('admin.question.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
   {
    $data=$request->validate([
        'fa'=>'required',
          'en'=>'nullable',
      ]);
          $question->update($data);
        alert()->success(' سوال    به روز  شد ');

        return redirect(route('question.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        alert()->success(' زیر دسته نهایی حذف شد  ','پیام جدید');
        return back();
        //
    }
    public function question_active(Question $question,Request $request)
    {
        if($question->show){
            $question->update(['show'=>0]);
        }else{
            $question->update(['show'=>1]);

        }
        return response()->json([
            'all' =>$request->all() ,
            'show' =>$question->show ,
        ]);
    }
    public function change_telic_required(Telic $telic,Request $request)
    {
        $question=Question::find($request->question);
        $rel_question=$telic->questions()->where('question_id',$question->id)->first();
        if(!$rel_question){
            return response()->json([
                'status' =>false ,
            ]);
        }
        if( $rel_question->pivot->required){
            $telic->questions()->updateExistingPivot($question->id, array('required' => 0), false);
            return response()->json([
                'status' =>0 ,
            ]);
        }else{
            $telic->questions()->updateExistingPivot($question->id, array('required' => 1), false);
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
        $question=Question::find($request->question);
        $rel_question=$subset->questions()->where('question_id',$question->id)->first();
        if(!$rel_question){
            return response()->json([
                'status' =>false ,
            ]);
        }
        if( $rel_question->pivot->required){
            $subset->questions()->updateExistingPivot($question->id, array('required' => 0), false);
            return response()->json([
                'status' =>0 ,
            ]);
        }else{
            $subset->questions()->updateExistingPivot($question->id, array('required' => 1), false);
            return response()->json([
                'status' =>1 ,
            ]);
        }

        return response()->json([
            'all' =>$request->all() ,
        ]);
    }
    public function add_question_to_telic(Telic $telic,Request $request)
    {
        if($request->method() == 'POST'){
            $data=$request->validate([
                'questions'=>'required|array|min:1'
            ]);
            $telic->questions()->sync($data['questions']);
            alert()->success('سوالات به این دسته بندی اضافه شد ');
            return redirect()->route('telic.index');
        }
        return  view('admin.question.add_question_to_telic',compact(['telic']));
        //
    }
    public function add_question_to_subset(Subset $subset,Request $request)
    {
        if($request->method() == 'POST'){
            $data=$request->validate([
                'questions'=>'required|array|min:1'
            ]);
            $subset->questions()->sync($data['questions']);
            alert()->success('سوالات به این دسته بندی اضافه شد ');
            return redirect()->route('subset.index');
        }
        return  view('admin.question.add_question_to_subset',compact(['subset']));
        //
    }

}
