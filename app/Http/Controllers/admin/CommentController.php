<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::query();
        if ($request->search) {
            $search = $request->search;
            // $comments->where('name', 'LIKE', "%{$search}%")
            //     ->orWhereHas('subset', function ($query) use ($search) {
            //         $query->where('name', 'LIKE', "%{$search}%");
            //     });
        }
        $comments = $comments->latest()->get();
        return  view('admin.comment.all', compact(['comments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return  view('admin.comment.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return redirect()->route('comment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {

        return  view('admin.comment.show', compact(['comment']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        return  view('admin.comment.edit', compact(['comment']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {

        $data = $request->validate([
              'name'=>'required|unique:comments,name,'. $comment->id,
        ]);

        $comment->update($data);
        alert()->success(' مهارت    به روز رسانی شد ' );
        return redirect()->route('comment.index');
        // return redirect(route('comment.index', ['telic_id' => $request->telic_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        // $comment->delete();
        // alert()->success(' مهارت  حذف شد  ' );
        // return back();
        //
    }
    public function confirm_comment(Comment $comment)
    {
        if($comment->confirm){
            alert()->warning('این   نظر قبلا  تایید شده ');
        }else{
            $comment->update(['confirm'=>Carbon::now()]);

            alert()->success('  نظر باموفقیت تایید شد');
        }
        return back();
    }
}
