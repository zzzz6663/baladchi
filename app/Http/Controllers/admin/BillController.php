<?php

namespace App\Http\Controllers\admin;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  index(Request  $request ){

        $bills = Bill::query();
        if ($request->search) {
            $search = $request->search;
            $bills->where('title', 'LIKE', "%{$search}%")
            ->orWhere('info', 'LIKE', "%{$search}%")
                ->orWhereHas('subset', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                }) ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                     ->orWhere('family', 'LIKE', "%{$search}%")
                     ->orWhere('mobile', 'LIKE', "%{$search}%");;
                });
        }

        $bills = $bills->latest()->paginate(10);
        return  view('admin.bill.all',compact(['bills']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Bill $bill)
    {
        return  view('admin.bill.edit',compact(['bill']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $data=$request->validate([
            'transactionId'=>'required'
        ]);
        $bill->update([
            'status'=>'bill_payed',
            'transactionId'=>$request->transactionId,
        ]);
        alert()->success('اطلاعات پرداخت با موفقیت ثبت شد ');
        return redirect()->route('bill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
