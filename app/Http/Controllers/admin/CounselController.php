<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Answer;
use App\Models\Counsel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
            $counsels->where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }
        if ($request->status ) {
            $counsels->where('status', $request->status);
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
    public function show(counsel $counsel,Request $request)
    {
        $type=$request->type;
        $id=$request->id;

        if($type){
            if($type=="sound"){
                $answer=Answer::find( $id);
                File::delete(   $answer->sound_path());
                $answer->update([
                    'sound'=>null
                ]);
                toast()->success("فایل صدا با موفقیت حذف شد ");
            }
            if($type=="video"){
                $answer=Answer::find( $id);
                File::delete(   $answer->video_path());
                $answer->update([
                    'video'=>null
                ]);
                toast()->success("فایل صدا با موفقیت حذف شد ");
            }

            return redirect()->route("counsel.show",$counsel->id);
        }
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
    public function destroy(Counsel $counsel)
    {
        $counsel->update([
            'removed'=>Carbon::now()
        ]);

        // $counsel->delete();
        toast()->success(' خرد جمعی از سایت   حذف شد  ' );
        return back();
        //
    }
    public function insert_attach_answer(Answer $answer,Request $request){

        $answer=Answer::find($request->answer_id);
        $data=$request->validate([
            'answer_id'=>"required"
        ]);
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $rand = rand(10, 100);
            $name_video = 'video_' . $answer->id  . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('/media/counsel/'), $name_video);
            $data['video'] = $name_video;
        }


        if ($request->hasFile('sound')) {
            $sound = $request->file('sound');
            $rand = rand(10, 100);
            $name_sound = 'sound_' . $answer->id  . '.' . $sound->getClientOriginalExtension();
            $sound->move(public_path('/media/counsel/'), $name_sound);
            $data['sound'] = $name_sound;
        }
        $answer->update($data);

        alert()->success('خرد جمعی به روز رسانی  شد');
        return redirect()->route("counsel.show",$answer->Counsel->id);
    }


    public function confirm_counsel(Counsel $counsel)
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
