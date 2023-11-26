<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $deposits = Deposit::query();
        if ($request->search) {
            $search = $request->search;
            // $deposits->where('name', 'LIKE', "%{$search}%")
            //     ->orWhereHas('subset', function ($query) use ($search) {
            //         $query->where('name', 'LIKE', "%{$search}%");
            //     });
        }
        $deposits = $deposits->latest()->get();
        return  view('admin.deposit.all', compact(['deposits']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return  view('admin.deposit.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return redirect()->route('deposit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(deposit $deposit)
    {

        return  view('admin.deposit.show', compact(['deposit']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(deposit $deposit)
    {
        return  view('admin.deposit.edit', compact(['deposit']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, deposit $deposit)
    {

        $data = $request->validate([
              'name'=>'required|unique:deposits,name,'. $deposit->id,
        ]);

        $deposit->update($data);
        alert()->success(' مهارت    به روز رسانی شد ' );
        return redirect()->route('deposit.index');
        // return redirect(route('deposit.index', ['telic_id' => $request->telic_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(deposit $deposit)
    {
        // $deposit->delete();
        // alert()->success(' مهارت  حذف شد  ' );
        // return back();
        //
    }
    public function confirm_deposit(deposit $deposit)
    {
        if($deposit->confirm){
            alert()->warning('این خرد جمعی قبلا  تایید شده ');
        }else{
            $deposit->update(['status'=>'show','confirm'=>Carbon::now()]);

            alert()->success('خرد جمعی باموفقیت تایید شد');
        }
        return back();
    }
}
