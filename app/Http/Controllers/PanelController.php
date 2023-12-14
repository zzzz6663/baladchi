<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Bill;
use App\Models\Chat;
use App\Models\City;
use App\Models\Note;
use App\Models\Talk;
use App\Models\User;
use App\Models\Assist;
use App\Models\Counsel;
use App\Models\Deposit;
use App\Models\Province;
use App\Models\Advertise;
use App\Events\NewMessage;
use App\Events\SeenMessage;
use App\Models\Image as IM;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Events\DirectMessage;
use App\Models\Counselquestion;
use App\Models\Setting;
use Morilog\Jalali\CalendarUtils;
use Illuminate\Support\Facades\File;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PanelController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        // $chat=Chat::find(245);

        // $chat=Chat::create([
        //     'advertise_id'=>null,
        //     'chat'=>"sssssss",
        //     'type'=>"direct",
        //     'user_id'=> $user->id,
        //     'sender'=> $user->id,
        //     'to_id'=>"4",
        // ]);
        // DirectMessage::dispatch($chat);
        // DirectMessage::dispatch($chat);
        return view('home.panel.dashboard', compact(['user']));
    }

    public function advertises()
    {
        $user = auth()->user();

        $advertises = $user->advertises()->where('active', '1')->latest()->paginate(10);
        return view('home.panel.advertises', compact(['user', 'advertises']));
    }

    public function notes()
    {
        $user = auth()->user();
        $notes = $user->notes;
        return view('home.panel.notes', compact(['user', 'notes']));
    }
    public function visitor(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'city_id' => "required",
                'region_id' => "nullable",
                'show_visitor' => "nullable",
            ]);
            $user->update($data);
            if($user->show_visitor){
                alert()->success("شما به عنوان بازدید کننده ثبت شدید  ");

            }else{
                alert()->success("شما دیگر بازدید کننده نیستید   ");

            }
            redirect()->route("panel.visitor");
        }
        $user = auth()->user();
        return view('home.panel.visitor', compact(['user']));
    }

    public function wallet()
    {
        $user = auth()->user();
        $bills = $user->bills()->whereIn('status', ['bill_payed', 'bill_filed', 'created'])->latest()->get();
        return view('home.panel.wallet', compact(['user', 'bills']));
    }

    public function talk()
    {
        $user = auth()->user();
        $user_talk = $user->talks()->latest()->get();
        $to_talk = $user->to_talks()->latest()->get();
        return view('home.panel.talk', compact(['user', 'user_talk',"to_talk"]));
    }
    public function confirm_talk(Talk $talk)
    {

        $user = auth()->user();
        $talk->update([
            "status"=>'talk_confirm',
            "confirm_id"=>    $user->id,
            "confirm"=>Carbon::now(),
        ]);
        $percent=$user->talk_price();
        $to=$talk->talker;
        $admin=User::find(1);
        if($to->to_talks()->count()>1){
            $amount=$talk->amount-floor(($talk->amount*$percent)/100);
            $diff=$talk->amount-  $amount;
            $bill = Bill::create([
                'transactionId' => 808089999,
                'amount' => $diff,
                'user_id' => $user->id,
                'type' => "admin_talker_share",
                'status' => 'bill_payed',
                'talk_id' => $talk->id,
            ]);
            $admin->update(['balance' => $admin->balance + $amount]);

        }else{
            $amount=$talk->amount;
        }
        $to->update(['balance' => $to->balance + $amount]);
        $bill = Bill::create([
            'transactionId' => 808089999,
            'amount' => $amount,
            'user_id' => $to->id,
            'talk_id' => $talk->id,
            'type' => "talk_alker_share",
            'status' => 'bill_payed',
        ]);
        alert()->success("مشاوره با موفقیت تایید  شد ");
        return back();
    }

    public function remove_ad_img(Request $request ,Im $image)
    {
        $pa=$image->path();
        if ((\File::exists($pa))) {
            File::delete($pa);
            $image->delete();
            return response()->json([
                'all'=>12
            ]);
        }
        return response()->json([
            'all'=>$request->all(),
            'pa'=>$pa,
        ]);
    }

    public function faves(Request $request)
    {
        $user = auth()->user();
        $fave_ads = $user->faves_ads();
        if ($request->search) {
            $search = $request->search;
            $fave_ads->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%");
            });
        }
        $fave_ads =  $fave_ads->latest()->get();

        $user_fave = $user->faves_ads()->pluck('id')->toArray();
        foreach( $user->memos()->wherePivot("seen",0)->get() as $me){
            $user->memos()->updateExistingPivot($me, array('seen' => 1), false);
        }
        return view('home.panel.faves', compact(['user', 'user_fave', 'fave_ads']));
    }


    public function faqs()
    {
        $user = auth()->user();
        return view('home.panel.faqs', compact(['user']));
    }


    public function finish_counsel(Request $request, Counsel $counsel)
    {
        switch ($counsel->reward) {
            case "select_the_best_answer":
                $request->validate([
                    'select_id' => 'required'
                ]);
                $counsel->update(['select_id' => $request->user_id, "status" => "finish"]);
                $inv = User::find($request->select_id);
                $bill = Bill::create([
                    'transactionId' => "0000",
                    'amount' =>  $counsel->price,
                    'user_id' => $inv->id,
                    'advertise_id' => null,
                    'deposit_id' => null,
                    'counsel_id' => $counsel->id,
                    'type' => "counsel_share",
                    'status' => 'bill_payed',
                ]);
                $inv->update(['balance' => $inv->balance += $bill->amount]);
                break;


            case "divide_reward":
                $users = $counsel->answers()->select('user_id')->distinct()->get();
                foreach ($users as $in) {
                    $inv = User::find($in->user_id);
                    $bill = Bill::create([
                        'transactionId' => "0000",
                        'amount' =>  $counsel->price / $users->count(),
                        'user_id' => $inv->id,
                        'advertise_id' => null,
                        'deposit_id' => null,
                        'counsel_id' => $counsel->id,
                        'type' => "counsel_share",
                        'status' => 'bill_payed',
                    ]);

                    $inv->update(['balance' => $inv->balance += $bill->amount]);
                }
                $counsel->update(["status" => "finish"]);
                break;


            case "no_reward":
                $counsel->update(["status" => "finish"]);
                break;
        }
        alert()->success(' خرد جمعی با موفقیت به پایان رسید  ');
        return back();
    }
    public function panel_new_question(Request $request, Counsel $counsel)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $data = $request->validate([
                "question" => "required",
                "options" => "nullable",
            ]);
            $data['type'] = 'multi';
            if (!isset($data['options'])) {
                $data['type'] = 'ex';
            }
            $i = 1;
            foreach ($data['options'] ?? [] as $ke => $val) {
                $data["a" . $i] = $val;
                $i++;
            }

            $counselquestion = $counsel->counselquestions()->create($data);
            alert()->success('سوال با موفقیت اضافه شد ');
            return redirect()->route('panel.new.question', $counsel->id);
        }

        return view('home.panel.panel_new_question', compact(['user', 'counsel']));
    }
    public function show_counsel(Request $request, Counsel $counsel)
    {
        $counsel->update(['show' => Carbon::now()]);
        alert()->success('خرد جمعی با موفقیت فعال شد ');
        return back();
    }
    public function destroy_counsel(Request $request, Counsel $counsel)
    {
        $counsel->delete();
        alert()->success('خرد جمعی با موفقیت حذف شد ');
        return back();
    }
    public function counsel_answers(Request $request, Counsel $counsel)
    {
        $user = auth()->user();
        return view('home.panel.counsel_answers', compact(['user', 'counsel']));
    }
    public function counsel_perview(Request $request, Counsel $counsel)
    {
        $user = auth()->user();
        return view('home.panel.counsel_perview', compact(['user', 'counsel']));
    }
    public function new_counsel1(Request $request, Counsel $counsel)
    {
        $user = auth()->user();
        $advertise = Advertise::find($request->advertise_id);
        $url = null;
        if ($advertise) {
            $url = route('single.ad', $advertise->id);
        }
        if ($request->isMethod('post')) {

            $user = auth()->user();
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:256',
                'info' => 'required|max:1000',
                'img' => 'max:1024|dimensions::min_width=1500,min_height=300',

                'gender' => 'nullable',
                'star' => 'nullable',
                'tags' => 'required',

                'skills' => 'required|array|min:1',
                'degree' => 'required',
                'answers' => 'required',
                'reward' => 'required',
                'url' => 'nullable',
                'price' => 'required_unless:reward,no_reward',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $data = $validator->safe()->all();
            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $rand = rand(10, 100);
                $name_img = 'img_' . $user->id  . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('/media/counsel/'), $name_img);
                $data['img'] = $name_img;
            }

            $data['status'] = "created";
            $counsel = $user->counsels()->create($data);
            $counsel->skills()->attach($data['skills']);

            foreach ($data['tags']  as $ke => $val) {
                $tag = Tag::whereTag($val)->first();
                if (!$tag) {
                    $tag = Tag::create(['tag' => $val]);
                }
                $counsel->tags()->attach($tag->id);
            }
            $type = $counsel->reward == "no_reward" ? 0 : 1;
            return response()->json([
                'status' => "ok",
                'type' => $type,
                'counsel_id' => $counsel->id,
                'amount' => $counsel->price,
                'all' => $request->all(),

            ]);
        }
        return view('home.panel.new_counsel1', compact(['user', 'counsel', 'url']));
    }
    public function new_counsel2(Request $request, Counsel $counsel)
    {
        $user = auth()->user();
        return view('home.panel.new_counsel2', compact(['user', 'counsel']));
    }
    public function new_counsel3(Request $request, Counsel $counsel)
    {

        $user = auth()->user();

        if ($request->isMethod('post')) {
            $data = $request->validate([
                "question" => "required",
                "options" => "nullable",
            ]);
            $data['type'] = 'multi';
            if (!isset($data['options'])) {
                $data['type'] = 'ex';
            }
            $i = 1;
            foreach ($data['options'] ?? [] as $ke => $val) {
                $data["a" . $i] = $val;
                $i++;
            }

            $counselquestion = $counsel->counselquestions()->create($data);
            alert()->success('سوال با موفقیت اضافه شد ');
            return redirect()->route('panel.new.counsel3', $counsel->id);
        }
        return view('home.panel.new_counsel3', compact(['user', 'counsel']));
    }


    public function edit_counsel(Request $request, Counsel $counsel)
    {
        $user = auth()->user();

        $counsels = $user->counsels()->latest()->get();
        if ($request->isMethod('post')) {
            $user = auth()->user();
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:256',
                'gender' => 'required',
                'star' => 'nullable',
                'skills' => 'required',
                'degree' => 'required',
                'answers' => 'required',
                'url' => 'nullable',
                // 'reward' => 'required',
                'tags' => 'required',
                // 'price' => 'required_unless:reward,no_reward',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $data = $validator->safe()->all();
            $data['confirm'] = null;
            $counsel->update($data);
            $counsel->tags()->sync([]);
            foreach ($data['tags']  as $ke => $val) {
                $tag = Tag::whereTag($val)->first();
                if (!$tag) {
                    $tag = Tag::create(['tag' => $val]);
                }
                $counsel->tags()->attach($tag->id);
            }
            $counsel->skills()->sync(   $data['skills']);

            return response()->json([
                'status' => "ok",
                'data' => $data,
                'all' => $request->all(),

            ]);
        }
        return view('home.panel.edit_counsel', compact(['user', 'counsel']));
    }
    public function counsel(Request $request)
    {
        $user = auth()->user();
        $user->counsels()->where('reward', '!=', 'no_reward')->wherePay(0)->delete();

        $counsels = $user->counsels()->latest()->get();

        return view('home.panel.counsel', compact(['user', 'counsels']));
    }
    public function accept_deposit(Request $request, Deposit $deposit)
    {
        $user = auth()->user();
        if ($user->id != $deposit->advertise->user->id) {
            alert()->warning('این بیعانه مربوط به شما نیست ');
            return back();
        }

        if ($deposit->status != 'payed') {
            alert()->warning('این عمل در حال حاضر ممکن نیست  ');
            return  back();
        }
        if ($deposit->advertise->status != 'confirmed') {
            alert()->warning('این آگیهی از حالت بیعانه خارج شده است ');
            return  back();
        }
        if ($request->accept) {
            $now = Carbon::now();
            // $now->addHours(400);

            // $deposit->advertise()->update([
            //     'status'=>"deposit_delay"
            // ]);
            // $user->bills()->create([
            //     'amount' => $deposit->amount,
            //     'type' => "accept_deposit",
            //     'status' => "bill_payed",
            //     'transactionId' => "200",
            // ]);
            // $user->update(['balance' => $user->balanece + $deposit->amount]);
            $deposit->advertise->update(['status' => "deposit_delay"]);
            $deposit->update(['status' => 'confirmed_deposit', 'accept' => Carbon::now(), "reflux" => $now->addHours($deposit->deposit_day)]);
            alert()->alert('بیعانه با موفقیت تایید  شد   ');
        }

        if ($request->reject) {
            $deposit->user->bills()->create([
                'amount' => $deposit->amount,
                'type' => "reject_deposit",
                'status' => "bill_payed",
                'transactionId' => "200",
            ]);
            $deposit->user->update(['balance' => $deposit->user->balanece + $deposit->amount]);
            $deposit->update(['status' => 'reject_deposit', 'accept' => Carbon::now()]);
            alert()->alert('بیعانه با موفقیت رد   شد   ');
        }
        return  back();
    }
    public function cancel_deposit(Request $request, Deposit $deposit)
    {

        $reflux = Carbon::parse($deposit->reflux);
        $accept = Carbon::parse($deposit->accept);
        $now = Carbon::now();
        if ($now > $reflux) {
            alert()->warning("از زمان لغو گدشته است");
            return back();
        }

        $user = auth()->user();
        if ($user->id != $deposit->user->id) {
            alert()->warning('این بیعانه مربوط به شما نیست ');
            return back();
        }

        if ($deposit->status != 'confirmed_deposit') {
            alert()->warning('این عمل در حال حاضر ممکن نیست  ');
            return  back();
        }

        $user->bills()->create([
            'amount' => $deposit->amount,
            'type' => "cancel_deposit",
            'status' => "bill_payed",
            'transactionId' => "100",
        ]);
        $user->update(['balance' => $user->balanece + $deposit->amount]);
        $deposit->update(['status' => 'cancelled']);
        $deposit->advertise(['status' => 'confirmed']);
        alert()->alert('بیعانه با موفقیت لغو شد   ');
        return  back();
    }
    public function deposit(Request $request)
    {
        $user = auth()->user();
        $indeposits = Deposit::whereIn('advertise_id', $user->advertises()->pluck('id')->toArray())->latest()->get();
        return view('home.panel.deposit', compact(['user', 'indeposits']));
    }
    public function assist(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {


            $user = auth()->user();
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'duration' => 'required',
                'salary' => 'required',
                'info' => 'required',
                'contact' => 'required',
                'to_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $data = $validator->safe()->all();
            $user->assistes()->create($data);
            return response()->json([
                'status' => "ok",
            ]);
        }
        $to_assists = Assist::where('to_id', $user->id)->latest()->get();
        $my_assists = $user->assistes()->latest()->get();
        foreach ($to_assists as $to_assist) {
            $to_assist->update(['seen' => 1]);
        }

        return view('home.panel.assist', compact(['user', 'to_assists', 'my_assists']));
    }
    public function account(Request $request)
    {
        $provinces = Province::all();
        $month = [
            'فروردین',
            'اردیبهشت',
            'خرداد',
            'تیر',
            'مرداد',
            'شهریور',
            'مهر',
            'آبان',
            'آذر',
            'دی',
            'بهمن',
            'اسفند',
        ];
        $user = auth()->user();

        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => 'required|max:255',
                'family' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'city_id' => 'required',
                'password' => 'required|min:4',
                'gender' => 'required',
                'year' => 'required',
                'month' => 'required',
                'day' => 'required',
                'degree' => 'nullable',
                'experts' => 'nullable',
                'info' => 'nullable',
                'province_id' => 'nullable',
                'youtube' => 'nullable',
                'instagram' => 'nullable',
                'linkedin' => 'nullable',
                'facebook' => 'nullable',
                'visit' => 'nullable',
            ]);
            // dump($data);
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $rand = rand(10, 100);
                $name_img = 'avatar_' . $user->id  . '.' . $avatar->getClientOriginalExtension();
                $avatar->move(public_path('/media/avatar/'), $name_img);
                $path = public_path('/media/avatar/' . $name_img);
                if (file_exists($path)) {
                    Image::make($path)->fit(600, 600)->save(public_path('/media/avatar/' . $name_img));
                }
                $data['avatar'] = $name_img;
            }

            $city = City::find($data['city_id']);
            $data['province_id'] = $city->province->id;
            // dd(  $data);

            // $month = array_search($data['month'], $month) + 1;
            // dump( $data['month']);
            // dump( $month);
            $geo = CalendarUtils::toGregorian($data['year'], $data['month'], $data['day']);
            // dd( $geo );
            $data['b_date'] = $geo[0] . '-' . $geo[1] . '-' . $geo[2] . ' 00:00:00';
            // dd(  $data['b_date'] );
            $user->experts()->delete();
            $user->update($data);
            // dd($data);
            if (isset($data['experts'])) {
                foreach ($data['experts'] as $ex => $val) {
                    $user->experts()->create([
                        'name' => $val,
                    ]);
                }
            }

            alert()->success('اطلاعات با موفقیت به روز شد ');
            return redirect()->route('panel.account');
        }
        return view('home.panel.resumes', compact(['user', 'month', "provinces"]));
    }


    public function transactions()
    {
        $user = auth()->user();
        $transactions = $user->transactions;
        return view('home.panel.transactions', compact(['user', 'transactions']));
    }


    public function edit_advertise(Advertise $advertise)
    {
        // dd($advertise->show_option("condition"));
// dd( $advertise->title);

        $user=auth()->user();
        if($user->id!=$advertise->user_id){
            alert()->warning("این آگهی  برای شما نمی باشد ");
            return back();
        }
        $type="subset";
        $id=$advertise->subset_id;
        if($advertise->telic_id){
            $type="telic";
            $id=$advertise->telic_id;
        }


        return view('home.panel.edit_advertise', compact(['user', 'advertise',"type","id"]));


    }
    public function chat()
    {
        // $chat = Chat::find(234);

        $user = auth()->user();
        // $chats=Chat::whereType('direct')->where('user_id',$user->id)->orWhere('to_id',$user->id)->latest()->get();
        // dd( $chats);

        $all_chats = Chat::where('type', "advertise")->where(function ($query) use ($user) {
            $query->where('user_id', $user->id)->orWhere('to_id', $user->id);
        })
            ->select('advertise_id', "uni")->distinct()->get();
        $direct_chats = Chat::where('type', "direct")->where(function ($query) use ($user) {
            $query->where('user_id', $user->id)->orWhere('to_id', $user->id);
        })->latest()
        // ->select('to_id',"user_id")
        // ->select('to_id',"user_id")->distinct()
        ->get()->unique('uni');
        return view('home.panel.chat', compact(['user', 'all_chats', 'direct_chats']));
    }



    public function support()
    {
        $user = auth()->user();
        return view('home.panel.support', compact(['user']));
    }
    public function resumes()
    {
        $user = auth()->user();
        $month = [
            'فروردین',
            'اردیبهشت',
            'خرداد',
            'تیر',
            'مرداد',
            'شهریور',
            'مهر',
            'آبان',
            'آذر',
            'دی',
            'بهمن',
            'اسفند',
        ];
        return view('home.panel.resumes', compact(['user', "month"]));
    }


    public function baladchi()
    {
        $user = auth()->user();
        return view('home.panel.baladchi.baladchi', compact(['user']));
    }



    public function baladchi_form1(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            return redirect()->route('baladchi.form2');
        }
        return view('home.panel.baladchi.baladchi_form1', compact(['user']));
    }


    public function baladchi_form2(Request $request)
    {
        $user = auth()->user();

        if ($request->isMethod('post')) {
            $data = $request->validate([
                // 'shaba'=>"required|regex:/^(?:IR)(?=.{24}$)[0-9]*$/",
                'shaba' => "required|regex:/^(?=.{24}$)[0-9]*$/",
                'melli_code' => "required|regex:/^[0-9]{10}$/",

            ]);
            $user->update($data);
            return redirect()->route('baladchi.form3');
        }
        return view('home.panel.baladchi.baladchi_form2', compact(['user']));
    }




    public function insert_new_memo(Request $request ,Advertise $advertise)
    {
        $user=auth()->user();
        $count=$user->user_memos()->where('advertise_id',$advertise->id)->count();
        if( !$advertise->notif  ){
            $code=2;
            return response()->json(
                [
                    'status'=>"ok",
                    'code'=>$code,
                    'count'=>$count,
                ]
            );
        }
        if($count >=3 ){
            $code=0;
        }else{
            if (    $request->memo && $advertise->faves_users()->count() > 0) {
                // $memo = $user->user_memos()->create([
                //     'memo' => $request->memo,
                //     'advertise_id' => $advertise->id,
                //     'active' => 1,
                // ]);
                // foreach ($advertise->faves_users as $faver) {
                //     $faver->memos()->attach([$memo->id]);
                // }

                $user->send_memo_advertise($advertise,$request->memo);
            }
            $code=1;
        }
        return response()->json(
            [
                'status'=>"ok",
                'code'=>$code,
                'count'=>$count,
            ]
        );
    }

    public function baladchi_form3(Request $request)
    {
        $user = auth()->user();

        if ($request->isMethod('post')) {
            $data = $request->validate([
                'salary' => 'required',
                'skills' => 'required|array|min:1',
                'catlist' => 'required|array|min:1',

            ]);
            $user->subsets()->detach();
            $user->telics()->detach();
            foreach ($data['catlist'] as $key => $val) {
                $ar = explode("|", $val);
                if ($ar[1] == 'subset') {
                    $check_exist = $user->subsets()->where('id', $ar[0])->exists();
                    if (!$check_exist) {
                        $user->subsets()->attach($ar[0]);
                    }
                }
                if ($ar[1] == 'telic') {
                    $check_exist = $user->telics()->where('id', $ar[0])->exists();
                    if (!$check_exist) {
                        $user->telics()->attach($ar[0]);
                    }
                }
            }
            $user->skills()->sync($data['skills']);
            // dd($data['catlist']);
            if (!$user->baladchi) {
                $user->update(['baladchi' => Carbon::now()]);
            }
            $user->update(['salary'=>$data['salary']]);
            alert()->success('اطلاعات با موفقیت   ثبت شد ');
            return redirect()->route('panel.baladchi');
        }
        return view('home.panel.baladchi.baladchi_form3', compact(['user']));
    }
























    public function insert_new_donate(Request $request)
    {

        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'to_id' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $data = $validator->safe()->all();
        if ($user->balance < $data['amount']) {
            return response()->json([
                '' => 'موجودی شما برای این مقدار کافی نمی باشد ',
                'res' => '1'
            ]);
        }
        if ($data['amount'] % 1000 != 0) {
            return response()->json(['' => 'مقدار کمک  مالی باید مضربی از  هزار باشد']);
        }

        $to_user = User::find($data['to_id']);

        $bill = $user->bills()->create([
            'type' => 'withdraw',
            'transactionId' => '000',
            'status' => 'bill_payed',
            'amount' =>  $data['amount'],
        ]);
        $user->update(['balance' => $user->balance - $data['amount']]);
        $to_user->update(['balance' => $to_user->balance + -$data['amount']]);
        $bill = $to_user->bills()->create([
            'type' => 'donate',
            'transactionId' => '000',
            'status' => 'bill_payed',
            'rep_id' => $bill->id,
            'amount' =>  $data['amount'],
        ]);
        return response()->json([
            'status' => "ok",


        ]);
    }
    public function remove_note(Request $request, Note $note)
    {
        $note->delete();
        alert()->success('یادداشت با موفقیت حذف شد ');
        return back();
    }
    public function change_head(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $name_img = 'cover_' . $user->id  . '.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('/media/cover/'), $name_img);

            $data['cover'] = $name_img;
        }

        $user->update(['cover' => $data['cover']]);
        alert()->success('کاور با موفقیت به روز رسانی شد ');
        return redirect()->route('panel.resume');
    }
    public function send_direct(Request $request, User $user)
    {
        $user = auth()->user();
        if ($request->first) {
            $check2= Chat::where( "uni", $user->id."_". $request->to_id)->first();
            $check1= Chat::where( "uni", $request->to_id. "_" .$user->id)->first();
            if($check1 ){
                $uni=$check1->uni;
            }elseif($check2){
                $uni=$check2->uni;
            }else{
                $uni =  $request->to_id ."_".$user->id;
            }

        } else {
            $uni = $request->uni;
        }



        $chat = Chat::create([
            'advertise_id' => null,
            'chat' => $request->chat,
            'type' => "direct",
            'user_id' => $user->id,
            'sender' => $user->id,
            'to_id' => $request->to_id,
            'uni' => $uni,
        ]);
        DirectMessage::dispatch($chat);
        return response()->json([
            'all' => $request->all(),
            'uni' => $uni,
        ]);
    }
    public function check_seen(Request $request)
    {
        $id=$request->id;
        $user=auth()->user();
        Chat::find($id)->update(['seen'=>1]);
         SeenMessage::dispatch($id,$user);
        return response()->json([
            'all' => $request->all(),
        ]);


    }
    public function send_chat(Request $request, Advertise $advertise)
    {
        $user = auth()->user();
        $sender = "visitor";
        $to_id = null;
        if ($advertise->user->id == $user->id) {
            $sender = "host";
        }
        if ($request->first) {
            // $uni =  $advertise->user->id . "_" . $user->id . "_" . $advertise->id;
            $uni =  $advertise->user->id . $user->id . $advertise->id;
            $to_id = $advertise->user_id;
        } else {
            $uni = $request->uni;
            $first = Chat::where("uni", $uni)->first();
            $to_id = $first->to_id; //دریافت کننده صاحباگهی
            if ($advertise->user->id == $user->id) {
                $to_id = $first->user_id;
            }
        }

        $chat = Chat::create([
            'advertise_id' => $advertise->id,
            'visitor_id' => $request->visitor_id,
            'chat' => $request->chat,
            'type' => "advertise",
            'user_id' => $user->id,
            'to_id' => $to_id,
            'sender' => $sender,
            'uni' => $uni,
        ]);
        NewMessage::dispatch($chat);
        return response()->json([
            'status' => 1,
        ]);
    }
    public function seen_message(Request $request, Advertise $advertise)
    {
        $user = auth()->user();
        $sender = User::find($request->user);
        $visitor = User::find($request->visitor);
        $type = "visitor";
        if ($advertise->user->id == $user->id) {
            $type = "host";
        }
        $advertise->chats()->whereSender($type)->update(['seen' => 1]);
    }


    public function get_direct(Request $request)
    {
        // return response()->json([
        //     'sss'=> $request->all()
        // ]);
        $user = auth()->user();
        $to = User::find($request->to);

            $uni=$request->uni;


        Chat::where("to_id",$user->id )->where("uni",$uni)->update(['seen' => 1]);

        $chats = Chat::whereType('direct')->where("uni",$uni)->oldest()->get();
        // return response()->json([
        //     'sall'=> $request->all()
        // ]);
        return response()->json([
            'body' => view('home.panel.get_direct', compact(['user', 'chats', 'to',"uni"]))->render(),
            'sall' => $request->all()
        ]);
    }




    public function get_chat(Request $request)
    {
        $user = auth()->user();
        $uni = $request->uni;
        $first=Chat::where('uni', $uni)->first();
        $advertise = $first->advertise;
       if($user->id ==  $first->to_id){
        $avatar= $advertise->user->avatar();
       }else{
        $avatar=User::find($first->user_id)->avatar();
       }
        // $sender = User::find($request->user);
        // $visitor = User::find($request->visitor);
        // $type = "visitor";
        // if ($advertise->user->id == $user->id) {
        //     $type = "host";
        // }
        $advertise->chats()->where("uni", $uni)->where("to_id",$user->id )->update(['seen' => 1]);

        // $chats = $advertise->chats()->whereSender($type)
        //     ->where('user_id', $sender->id)
        //     ->where('visitor_id', $visitor->id)
        //     ->latest()->get();
        $chats = $advertise->chats()->where("uni", $uni)
            ->latest()->get();
        return response()->json([
            'body' => view('home.panel.get_chat', compact(['advertise', 'user' , "uni","avatar"]))->render(),
            'sall' => $request->all()
        ]);
    }
    public function insert_note(Request $request, Advertise $advertise)
    {
        $user = auth()->user();

        $note = $user->notes()->where('advertise_id', $advertise->id)->first();
        $data = ['info' => $request->info, 'advertise_id' => $advertise->id];
        if ($note) {
            $note->update($data);
        } else {
            $user->notes()->create($data);
        }
        return response()->json([
            'all' => $request->all(),
            'note' =>$note,
            'advertise' =>$advertise
        ]);
    }
    public function insert_report(Request $request)
    {
        $user = auth()->user();
        if ($request->mode == 'advertise') {
            $advertise = Advertise::find($request->advertise_id);
            $report = $user->reports()->where('advertise_id', $advertise->id)->first();

            $data = $request->all();
            $data['to_id'] = $advertise->user_id;
            if ($report) {
                $report->update([
                    'scam' => null,
                    'content' => null,
                    'other' => null,
                    'problem' => null,
                ]);
                $report->update($data);
            } else {
                $user->reports()->create($data);
            }
        }
        if ($request->mode == 'deposit') {
            $deposit = Deposit::find($request->deposit_id);
            $report = $user->reports()->where('deposit_id', $deposit->id)->first();
            $data = $request->all();
            $data['to_id'] = $deposit->user_id;
            if ($report) {
                $report->update([
                    'scam' => null,
                    'content' => null,
                    'other' => null,
                    'problem' => null,
                ]);
                $report->update($data);
            } else {
                $user->reports()->create($data);
            }
        }


        if ($request->mode == 'baladchi') {
            $baladchi = User::find($request->user_id);
            $report = $user->reports()->where('user_id', $user->id)->first();
            $data = $request->all();
            $data['to_id'] = $baladchi->id;
            if ($report) {
                $report->update([
                    'scam' => null,
                    'content' => null,
                    'other' => null,
                    'problem' => null,
                ]);
                $report->update($data);
            } else {
                $user->reports()->create($data);
            }
        }
        return response()->json([
            'all' => $request->all(),
        ]);
    }



    public function ad_logs(Advertise $advertise)
    {
        $user = auth()->user();
        if ($advertise->user->id != $user->id) {
            alert()->warning('دسترسی به این آگهی امکان پذیر نیست ');
            return redirect()->route('panel.advertises');
        }
        $d2 = Jalalian::forge(Carbon::now()->subDays(2))->format('Y-m-d');
        $d3 = Jalalian::forge(Carbon::now()->subDays(3))->format('Y-m-d');
        $d4 = Jalalian::forge(Carbon::now()->subDays(4))->format('Y-m-d');
        $d5 = Jalalian::forge(Carbon::now()->subDays(5))->format('Y-m-d');
        $d6 = Jalalian::forge(Carbon::now()->subDays(6))->format('Y-m-d');
        // dd(Carbon::now());
        // dd(Carbon::today()->subDays(0)->endOfDay());
        $amar[] = $advertise->seen_user()->wherePivot('date', '>=', Carbon::today()->subDays(1)->startOfDay())->wherePivot('date', '<', Carbon::today()->subDays(1)->endOfDay())->count();
        $amar[] = $advertise->seen_user()->wherePivot('date', '>=', Carbon::today()->subDays(1)->startOfDay())->wherePivot('date', '<', Carbon::today()->subDays(1)->endOfDay())->count();
        $amar[] = $advertise->seen_user()->wherePivot('date', '>=', Carbon::today()->subDays(2)->startOfDay())->wherePivot('date', '<', Carbon::today()->subDays(2)->endOfDay())->count();
        $amar[] = $advertise->seen_user()->wherePivot('date', '>=', Carbon::today()->subDays(3)->startOfDay())->wherePivot('date', '<', Carbon::today()->subDays(3)->endOfDay())->count();
        $amar[] = $advertise->seen_user()->wherePivot('date', '>=', Carbon::today()->subDays(4)->startOfDay())->wherePivot('date', '<', Carbon::today()->subDays(4)->endOfDay())->count();
        $amar[] = $advertise->seen_user()->wherePivot('date', '>=', Carbon::today()->subDays(5)->startOfDay())->wherePivot('date', '<', Carbon::today()->subDays(5)->endOfDay())->count();
        $amar[] = $advertise->seen_user()->wherePivot('date', '>=', Carbon::today()->subDays(6)->startOfDay())->wherePivot('date', '<', Carbon::today()->subDays(6)->endOfDay())->count();
        $days = [$d6, $d5, $d4, $d3, $d2, 'دیروز', 'امروز'];
        return view('home.ads.ad_logs', compact(['advertise', 'user', 'days', 'amar']));
    }
    public function delete_advertise(Advertise $advertise)
    {
        $user = auth()->user();
        if ($advertise->user->id !== $user->id) {
            alert()->warning('این آگهی مربوط یه شما نیست ');
        }
        if ($advertise->active == 0) {
            alert()->warning('        این آگهی قبلا حذف شده است');
        } else {
            alert()->success('        این آگهی    با موفقیت  حذف شد  ');
        }
        $advertise->update([
            'active' => 0
        ]);

        return redirect()->route('panel.advertises');

        return view('home.panel.support', compact(['user']));
    }



    public function active_counsel(Request $request, Counsel $counsel)
    {
        $user = auth()->user();
        if ($counsel->active) {
            alert()->warning('این خرد جمعی قبلا فعال شده ');
        } else {

            if ($counsel->counselquestions()->count() == 0) {

                alert()->warning(' ابتدا سوالات را برای این خرد جمعی تعریف کنید  ');
            } else {
                alert()->success('خرد جمعی با موفقیت  شد  ');
                $counsel->update(['active' => '1', 'status' => 'ready_to_show']);
            }
        }
        return redirect()->route('panel.counsel');
    }
    public function counselquestion_destrory(Request $request, Counselquestion $counselquestion)
    {
        $user = auth()->user();
        if ($counselquestion->counsel->user->id != $user->id) {
            alert()->warning('این سوال برای شما نیست ');
        }
        $counselquestion->delete();
        alert()->success('سوال با موفقیت حذف شد ');
        return back();
    }
    public function credit_check()
    {

        $user = auth()->user();
        if ($user->balance == 0 || $user->balance % 1000 != 0) {
            alert()->warning('مقدار موجودی شما باید مضربی از 10 هزار باشد ');
            return redirect()->route('panel.wallet');
        }
        $user->bills()->create([
            'transactionId' => null,
            'amount' => $user->balance,
            'type' => 'credit_check',
            'status' => 'created',
        ]);
        $user->update(['balance' => 0]);
        alert()->success('     درخواست شما با موفقیت ثبت شد و بعد از تایید به حساب شما واریز خواهد شد ');
        return redirect()->route('panel.wallet');
    }
}
