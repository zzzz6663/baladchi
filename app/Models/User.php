<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Note;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'family',
        'province_id',
        'city_id',
        'region_id',
        'role',
        'mobile',
        'gender',
        'degree',
        'b_date',
        'avatar',
        'password',
        'shaba',
        'melli_code',
        'baladchi',
        'cover',
        'balance',
        'info',
        'authenticated',
        'consent',
        'instagram',
        'linkedin',
        'facebook',
        'youtube',
        'visit',
        'show_visitor',
        'salary',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function city(){
        return $this->belongsTo(City::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function options(){
        return $this->morphMany(Option::class,'optionable');
    }
    public function advertises(){
        return $this->hasMany(Advertise::class);
    }
    public function talks(){
        return $this->hasMany(Talk::class);
    }
    public function to_talks(){
        return $this->hasMany(Talk::class,"to_id");
    }
     public function experts(){
        return $this->belongsToMany(Expert::class);
    }

    public function avatar(){
        $myfile=public_path( '/media/avatar/'.$this->avatar);
        if($this->avatar &&  File::exists($myfile)){

            return   ( '/media/avatar/'.$this->avatar) ;
        }
        return  false;
    }
    public function cover(){
        if($this->cover){
            return '/media/cover/'.$this->cover;
        }
        return  false;
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }
    public function to_reports(){
        return $this->hasMany(Report::class,'to_id');
    }


    public function faves_ads(){
        return $this->belongsToMany(Advertise::class);
    }


    public function faves_user_one(){
        return $this->belongsToMany(User::class,"user_user", 'user_two_id', 'user_one_id');
    }


    public function faves_user_tow(){
        return $this->belongsToMany(User::class,"user_user", 'user_two_id', 'user_one_id');
    }

    public function faveuser()
    {
        return $this->faves_user_one()->get()->merge($this->faves_user_tow()->get())->unique('id');
    }
    public function attach_user_fave(Tag $tag)
    {
        if ($this->tags()->contains('id', $tag->getKey())) {
            return true;
        }
        $this->tagsOneTwo()->attach($tag->getKey());
        return false;
    }

    public function user_memos()
    {
        return $this->hasMany(Memo::class);
    }

    public function memos()
    {
        return $this->belongsToMany(Memo::class)->withPivot(['seen']);
    }

    public function telics(){
        return $this->belongsToMany(Telic::class);
    }
    public function subsets(){
        return $this->belongsToMany(Subset::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }


    public function notes_cash(){
        if(cache()->has("notes")){
            $notes=cache()->get("notes");
        }else{
            $notes = $this->hasMany(Note::class)->get();
            cache()->put("notes",$notes,now()->addMinutes(20) );
        }
        return $notes;
    }


    public function chats(){
        return $this->hasMany(Chat::class);
    }

    public function visitor_chats(){
        return $this->hasMany(Chat::class,'id','visitor_id');
    }


    public function resumes(){
        return $this->hasMany(Resume::class);
    }



    public function bills(){
        return $this->hasMany(Bill::class);
    }
    public function to_bills(){
        return $this->hasMany(Bill::class,"to_id");
    }
   public function deposits(){
        return $this->hasMany(Deposit::class);
    }

    public function seens(){
        return $this->belongsToMany(Advertise::class,'seen_user')->withPivot(['date']);
    }

    public function fave_memos(){
        return $this->memos()->wherePivot("seen",0)->count();
    }

    public function  views(){
        return $this->belongsToMany(Counsel::class,'viewcounsel_user');
    }
    public function  all_cities(){
        return $this->belongsToMany(City::class);
    }

    public function  all_cities_cache(){
        if(cache()->has("all_cities")){
            $all_cities=cache()->get("all_cities");
        }else{
            $all_cities = $this->belongsToMany(City::class)->get();
            cache()->put("all_cities",$all_cities );
        }
        return $all_cities;


    }
    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    public function assistes(){
        return $this->hasMany(Assist::class);
    }
    public function counsels(){
        return $this->hasMany(Counsel::class);
    }

    public function answers(){
        return $this->hasmany(Answer::class);
    }
    public function stars(){
        return $this->hasMany(Star::class);
    }
    public function to_stars(){
        return $this->hasMany(Star::class,"to_id","id");
    }
    public function user_comment(){
        return $this->hadMany(Comment::class);
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function starscount(){
        return 5 - $this->stars()->count();
    }
    public function donate_oute(){
        return $this->to_bills()->whereStatus("bill_payed")->count();
    }


    public function comment_log(){
        // dd(floor($this->comments()->where('confirm', '!=', null)->avg("star")));
        if($count=$this->comments()->where('confirm', '!=', null)->count()){
            $av=floor($this->comments()->where('confirm', '!=', null)->avg("rate"));
            $data['all']=$this->comments()->where('confirm', '!=', null)->count() ;
            $data['s1']=($this->comments()->where('confirm', '!=', null)->whereStar(1)->count()*100)/$data['all'];
            $data['s2']=($this->comments()->where('confirm', '!=', null)->whereStar(2)->count()*100)/$data['all'];
            $data['s3']=($this->comments()->where('confirm', '!=', null)->whereStar(3)->count()*100)/$data['all'];
            $data['s4']=($this->comments()->where('confirm', '!=', null)->whereStar(4)->count()*100)/$data['all'];
            $data['s5']=($this->comments()->where('confirm', '!=', null)->whereStar(5)->count()*100)/$data['all'];
            // $data['av']=(floor($this->comments()->where('confirm', '!=', null)->avg("star"))*100)/5;
            // $data['av']=$av*20 ;
            $data['av']=floor($av) ;
            $data['count']=$count;
        }else{
            $data['all']=0;
            $data['s1']=0;
            $data['s2']=0;
            $data['s3']=0;
            $data['s4']=0;
            $data['s5']=0;
            $data['av']=0;
            $data['count']=0;
        }
        // dd($data);

        return  $data;
    }
    public function check_ad_deposit($advertise){
        $deposit=$this->deposits()->where('advertise_id',$advertise->id)->first();
        if( $deposit){
            return  $deposit->amount;
        }

        return false;
    }
    public function ad_note($advertise){
        // dd($advertise);
        $exist=$this->notes()->where('advertise_id', $advertise->id)->first();
        if($exist){
            return $exist->info;
        }
        return  "";
    }


    public function vip_price(){
        return (int) Setting::find(1)->val;
    }
    public function notif_price(){
        return (int) Setting::find(2)->val;
    }
    public function sort_price(){
        return (int) Setting::find(4)->val;
    }
    public function holdover_price(){
        return (int) Setting::find(3)->val;
    }

    public function talk_price(){
        return (int) Setting::find(5)->val;
    }
    public function name(){
        return $this->name . " ".$this->family;
    }
    public function unread_message($uni=null){
        if($uni){
            return Chat::where("to_id",$this->id)->where("uni",$uni)->where("seen",0)->count();
        }
        return Chat::where("to_id",$this->id)->where("seen",0)->count();
    }
}
