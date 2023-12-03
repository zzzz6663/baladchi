<?php

namespace App\Http\Controllers\admin;

use Exception;
use Carbon\Carbon;
use App\Models\Telic;
use App\Models\Question;
use App\Models\Advertise;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $ads= Advertise::where('confirm','!=',null)->where('auto_release',null)->whereHas('options',function($query){
        //     $query->where('name','active_release')
        //    ->where('val','1');
        // })->get();
        // foreach( $ads as $ad){
        //     $date=$ad->show_option('day')." ".$ad->show_option('hour').":".$ad->show_option('min').":00";
        //     $res=null;
        //     try{
        //         $res=Carbon::parse($date);
        //         $now=Carbon::now();
        //     }catch(Exception){
        //     }
        //     if($now->gt($res)){
        //         $ad->update(['auto_release'=>$now]);
        //     }
        // }
        // dd($ads);

    //     $users->where(function ($query) use ($search, $users) {
    //         $users->where('name', 'LIKE', "%{$search}%")
    //         ->orWhere('family', 'LIKE', "%{$search}%")
    //         ->orWhere('mobile', 'LIKE', "%{$search}%")
    //         ->orWhereHas('province', function ($query) use ($search) {
    //             $query->where('name', 'LIKE', "%{$search}%");
    //         })
    //         ->orWhereHas('city', function ($query) use ($search) {
    //             $query->where('name', 'LIKE', "%{$search}%");
    //         });
    //    });

        $advertises = Advertise::query();
        if ($request->search) {
            $search = $request->search;
            $advertises->where('title', 'LIKE', "%{$search}%")
            ->orWhere('id', 'LIKE', "%{$search}%")
            ->orWhere('info', 'LIKE', "%{$search}%")
                ->orWhereHas('subset', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                }) ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                     ->orWhere('family', 'LIKE', "%{$search}%")
                     ->orWhere('mobile', 'LIKE', "%{$search}%");;
                });
        }
        $telic = null;
        if ($request->telic_id) {
            $telic = Telic::find($request->telic_id);
            $advertises->where('telic_id',$request->telic_id);
        }
            if ($request->user_id) {
            $advertises->where('user_id',$request->user_id);
        }
            if (in_array($request->confirm,['confirmed',"rejected"])) {
            $advertises->where('status',$request->confirm);
        }
         if ($request->confirm=="null") {
            $advertises->where('confirm',null);
        }
//         $advertises=$advertises->get();
//         foreach( $advertises as $ad){
//             $ad->update([
// 'expired_at'=>Carbon::parse($ad->created_at)->addDays(30)
//             ]);
//         }
//         dd(3);
        $advertises = $advertises->latest()->orderBy('expired_at', 'DESC')->paginate(40);


        return  view('admin.advertise.all', compact(['advertises', 'telic']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
            //   'name'=>'required|unique:advertises,name',
            'name' => 'required',
            'icon' => 'nullable',
            'telic_id' => 'nullable',
            'parent_id' => 'nullable',
            'years' => 'nullable',
        ]);

        $advertise = Advertise::create($data);
        if ($request->hasFile('icon')) {
            $destinationPath = 'icon';
            $file = $request->file('icon');
            $name =  $advertise->id . '_icon' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($destinationPath), $name);
            $advertise->update(['icon' => $name]);
        }
        if($request->years){
            $advertise->years()->delete();
            for($i=0;$i<sizeof($request->years);$i++){
                $advertise->years()->create([
                    'year'=>$request->years[$i]
                ]);
            }
           }
        alert()->success(' برند   جدید اضافه شد ' , false);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advertise $advertise)
    {
        return  view('admin.advertise.show', compact(['advertise']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertise $advertise)
    {
        $telic = $advertise->telic;
        return  view('admin.advertise.edit', compact(['advertise', 'telic']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, advertise $advertise)
    {

        // return redirect(route('advertise.index', ['telic_id' => $request->telic_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertise $advertise)
    {
        return back();
        //
    }
    public function change_advertise_status(Advertise $advertise,Request $request)
    {
        // dd($request->all());
        if(!$advertise->confirm){
            if($request->rejected){
                $status='rejected';
            alert()->success('آگهی با موفقیت رد شد ');

            }
            if($request->confirmed){
                $status='confirmed';
            alert()->success('آگهی با موفقیت تایید شد ');

            }
            $advertise->update([
                'confirm' =>Carbon::now(),
                'status' =>$status,
            ]);
        }else{
            alert()->warning('این اگهی قبلا تایید شده ');
        }

        return back();
        //
    }
}
