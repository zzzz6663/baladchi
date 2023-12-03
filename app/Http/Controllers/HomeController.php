<?php

namespace App\Http\Controllers;

use SoapClient;
use App\Models\Cp;
use Carbon\Carbon;
use App\Models\Chat;
use App\Models\City;
use App\Models\User;
use App\Models\Brand;
use App\Models\Telic;
use App\Models\Answer;
use App\Models\Subset;
use App\Models\Travel;
use App\Events\NewTest;
use App\Models\Comment;
use App\Models\Counsel;
use App\Models\Category;
use App\Models\Province;
use App\Mail\MessageMail;
use App\Models\Adventure;
use App\Models\Advertise;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Events\DirectMessage;
use App\Models\Counselquestion;
use Morilog\Jalali\CalendarUtils;
use App\Notifications\SendKaveCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;



class HomeController extends Controller
{
    public  function  make_dir(Request $request)
    {
        $ret=$request->dir;
        $path=public_path("/media/".$ret);

       $res= File::makeDirectory($path, 0777, true, true);
       return  $res;
    }
    public  function  clear()
    {
        Artisan::call('optimize');

        $user = auth()->user();;

        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        Artisan::call('config:clear');


        // $chat=Chat::find(553);
        // NewMessage::dispatch($chat);
        // Auth::loginUsingId(1,true);
        // $deposit_delay_advertises = Advertise::whereStatus("deposit_delay")->get();
        // foreach ($deposit_delay_advertises as $ad) {
        //     foreach ($ad->deposits as $depo) {
        //         $reflux = Carbon::parse($depo->reflux);
        //         $accept = Carbon::parse($depo->accept);
        //         $now = Carbon::now();
        //         if ($now < $reflux) {
        //             if ($depo->status == "payed") {
        //                 $depo_user = $depo->user;
        //                 $depo_user->bills()->create([
        //                     'amount' => $depo->amount,
        //                     'type' => "cancel_deposit",
        //                     'status' => "bill_payed",
        //                     'transactionId' => "100",
        //                 ]);
        //                 $depo_user->update(['balance' => $depo_user->balanece + (int)$depo->amount]);
        //             }
        //             if ($depo->status == "confirmed_deposit") {
        //                 $depo->advertise->update([
        //                     'status' => "deposit_finish"
        //                 ]);
        //                 $ad->user->bills()->create([
        //                     'amount' => $depo->amount,
        //                     'type' => "accept_deposit",
        //                     'status' => "bill_payed",
        //                     'transactionId' => "200",
        //                 ]);
        //                 $ad->user->update(['balance' => $ad->user->balanece + (int) $depo->amount]);
        //                 $depo->update(['status' => 'deposit_finish']);
        //             }
        //         }
        //     }
        // }
        return 'cleard';
    }


    public function check_fave_user(Request $request, User $user)
    {
        $user = auth()->user();

        //
        return response()->json([
            'status' => $status,
        ]);
    }

    public  function  go_to(Request $request)
    {
        if (str_contains($request->url, "htt")) {
            return redirect()->away($request->url);
        }
        return redirect()->away("http://" . $request->url);
    }
    public  function  logout()
    {
        alert()->success('خروج با موفقیت انجام شد ');
        Auth::logout();
        return redirect()->route('login');
    }
    public function reload_captcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function baladchiha(Request $request)
    {
        $ad = null;
        $baladchies = User::query();
        $city_id = null;
        $region_id = null;
        if ($request->authenticated) {
            $baladchies->where('authenticated', '!=', null);
        }
        if ($request->gender) {
            $baladchies->where('gender', $request->gender);
        }
        if ($request->report) {
            $baladchies->whereDoesntHave('to_reports', function ($query) {
            });
        }
        if ($request->advertise_id) {
            $advertise = Advertise::find($request->advertise_id);
            if ($advertise) {
                $city_id = $advertise->city_id;
                $region_id = $advertise->region_id;
            }
            if ($city_id) {
                $baladchies->where('city_id', $city_id);
            }
            if ($region_id) {
                $baladchies->where('region_id', $region_id);
            }
            $baladchies->where('show_visitor', 1);

        }else{
            $baladchies->where('baladchi', '!=', null);
        }
        if ($request->city_id) {
            $baladchies->where('city_id', $request->city_id);
        }
        if ($request->skill_id) {
            $skill=$request->skill_id;
          $baladchies->whereHas("skills", function ($query) use ($skill) {
                $query->where("id",(int) $skill);
            });
        }

        if ($request->related_baladchi) {
            $ad = Advertise::find($request->related_baladchi);

            if ($ad->telic_id) {
                $baladchies->whereHas("telics", function ($query) use ($ad) {
                    $query->where("id", $ad->telic_id);
                });
            } else {
                $baladchies->whereHas("subsets", function ($query) use ($ad) {
                    $query->where("id", $ad->subset_id);
                });
            }
        }

        $baladchies = $baladchies->whereRole('user')->latest()->paginate(12);
        return view('home.baladchiha', compact(['baladchies', "ad"]));
    }
    public function counsels(Request $request)
    {
        $counsels = Counsel::query();
        $user = auth()->user();
        $skills = [];
        if ($request->reward) {
            $counsels->where('reward', $request->reward);
        }
        if ($request->gender) {
            $counsels->where('gender', $request->gender);
        }
        if ($request->degree) {
            $counsels->where('degree', $request->degree);
        }

        if ($user) {
            $skills =    $user->skills()->pluck('id')->toArray();
        }

        // $counsels = $counsels->whereStatus('show')->whereIn("skill_id", $skills)->latest()->paginate(10);
        $counsels = $counsels->whereStatus('show')->whereHas("skills", function ($query) use ($skills) {
            $query->whereIn("id", $skills);
        })->latest()->paginate(10);
        return view('home.counsels', compact(['counsels', 'user']));
    }

    public function get_cat(Request $request)
    {
        $category = null;
        $subset = null;
        switch ($request->type) {
            case "subset":
                $category = Subset::find($request->id)->category->id;
                break;
            case "telic":
                $telic = Telic::find($request->id);
                $subset = $telic->subset->id;
                $category = $telic->subset->category->id;
                break;
        }
        return response()->json([
            'all' => $request->all(),
            'category' => $category,
            'subset' => $subset,
        ]);
    }
    public function get_city_list(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $cities_all = $user->all_cities()->pluck("id")->toArray();
        } else {
            $cities_all =  session()->get("cities", []);
        }
        $search = $request->val;
        $cities = City::where('name', 'LIKE', "%{$search}%")->get();
        return response()->json([
            'body' => view('home.parts.get_city_list', compact(['cities', 'cities_all']))->render(),
        ]);
    }
    public function get_province_list(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $cities_all = $user->all_cities()->pluck("id")->toArray();
        } else {
            $cities_all =  session()->get("cities", []);
        }
        return response()->json([
            'body' => view('home.parts.get_province_list', compact(['cities_all']))->render(),
        ]);
    }
    public function get_city(Province $province)
    {
        return response()->json([
            'body' => view('home.parts.get_city', compact('province'))->render(),
        ]);
    }
    public function get_region(City $city, Request $request)
    {
        return response()->json([
            'body' => view('home.parts.get_region', compact('city'))->render(),
            'count' => $city->regions()->count(),
            'all' => $request->all()
        ]);
    }
    public function index()
    {



        // $chat=Chat::find(216);
        // NewTest::dispatch($chat);
        // event(new NewTest("sssssssfffff"));
        // dd(3);

        //         $mobile= session()->get('mobile',0);
        //         dd( $mobile);
        //         $invitedUser = new User;
        //         $invitedUser->notify(new SendKaveCode( $mobile, 'login', 8080, '', '', '', ''));
        // dd(3);
        // $chat=Chat::find(22);
        // NewMessage::dispatch($chat);
        // NewMessage::dispatch();
        //request parameters array
        $requestParams = array(
            'username' => 'roosha',
            'Password' => 'Rr38904',
            'DomainName' => 'roosha',
            'Smsbody' => 'سلام',
            'SenderNumber' => '',
            'Id' => '20',
            'nCMessage' => '1',
            'nTypeSent' => '2',
            'nSpeedsms' => '0',
            'nPeriodmin' => '0',
            'cstarttime' => '',
            'cEndTime' => '',
            'Mobiles' => ['09373699317'],
        );
        $requestParams = array(
            'cUserName' => 'roosha',
            'cPassword' => 'Rr38904',
            'cDomainname' => 'roosha',
            'cBody' => 'سلام',
            'SenderNumber' => '',
            'cGetid' => '20',
            'nCMessage' => '1',
            'nTypeSent' => '2',
            'nSpeedsms' => '0',
            'nPeriodmin' => '0',
            'cstarttime' => '',
            'cEndTime' => '',
            'm_SchedulDate' => '',
            'cSmsnumber' => "09373699317",
        );

        // create a connection to the local host mono .NET pull back the wsdl to get the functions names
        // and also the parameters and return values
        //   $client = new SoapClient("http://mehrafraz.com/webservice/Service.asmx?wsdl");

        // $res=$client->SendSms($requestParams);
        // dd($res);
        // print_r( $client->SendSms(array("cUserName" => "demo2", "cPassword" =>"123321", "cBody" => "تست از php  ALL IS Ok ??","cSmsnumber" => "09123869072,09123869072","cGetid" => "234565432","nCMessage" => "1","nTypeSent" => "1","m_SchedulDate" => "","cDomainname" => "demo2", "nSpeedsms" =>"0","nPeriodmin" => "0","cstarttime" => "","cEndTime" => "")));

        //print_r( $client->ShowError(array("cErrorCode" => "-2", "cLanShow" =>"FA")));

        //print_r( $client->GetuserInfo(array("cUserName" => "demo2", "cPassword" =>"123321","cDomainname" => "demo2")));

        //print_r( $client->ReceiveSms(array("cUserName" => "demo2", "cPassword" =>"123321","lReceiveAllmsg" => "0","cDomainName" => "demo2","cFromnumber" =>"30008101808100")));

        // print_r( $client->GetDeliveryWithGetid(array("cUserName" => "demo2", "cPassword" =>"123321",cGetid =>"234565432",lReturnSid => "0")));



        //echo "<p>Request :".htmlspecialchars($client->__getLastRequest()) ."</p>";

        //echo "<p>Response:".htmlspecialchars($client->__getLastResponse())."</p>";

        // //merge API url and parameters
        // $apiUrl = "https://mehrafraz.com/fullrest/api/Send"; // change this
        // foreach($requestParams as $key => $val){
        //     $apiUrl .= $key.'='.urlencode($val).'&';
        // }
        // $apiUrl = rtrim($apiUrl, "&");

        // //API call
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $apiUrl);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // curl_exec($ch);
        // curl_close($ch);
        // $cps=Cp::all();
        // $citeis=City::all();
        // $ar=[];
        // $ci=Cp::whereName("آبادان")->first();
        // foreach($citeis as $city){
        //     // dd($city->name);
        //     $ci=Cp::whereName($city->name)->first();
        //     if($ci){
        //         $city->update([
        //             'lat'=> $ci->lat,
        //             'lon'=> $ci->lon,
        //         ]);
        //         $ar[ $ci->id]=12;

        //     }
        // }
        // dd($ar);
        // $invitedUser = new User;
        // $invitedUser->notify(new SendKaveCode( '09373699317','login','2121','','','',''));

        if (cache()->has("vip_advertises")) {
            $vip_advertises = cache()->get("vip_advertises");
        } else {
            $vip =  Advertise::whereVip(1)->where('confirm', '!=', null)->whereActive('1')->latest()->take(5)->get();
            $vip_advertises = cache()->put("vip_advertises", $vip, now()->addMinutes(10));
        }

        $user_fave = [];
        $user = auth()->user();
        if ($user) {
            $user_fave = $user->faves_ads()->pluck('id')->toArray();
        }
        if (cache()->has("categories")) {
            $categories = cache()->get("categories");
        } else {
            $categories = Category::all();
            $advertises = cache()->put("categories", $categories);
        }
        $user = auth()->user();
        return view('home.index', compact(['categories', 'user', 'vip_advertises', 'user_fave']));
    }




    public function choose(Request $request)
    {
        $user = auth()->user();
        return view('home.choose', compact(['user']));
    }

    public function send_verify_code(Request $request)
    {
        //            ارسال پیامک
        $digits = 4;
        $rand = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        session()->put('mobile', $request->mobile);
        $invitedUser = new User;
        $invitedUser->notify(new SendKaveCode($request->mobile, 'login', $rand, '', '', '', ''));
        return response()->json([
            'status' => 'ok',
            'code' => $rand,
            'mobile' => $request->mobile
        ]);
    }
    public function auth_login(Request $request)
    {
        $mobile = session()->get('mobile');
        $user = User::whereMobile($mobile)->first();
        if (!$user) {

            $user = User::create(['mobile' => $mobile, 'level' => 'customer']);
            $user->assignRole('customer');
        }
        Auth::login($user, true);
        return response()->json([
            'status' => $user->complete_register,
        ]);
    }


    public function update_password(Request $request)
    {
        $user = auth()->user();
        $user->update(['password' => $request->pass]);
        return response()->json([
            'status' => 1,
            'all' => $request->all(),

        ]);
    }

    public function check_password(Request $request)
    {
        $user = User::whereMobile($request->mobile)->first();
        if ($user->password == $request->password) {
            Auth::loginUsingId($user->id, true);;
            return response()->json([
                'status' => 1,
                'all' => $request->all(),
            ]);
        }
        return response()->json([
            'status' => 0,
            'all' => $request->all(),
        ]);
    }
    public function check_code(Request $request)
    {
        $user = User::whereMobile($request->mobile)->first();
        if (session()->get('rnd', 0) == $request->code) {
            Auth::loginUsingId($user->id, true);;
        }
        return response()->json([
            'status' => session()->get('rnd', 0) == $request->code,
            'all' => $request->all(),
            'password' => $user->password ? 1 : 0,
        ]);
    }
    public function resend_code(Request $request)
    {
        $rand = rand(1000, 9999);
        session()->put('rnd', $rand);
        $mobile = session()->get('mobile', 0);
        $invitedUser = new User;
        $invitedUser->notify(new SendKaveCode($mobile, 'login', $rand, '', '', '', ''));

        // $invitedUser->notify(new SendKaveCode( $mobile,'login',$rand ,'','','',''));
        return response()->json([
            'status' => 1,
            'rand' => $rand,
            'mobile' =>   $mobile,
        ]);
    }

    public function check_user_exist(Request $request)
    {
        $user = User::whereMobile($request->mobile)->where('password', '!=', null)->first();
        if ($user) {
            session()->put('mobile', $request->mobile);
            return response()->json([
                'status' => 1
            ]);
        } else {
            $check = User::whereMobile($request->mobile)->first();
            if ($check) {
                $check->delete();
            }
            $user = User::Create(['mobile' => $request->mobile, 'role' => 'user']);
            $user->assignRole('user');
            $rand = rand(1000, 9999);
            session()->put('rnd', $rand);
            session()->put('mobile', $request->mobile);
            $invitedUser = new User;
            $invitedUser->notify(new SendKaveCode($request->mobile, 'login', $rand, '', '', '', ''));
            return response()->json([
                'status' => 0,
                // 'id' =>$user->id,
                'rand' => $rand,
            ]);
        }
    }

    public function counsel_answer(Counsel $counsel, Request $request)
    {
        $user = auth()->user();

        //  dd(  $questions->total());
        $question = Counselquestion::find($request->question);
        // dd($request->all());
        $page = 1;
        if ($request->page) {
            $page = $request->page;
        }
        $answer = Answer::where("counsel_id", $question->counsel->id)->where("user_id", $user->id)->where("question_id", $question->id)->first();
        $data = [
            'counsel_id' => $question->counsel->id,
            'user_id' =>  $user->id,
            'question_id' => $question->id,
            'type' => $question->type,
            'answer' => $request->quest,
        ];
        if (!$answer) {
            $answer = Answer::create($data);
        }
        // dd( $data);
        $answer->update($data);

        if ($request->finish) {
            return redirect()->route('single.counsel', $counsel->id);
        }

        return redirect()->route('counsel.quiz', [$counsel->id, 'page' => $page + 1]);
    }
    public function counsel_quiz(Counsel $counsel, Request $request)
    {
        $user = auth()->user();
        $questions = $counsel->Counselquestions()->paginate(1);
        // dd($questions);
        $all_question = $counsel->Counselquestions()->count();
        if ($all_question == 0) {
            alert()->warning('هنوز سوالی تعریف نشده است ');
            return back();
        }
        foreach ($questions as $qu) {
            $question = $qu;
        }
        $answer = $user->answers()->where('counsel_id', $counsel->id)->where('question_id', $question->id)->first();
        $answerd_question = $user->answers()->where("answer", "!=", null)->where('counsel_id', $counsel->id)->count();
        $persent = floor(($answerd_question * 100) / $all_question);

        return view('home.counsel_quiz', compact(['user', 'counsel', 'questions', 'persent', 'answer']));
    }
    public function single_counsel(Counsel $counsel)
    {
        $user = auth()->user();
        if ($user) {
            $user->views()->syncWithoutDetaching($counsel->id);
        }
        return view('home.single_counsel', compact(['user', 'counsel']));
    }
    public function single_user(User $user)
    {
        $old_comment = null;
        $current = auth()->user();
        if ($current) {
            $old_comment = $user->comments()->where('user_id', $current->id)->first();
        }

        $comments = $user->comments()->where('confirm', '!=', null)->latest()->get();
        $user_fave = $user->faves_ads()->pluck('id')->toArray();
        return view('home.single_user', compact(['user', 'user_fave', 'comments', "old_comment", "current"]));
    }
    public function get_phone(User $user)
    {
        return response()->json([
            'mobile' => $user->mobile,
        ]);
    }
    public function faq()
    {
        return view('home.faq', compact([]));
    }
    public function all_comment(User $user)
    {
        $comments = $user->comments()->where('confirm', '!=', null)->latest()->get();

        return view('home.all_comment', compact(['user', 'comments']));
    }

    public function support()
    {
        return view('home.support', compact([]));
    }

    public function contact()
    {

        $user = auth()->user();

        return view('home.contact', compact([]));
    }
    public function insert_star(Request $request)
    {
        $user = auth()->user();
        $reject = 1;
        $count = $user->stars()->count();
        if ($count >= 5) {
            $reject = 0;
        }
        for ($i = 0; $i < $request->count; $i++) {
            $count = $user->stars()->count();
            if ($count < 5) {
                $user->stars()->create([
                    'to_id' => $request->to_id,
                ]);
            }
        }


        return response()->json([
            'all' =>  $request->all(),
            'reject' =>   $reject,
            'count' =>   $count,
        ]);
    }
    public function share_log_submit(Request $request, Advertise $advertise)
    {
        $advertise->update(['share' => $advertise->share + 1]);
        return response()->json([
            'all' =>  $request->all(),
        ]);
    }
    public function insert_comment(Request $request)
    {

        $user = auth()->user();
        $data = [
            'commentable_type' => "App\Models\User",
            'comment' => $request->comment,
            // 'name' => $request->name,
            'star' => $request->star,
            'commentable_id' => $request->to_id,
            'user_id' => $user->id,
        ];
        $to = User::find($request->to_id);
        switch ($data['star']) {
            case $data['star'] >= 0 and $data['star'] < 20:
                $data['star'] = 1;
                break;
            case $data['star'] >= 20 and $data['star'] < 40:
                $data['star'] = 2;
                break;
            case $data['star'] >= 40 and $data['star'] < 60:
                $data['star'] = 3;
                break;
            case $data['star'] >= 60 and $data['star'] < 80:
                $data['star'] = 4;
                break;
            case $data['star'] >= 80 and $data['star'] <= 100:
                $data['star'] = 5;
                break;
        }


        if (!$data['comment']) {
            $data['confirm'] = Carbon::now();
        }
        $reject = 1;
        $data['rate'] = $request->star;
        $first = $to->comments()->where('user_id', $user->id)->first();
        if (!$first) {
            Comment::create($data);
            $reject = null;
        } else {
            $data['confirm'] = null;
            $first->update($data);
        }

        return response()->json([
            'all' =>  $request->all(),
            'data' =>  $data['star'],
            'reject' =>   $reject,
            'user' =>   $user,
        ]);
    }
}


