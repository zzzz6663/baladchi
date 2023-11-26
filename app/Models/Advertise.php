<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertise extends Model
{
    use HasFactory ;
    // public $cacheFor = 5; // cache time, in seconds
    protected $fillable = [
        'user_id',
        'category_id',
        'subset_id',
        'telic_id',
        'province_id',
        'city_id',
        'latitude',
        'longitude',
        'title',
        'info',
        'vip',
        'sort',
        'share',
        'pay_vip',
        'region_id',
        'confirm', //زمان تایید
        'active', //نمایش
        'status', //وضعیت
        'auto_release', //زمان تایید سیستم
        'expired_at', //زمان انقضا
        'notif', //ارسال اعلان
    ];
    public function  user()
    {
        return $this->belongsTo(User::class);
    }
    public function  seen_user()
    {
        return $this->belongsToMany(User::class, 'seen_user')->withPivot(['date']);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Subset()
    {
        return $this->belongsTo(Subset::class);
    }
    public function telic()
    {
        return $this->belongsTo(Telic::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function city_cash()
    {
        if(cache()->has("adcity")){
            $adcity=cache()->get("adcity");
        }else{
            $adcity = $this->belongsTo(City::class)->get();
            cache()->put("adcity",$adcity );
        }
        if($adcity->first()){
        return $adcity;

        }
        return false;
    }


    public function subset_cash()
    {
        if(cache()->has("adsubset".$this->id)){
            $adsubset=cache()->get("adsubset".$this->id);
        }else{
            $adsubset = $this->belongsTo(Subset::class)->get();
            cache()->put("adsubset".$this->id,$adsubset );
        }
        if($adsubset->first()){
        return $adsubset;

        }

        return false;
    }


    public function telic_cash()
    {
        if(cache()->has("adtelic")){
            $adtelic=cache()->get("adtelic");
        }else{
            $adtelic = $this->belongsTo(telic::class)->get();
            cache()->put("adtelic",$adtelic );
        }
        if($adtelic->first()){
        return $adtelic;

        }
        return false;
    }



    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function region_cash()
    {
        if(cache()->has("adregion")){
            $adregion=cache()->get("adregion");
        }else{
            $adregion = $this->belongsTo(Region::class)->get();
            cache()->put("adregion",$adregion );
        }
        if($adregion->first()){
        return $adregion;

        }
        return false;
    }
    public function options()
    {
        return $this->morphMany(Option::class, 'optionable');
    }



    public function options_cash()
    {

        if(cache()->has("options")){
            $options=cache()->get("options");
        }else{
            $options = $this->morphMany(Option::class, 'optionable')->get();
            cache()->put("options",$options ,now()->addMinutes(500));
        }
        return $options;
    }


    public function memos()
    {
        return $this->hasMany(Memo::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function faves_users()
    {
        return $this->belongsToMany(User::class);
    }

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function similars()
    {
        if ($this->telic_id) {
            $similars = Advertise::whereStatus("confirmed")->where("telic_id", $this->telic->id)->where("id", "!=", $this->id)->take(5)->get();
        } else {
            $similars = Advertise::whereStatus("confirmed")->where("subset_id", $this->subset->id)->where("id", "!=", $this->id)->take(5)->get();
        }
        return $similars;
    }


    public function image()
    {
    }
    public function show_option($name)
    {
        $option =  $this->options()->whereName($name)->first();
        if ($option) {
            return $option->val;
        }
        return '';
    }

    public function update_or_create_option($name, $val, $info = null)
    {
        $option =  $this->options()->whereName($name)->first();
        if (is_array($val)) {
            return null;
        }
        if ($option) {
            if ($info) {
                $option->update(['val' => $val, 'info' => $info]);
            } else {
                $option->update(['val' => $val]);
            }
        } else {
            $option = $this->options()->create(['name' => $name, 'val' => $val, 'info' => $info]);
        }
        return  $option;
    }


    public function check_seen()
    {
        $user = auth()->user();
        $id = null;
        $class = null;
        if ($user) {
            $id = $user->id;
        }
        if ($this->seen_user()->where('user_id', $id)->first()) {
            $class = "seen";
        }
        return  $class;
    }
    public function visitor($uni)
    {
        return User::find($this->chats()->where("uni",$uni)->first()->user_id);
    }
    public function chck_has_price()
    {
        $price = $this->options()->whereName('price')->where('val', '!=', null)->first();
        if ($price) {
            return $price->val;
        }
        return false;
    }
    public function first_image()
    {
        $type = 'subset';
        $path = ('/media/advertise/');
        if ($this->telic) {
            $type == 'telic';
            $path .= 'telic' . $this->telic->id;
        } else {
            $path .= 'subset' . $this->subset->id;
        }

        // if($this->id==219){
        //         dd(public_path($path)."/".$this->images->first()->image);
        // }
        if ($this->images->first() &&  File::exists(public_path($path)."/".$this->images->first()->image)) {
            return  $path."/".$this->images->first()->image;
        }
    }
    public function check_pay_for_vip()
    {
        if ($this->bills()->whereType("vip")->whereType('bill_payed')->first()) {
            return true;
        }
        return false;
    }
    public function expired()
    {
        $now = Carbon::now();
        $expire = Carbon::parse($this->expired_at);
        return  $now->gt($expire);
    }
}
