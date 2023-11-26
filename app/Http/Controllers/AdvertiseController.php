<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Brand;
use App\Models\Telic;
use App\Models\Filter;
use App\Models\Subset;
use App\Models\Category;
use App\Models\Province;
use App\Models\Question;
use App\Models\Advertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class AdvertiseController extends Controller
{


    public function ads(Request $request)
    {

        // cache()->flush();
        // dd($request->all());

        $user = auth()->user();

        $cities_all = [];

        // if($request->cities){
        //     $cities_all=$request->cities;;

        // }


        $user_fave = [];
        if ($user) {
            $user_fave = $user->faves_ads()->pluck('id')->toArray();
        }


        $all_req = $request->all();
        $now_page = null;
        $page = 12;


        if ($request->check_city   ) {
            $cities_all=$request->cities;
            if( $user){
            $user->all_cities()->sync($request->cities);
            }
        }

        if ($user  ) {
            $cities_all = $user->all_cities()->pluck("id")->toArray();
        }
        if (cache()->has("provinces")) {
            $provinces = cache()->get("provinces");
        } else {
            $provinces = Province::all();
            cache()->put("provinces", $provinces);
        }


        if (cache()->has("categories")) {
            $categories = cache()->get("categories");
        } else {
            $categories = Category::all();
            $advertises = cache()->put("categories", $categories);
        }
        $user = auth()->user();
        $advertises = Advertise::query();
        if ($request->subset  && $request->type == "subset") {
            $advertises->where('subset_id', $request->subset);
        }
        if ($request->telic && $request->type == "telic") {
            $advertises->where('telic_id', $request->telic);
        }
        $advertises->where('expired_at', '>', Carbon::now()->subDays(30)->toDateTimeString());
        if ($cities_all) {
            $advertises->whereIn('city_id', $cities_all);
        }


        if ($request->vip) {
            $advertises->whereVip(1);
        }
        if ($request->search) {
            $search = $request->search;
            $advertises->where("title", "like", "%$search%");
        }

        $advertises->where('status', 'confirmed')->whereActive('1');

        if (!$request->page) {
            $request->page = 1;
        }
        foreach ($request->all() as $eq => $val) {
            if (in_array($eq, ['_method', "_token", "phpdebugbar-height", "phpdebugbar-open", "pusherTransportNonTLS", "telic_id", "subset_id", "type", "cities", "check_city", "id", "vip", "region_id", "back", "now_page", "category_id", "remove", 'type', 'subset', "local", 'telic', "remove", 'category', 'search', "page", 'length', "pusherTransportTLS", "_", "form_data"])) {
                continue;
            }
            $data = explode('__', $eq);
            if (sizeof($data) > 1) {
                $opertaor = $data['1'] == "min" ? '>=' : '<=';
                if ($val) {
                    $advertises->whereHas('options', function ($query) use ($opertaor, $data, $val) {
                        $query->where('name', $data[0])
                            ->where('val', $opertaor, (int) $val);
                    });
                }
            } else {
                $advertises->whereHas('options', function ($query) use ($eq, $val, $request) {
                    $query->where('name', $eq)
                        ->where('val', $val);
                });
            }
        }


        if ($request->region_id) {
            $advertises->where('region_id', $request->region_id);
        }

        if ($request->category && $request->type == "category") {
            $advertises->where('category_id', $request->category);
        }
        if ($request->subset_id) {
            $advertises->where('subset_id', $request->subset_id);
            $now_page = 1;
        }
        if ($request->telic_id) {
            $advertises->where('telic_id', $request->telic_id);
            $now_page = 1;
        }


        // if (cache()->has("advertises1")) {
        //     // $advertises = cache()->get("advertises1");
        // } else {


        //     // if ($request->ajax()) {

        //     //     // $advertises =  $advertises->orderBy('created_at', 'DESC')->paginate(15);

        //     // } else {
        //     //     // if ($request->subset_id) {
        //     //     //     $advertises->where('subset_id', $request->subset_id);
        //     //     //     $now_page = 1;
        //     //     // }
        //     //     // if ($request->telic_id) {
        //     //     //     $advertises->where('telic_id', $request->telic_id);
        //     //     //     $now_page = 1;
        //     //     // }
        //     // }

        //     // // dd($advertises->pluck("subset_id")->toArray());
        //     // dd($advertises->get());
        //     // $advertises =    $advertises->orderBy('created_at', 'DESC')->paginate($page);
        //     // cache()->put("advertises1", $advertises, now()->addMinutes(5));
        // }
        $advertises =    $advertises->orderBy('created_at', 'DESC')->paginate($page);



        if ($request->ajax()) {
            return response()->json([
                'count' => $advertises->count(),
                'page' => $request->page,
                'all' => $request->all(),
                'cities_all' => $cities_all,
                'body' => view('home.ads.ads_list', compact(['all_req',"provinces", 'user', 'advertises', 'user_fave', 'categories']))->render(),
            ]);
        } else {

            return view('home.ads.ads', compact(['user', "cities_all", "provinces", 'advertises', 'user_fave', 'categories', 'all_req', "page", "now_page"]));
        }
    }

















    public function save_add_pictures(Request $request)
    {



        $user = auth()->user();
        $data['file'] = null;
        $name_img = null;

        if ($request->hasFile('file')) {
            $time = Carbon::now()->timestamp;
            $avatar = $request->file('file');
            $name_img = 'file_' . $user->id . '_' .  $time . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/temp/'), $name_img);
            $original_image = public_path('/media/temp/' . $name_img);
            $new_image = public_path('/media/temp/' . $name_img);
            $image = imagecreatefromjpeg($original_image);
            imagejpeg($image, $new_image, 30);
            $data['file'] = $name_img;
        }
        return response()->json([
            'all' => $data['file'],
            'src' => '/media/temp/' . $name_img,
            'img' => $name_img,
        ]);
    }
    public function insert_new_advertise(Request $request, Advertise $advertise)
    {


        // return response()->json([
        //     'all' =>$request->all() ,
        // ]);
        $user = auth()->user();
        $type = $request->type;
        $subset = $request->subset;
        $telic = Telic::find($request->telic);
        $subset = Subset::find($request->subset);
        $more_data = [
            'least_price' => "nullable",
            'active_release' => "nullable",
            'day' => "required_if:active_release,1",
            'hour' => "required_if:active_release,1",
            'min' => "required_if:active_release,1",
        ];

        if ($type == 'subset') {
            $validate = $subset->questions;
        }
        if ($type == 'telic') {
            $validate = $telic->questions;
        }
        foreach ($validate as $valid) {

            if ($valid->pivot->required) {

                $for_validate[$valid->en] = 'required';
            } else {
                $for_validate[$valid->en] = 'nullable';
            }
        }
        $for_validate['city_id'] = "required";
        $for_validate = array_merge($for_validate, $more_data);

        $validator = Validator::make($request->all(), $for_validate);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }



        $city = City::find($request->city_id);

        $province = $city->province;
        if ($type == 'subset') {
            $validate = $subset->questions;
            $data = [
                'category_id' => $subset->category->id,
                'subset_id' => $subset->id,
                'telic_id' => null,
                'province_id' => $province->id,
                'city_id' => $city->id,
                'title' => $request->title,
                'info' => $request->info,
                'region_id' => $request->region_id,

            ];
        }
        if ($type == 'telic') {
            $validate = $telic->questions;
            $data = [
                'category_id' => $telic->subset->category->id,
                'subset_id' => $telic->subset->id,
                'telic_id' => $telic->id,
                'province_id' => $province->id,
                'city_id' => $city->id,
                'title' => $request->title,
                'info' => $request->info,
                'region_id' => $request->region_id,
            ];
        }

        $all_data = $validator->safe()->all();
        $all_data['latitude'] = $request->latitude;
        $all_data['longitude'] = $request->longitude;
        $data['expired_at'] = Carbon::now()->addDays(30);
        if ($advertise->id) {
            $data['confirm'] = null;
            $data['status'] = "wait_for_confirm";
            $advertise->update($data);
            if ($request->memo && $advertise->faves_users()->count() > 0) {
                $memo = $user->user_memos()->create([
                    'memo' => $request->memo,
                    'advertise_id' => $advertise->id,
                    'active' => 1,
                ]);
                foreach ($advertise->faves_users as $faver) {
                    $faver->memos()->attach([$memo->id]);
                }
            }
        } else {
            $advertise = $user->advertises()->create($data);
        }
        if ($request->pictures) {
            // return response()->json([
            //     // 'all' =>$request->all() ,
            //     'status'=>'ok11'
            // ]);


            foreach ($request->pictures as $key => $val) {

                $path = public_path('media/advertise/');
                if ($type == 'subset') {
                    // $path.='subset'.$advertise->subset->id;
                    $path .= 'subset' . $advertise->subset->id;
                }
                if ($type == 'telic') {
                    // $path.='telic'.$advertise->telic->id;
                    $path .= 'telic' . $advertise->telic->id;
                }

                if (!File::isDirectory($path)) {
                    File::makeDirectory($path);
                }
                $path .= '/';
                // return response()->json([
                //     'data'=> $path,
                // ]);
                $old = '/media/temp/' . $val;
                //  return response()->json([
                //     'data'=> file_exists(public_path($old)),
                //     'old'=> public_path($old),
                //     'path'=>( $path.$val),
                // ]);
                if ((\File::exists(public_path($old)))) {
                    File::move(public_path($old), ($path . $val));
                    $advertise->images()->create(['image' => $val, 'type' => 'public']);
                }

                // $old='/media/temp/';
                // // return response()->json([
                // //     'data'=> $path,
                // // ]);
                // if(\File::exists( public_path($old.$val,$val))){

                //     File::move(public_path($old.$val),public_path( $path.$val));
                // }
                // $path.='/';
                // return response()->json([
                //     'data'=> $path,
                //     'data'=> $val,
                // ]);
                // File::move(public_path('/media/temp/'), public_path( $path));

            }
        }


        foreach ($data as $ke => $va) {
            unset($all_data[$ke]);
        }

        // $all_data = array_diff_key($all_data, array_flip($data));

        foreach ($all_data as $key => $val) {
            $advertise->update_or_create_option($key, $val);
        }
        return response()->json([
            'all' => $request->all(),
            'status' => 'ok',
            'id' =>  $advertise->id,
            'title' =>  $advertise->title
        ]);
    }
    public function new_advertise()
    {
        $categories = Category::all();
        $questions = Question::get();
        $ar = [];
        foreach ($questions as $qu) {
            $ar[$qu->en] = $qu->fa;
        }
        //    dd( $ar);
        return view('home.advertise.new_advertise', compact(['categories']));
    }

    public function search_brand(Request $request, Telic $telic)
    {
        $search = $request->search;
        $parents = Brand::select('parent_id')->where('telic_id', $telic->id)->distinct()->pluck('parent_id')->toArray();
        $brands = Brand::where('parent_id', '!=', null)->where('name', 'LIKE', "%{$search}%")->where('telic_id', $telic->id)->get();
        foreach ($brands as  $key => $brand) {
            if (in_array($brand->id, $parents)) {
                $brands->forget($key);
            }
        }

        return response()->json([
            'html' => view('home.brand.search_brand', compact(['brands']))->render(),
            'all' => $request->all(),
            'telic' => $telic->name,
        ]);
    }


    public function get_advertise_form(Request $request, Advertise $advertise)
    {
        $subset = null;
        $category_name = null;
        $telic = null;
        $type = $request->type;
        $id = $request->id;
        if ($type == 'telic') {
            $telic = Telic::find($id);
            $category_name = $telic->subset->category->en;
        }
        if ($type == 'subset') {
            $subset = Subset::find($id);
            $category_name = $subset->category->en;
        }
        return response()->json([
            'html' => view('home.advertise.categories.get_advertise_form', compact(['subset', 'telic', 'type', 'category_name', "advertise"]))->render(),
            'all' => $request->all(),
            'advertise' => $advertise,
            // 'telic' =>$telic->name ,
        ]);
    }








    public function check_fave(Request $request, Advertise $advertise)
    {
        $user = auth()->user();
        $check_exist = $user->faves_ads()->where('id', $advertise->id)->exists();
        if ($check_exist) {
            $status = 0;
            $user->faves_ads()->detach($advertise->id);
        } else {
            $status = 1;
            $user->faves_ads()->attach($advertise->id);
        }
        //
        return response()->json([
            'status' => $status,
        ]);
    }

    public function filters(Request $request)
    {
        $subset = null;
        $telic = null;
        if ($request->type == 'telic') {
            $telic = Telic::find($request->id);
        } else {
            $subset = Subset::find($request->id);
        }
        $filters = Filter::pluck('en')->toArray();;
        $custom_filters = [];

        if ($telic) {
            // $telic->questions()->whereIn( $filters,'en')->count();
            $filters = $telic->questions->whereIn('en', $filters)->all();
        }
        if ($subset) {
            $filters = $subset->questions->whereIn('en', $filters)->all();
        }

        $user = auth()->user();
        if ($user) {
            $cities_all = $user->all_cities()->pluck("id")->toArray();
        } else {
            $cities_all =  session()->get("cities", []);
        }

        return response()->json([
            'subset' => $subset,
            'telic' => $telic,
            '' => $request->all(),
            // 'fillters'=>  $filters,
            'body' => view('home.filters.selected_filters', compact(['filters', 'telic', 'subset', "cities_all"]))->render(),
            // 'sss'=>$telic->questions->whereIn('en', $filters)->get(),
            // 'ss'=>$telic->questions->pluck('en')->toArray()
        ]);
    }

    public function single_ad(Request $request, Advertise $advertise)
    {


        // dd( "passed");
        $user = auth()->user();

        if (!in_array($advertise->status, ['confirmed'])) {
            alert()->warning('آگهی  موجود نیست');
            return back();
        }
        $similars = $advertise->similars();
        // dd($similars);
        // dd($advertise->id);

        $note = null;
        session()->put('back', true);
        if ($user  && $user->id != $advertise->user->id) {
            $user->seens()->syncWithoutDetaching($advertise->id, ['date' => Carbon::now()]);
        }

        if ($user) {

            $note = $user->notes()->where('advertise_id', $advertise->id)->first();
            if ($note) {
                $note = $note->info;
            }
        }

        $images = $advertise->images;
        // $images=$advertise->images()->pluck('image')->toArray();
        $user_fave = [];
        if ($user) {
            $user_fave = $user->faves_ads()->pluck('id')->toArray();
        }
        $baladchies = User::query();
        $baladchies->whereRole('user')->where('baladchi', '!=', null);
        if ($advertise->telic_id) {
            $baladchies->whereHas("telics", function ($query) use ($advertise) {
                $query->where("id", $advertise->telic_id);
            });
        } else {
            $baladchies->whereHas("subsets", function ($query) use ($advertise) {
                $query->where("id", $advertise->subset_id);
            });
        }
        $baladchies = $baladchies->get();
        return view('home.ads.single_ad', compact(['user', 'advertise', 'images', 'user_fave', 'note', "similars", "baladchies"]));
    }
}
