<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Meet;
use App\Models\User;
use NumberFormatter;
use App\Models\Count;
use App\Models\Level;
use App\Models\Setting;
use App\Models\Advertise;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Shetabit\Multipay\Invoice;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Shetabit\Payment\Facade\Payment as shetabit;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class BillController extends Controller
{


    public function  checkout(Request  $request, Advertise $advertise)
    {
        $user = auth()->user();
        // if( $advertise->vip){
        //     alert()->warning('این آگهی قبلا پرداخت شده');;
        //     return back();
        // }
        $user_fave = $user->faves_ads()->pluck('id')->toArray();
        return  view('home.pay.checkout', compact(['advertise', 'user', 'user_fave']));
    }

    public function  send_bill(Request  $request)
    {

        $user = auth()->user();
        $via = 'zarinpal';

        $amount = $request->amount;

        $type = $request->type;

        $to_id = $request->to_id;
        $pay_from_cash = $request->pay_from_cash;
        $advertise_id = $request->advertise_id;
        $deposit_id = $request->deposit_id;
        $counsel_id = $request->counsel_id;
        $deposit_day = $request->deposit_day;
        $talk_id = null;


        $vip = $request->vip;
        $notif = $request->notif;
        $memo = $request->memo;

        $holdover = $request->holdover;
        $sort = $request->sort;

        // dd($request->all());
        if ($type == 'vip') {
            $amount =  $user->vip_price();
        }
        if ($type == 'talk') {
            $counsel =  User::find($to_id);
            $amount = $counsel->salary;
        }






        $invoice = (new Invoice);

        switch ($type) {
            case 'deposit':
                $deposit = $user->deposits()->create([
                    'advertise_id' => $advertise_id,
                    'type' => $type,
                    'amount' => $amount,
                    'status' => 'created',
                    'time' => 'created',
                    'deposit_day' => $deposit_day,
                ]);
                $deposit_id = $deposit->id;
                if ($request->pay_from_cash) {
                    if ($user->balance >= $amount) {

                        $bill = Bill::create([
                            'transactionId' => 000,
                            'amount' => $amount,
                            'user_id' => $user->id,
                            'advertise_id' => $advertise_id,
                            'deposit_id' => $deposit_id,
                            'type' => $type,
                            'status' => 'bill_payed',
                        ]);
                        $user->update(['balance' => $user->balance - $bill->amount]);
                        $bill->deposit->update([
                            'status' => 'payed',
                        ]);
                        return \redirect()->route('result.pay', $bill->id);
                    }
                }
                break;
            case 'vip':
                break;
            case 'donate_oute':
                break;
            case 'repay_deposit':

                if ($request->pay_from_cash) {
                    if ($user->balance >= $amount) {
                        $bill = Bill::create([
                            'transactionId' => 000,
                            'amount' => $amount,
                            'user_id' => $user->id,
                            'advertise_id' => $advertise_id,
                            'deposit_id' => $deposit_id,
                            'type' => $type,
                            'status' => 'bill_payed',
                        ]);
                        $user->update(['balance' => $user->balance - $bill->amount]);
                        $bill->deposit->update([
                            'status' => 'payed',
                        ]);
                        return \redirect()->route('result.pay', $bill->id);
                    }
                }
                break;
            case 'talk':
                $talk = $user->talks()->create([
                    'to_id' => $to_id,
                    'type' => $type,
                    'amount' => $amount,
                    'status' => 'created',
                ]);
                $talk_id=$talk->id;


                if ($request->pay_from_cash) {
                    if ($user->balance >= $amount) {
                        $bill = Bill::create([
                            'transactionId' => 000,
                            'amount' => $amount,
                            'user_id' => $user->id,
                            'talk_id' => $talk->id,
                            'type' => $type,
                            'status' => 'bill_payed',
                        ]);
                        $user->update(['balance' => $user->balance - $bill->amount]);
                        $talk->update(['status'=>"payed"]);
                        return \redirect()->route('result.pay', $bill->id);
                    }
                }

                break;

            case 'promotion':
                $ad = Advertise::find($advertise_id);
                if (!$request->vip &&  !$request->notif  && !$request->holdover && !$request->sort) {
                    alert()->warning('لطفا یک مورد را انتخاب کنید ');
                    return back();
                }
                if ($vip &&  !$ad->vip) {
                    $amount +=   $user->vip_price();
                }
                if ($notif &&  !$ad->vip) {

                    $amount +=   $user->notif_price();
                }
                if ($holdover) {
                    $amount +=   $user->holdover_price();
                }


                if ($sort) {
                    $amount +=   $user->sort_price();
                }

                if ($request->pay_from_cash) {
                    if ($user->balance >= $amount) {
                        $bill = Bill::create([
                            'transactionId' => 90909090,
                            'amount' => $amount,
                            'user_id' => $user->id,
                            'advertise_id' => $advertise_id,
                            'holdover' => $holdover,
                            'notif' => $notif,
                            'vip' => $vip,
                            'type' => $type,
                            'memo' => $memo,

                            'status' => 'bill_payed',
                        ]);
                        $user->update(['balance' => $user->balance - $bill->amount]);
                        if ($ad) {
                            if ($notif ) {
                                $ad->update(['notif' => 1]);
                                $advertise=Advertise::find($advertise_id);
                                $user->send_memo_advertise($advertise,$memo);
                            }

                            if ($sort) {
                                $ad->update(['sort' => Carbon::now()]);
                            }
                            if ($vip) {
                                $ad->update(['vip' => 1]);
                            }
                            if ($holdover) {
                                $ad->update(['expired_at' => Carbon::now()->addDays(30), "status" => "confirmed"]);
                            }
                        }
                        return \redirect()->route('result.pay', $bill->id);
                    }
                }

                break;
        }
        if ($request->pay_from_cash) {
            $invoice->amount($amount - $user->balance);
        } else {
            $invoice->amount($amount);
        }
        return   shetabit::via($via)->callbackUrl(route('bill.verify'))->purchase($invoice, function ($driver, $transactionId) use ($user, $vip, $notif, $holdover, $counsel_id, $type, $invoice, $advertise_id, $deposit_id,$talk_id, $amount, $to_id, $pay_from_cash, $sort,$memo) {
            $payment = Bill::create([
                'transactionId' => ($transactionId),
                'amount' => $amount,
                'user_id' => $user->id,
                'advertise_id' => $advertise_id,
                'deposit_id' => $deposit_id,
                'counsel_id' => $counsel_id,
                'talk_id' => $talk_id,
                'to_id' => $to_id,
                'type' => $type,
                'status' => 'created',
                'pay_from_cash' => $pay_from_cash,
                'holdover' => $holdover,
                'sort' => $sort,
                'notif' => $notif,
                'vip' => $vip,
                'memo' => $memo,
            ]);
        })->pay()->render();
    }

    public function result_pay(Bill $bill)
    {
        $user = $bill->user;
        if ($bill->status == 'bill_payed') {
            return view('home.pay.success', compact(['user', 'bill']));
        }
        return view('home.pay.failed', compact(['user', 'bill']));
    }







    public function bill_verify(Request $request)
    {
        // dd($request->all());
        $tid = ($request->Authority);
        $bill = Bill::where('transactionId', ($tid))->first();
        $advertise = $bill->advertise;
        $user = $bill->user;
        $amount = (int)$bill->amount;
        if (!$bill) {
            alert()->error('پرداخت با مشکل مواجه شد');
            return \redirect()->route('login');
        }

        try {
            $amount = (int)$bill->amount;
            if ($bill->pay_from_cash) {
                $amount = $amount - $user->balance;
            }
            $receipt = shetabit::amount($amount)->transactionId($request->Authority)->verify();
            if ($request->Status == 'OK') {
                $bill->update([
                    'status' => 'bill_payed'
                ]);
                switch ($bill->type) {
                    case 'charge_wallet':
                        $user->update(['balance' => $user->balance += $bill->amount]);
                        break;

                    case 'repay_deposit':
                    case 'deposit':
                        $bill->deposit->update([
                            'status' => 'payed',
                        ]);
                        if ($bill->pay_from_cash) {

                            $new_bill = Bill::create([
                                'transactionId' => 000,
                                'amount' => $amount,
                                'user_id' => $user->id,
                                'advertise_id' => $bill->advertise->id,
                                'deposit_id' => $bill->deposit->id,
                                'type' => $bill->type,
                                'status' => 'bill_payed',
                            ]);
                            $user->update(['balance' => 0]);
                            $bill->update([
                                'amount' => $bill->deposit->amount
                            ]);
                            $bill->deposit->update([
                                'status' => 'payed',
                            ]);
                        }
                        break;
                    case 'talk':
                        if ($bill->pay_from_cash) {
                            $new_bill = Bill::create([
                                'transactionId' => 999999,
                                'amount' => $amount,
                                'user_id' => $user->id,
                                'talk_id' => $bill->talk_id,
                                'type' => $bill->type,
                                'status' => 'bill_payed',
                            ]);
                            $user->update(['balance' => 0]);

                        }
                        $bill->talk->update(['status'=>"payed"]);
                        break;
                    case 'vip':
                        $bill->advertise->update([
                            'vip' => '1',
                        ]);
                        break;
                    case 'pay_counsel':
                        $bill->counsel->update([
                            // 'pay'=>'1',
                            'show' => Carbon::now(),
                            'status' => "ready_to_show",
                            'pay' => "1",
                        ]);
                        break;
                    case 'donate_oute':

                        $user = User::find($bill->to_id);
                        $user->update(['balance' => $bill->amount + $user->balance]);
                        $payment = Bill::create([
                            'transactionId' => 888,
                            'amount' => $bill->amount,
                            'user_id' => $user->id,
                            'advertise_id' => null,
                            'deposit_id' => null,
                            'counsel_id' => null,
                            'to_id' => $bill->user->id,
                            'type' => "donate_in",
                            'status' => 'bill_payed',
                        ]);
                        break;



                    case 'promotion':
                        if ($bill->notif) {
                            $bill->advertise->update(['notif' => 1]);
                            $advertise=$bill->advertise;
                            $user->send_memo_advertise($advertise,$bill->memo);
                        }
                        if ($bill->vip) {
                            $bill->advertise->update(['vip' => 1]);
                        }

                        if ($bill->sort) {
                            $bill->advertise->update(['sort' => Carbon::now()]);
                        }
                        if ($bill->holdover) {
                            $bill->advertise->update(['expired_at' => Carbon::now()->addDays(30), "status" => "confirmed"]);
                        }
                        if ($bill->pay_from_cash) {

                            $new_bill = Bill::create([
                                'transactionId' => 808080,
                                'amount' => $user->balance,
                                'user_id' => $user->id,
                                'advertise_id' => $bill->advertise->id,
                                'holdover' => $bill->holdover,
                                'notif' => $bill->notif,
                                'vip' => $bill->vip,
                                'type' => "promotion_balance_removal",
                                'status' => 'bill_payed',
                            ]);
                            $user->update(['balance' => 0]);
                        }
                        break;
                }
            }
        } catch (InvalidPaymentException $exception) {
            /**
                when payment is not verified, it will throw an exception.
                We can catch the exception to handle invalid payments.
                getMessage method, returns a suitable message that can be used in user interface.
             **/

            $bill->update([
                'status' => 'bill_filed'
            ]);

            return \redirect()->route('result.pay', $bill->id);
            // echo $exception->getMessage();
        }


        return \redirect()->route('result.pay', $bill->id);
    }
}
