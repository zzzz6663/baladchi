<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\City;
use App\Models\User;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query();
        if ($request->search) {
            $search = $request->search;
           $users->where(function ($query) use ($search, $users) {
                $users->where('name', 'LIKE', "%{$search}%")
                ->orWhere('family', 'LIKE', "%{$search}%")
                ->orWhere('mobile', 'LIKE', "%{$search}%")
                ->orWhereHas('province', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('city', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
           });
        }
// ss
        $users = $users->whereIn('role', ['user'])->latest()->paginate(10);
        return view('admin.users.all', compact(['users']));
    }

    /**
     * Show the form for creatiسng a new resource.
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
    public function show(User $user)
    {
        return view('admin.users.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data=$request->validate([
            'name' => 'required',
            'family' => 'required',
            'mobile' => 'required|unique:users,mobile,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            'gender' => 'required',
            'b_date' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'code' => 'required|min:10|max:10|unique:users,code,' . $user->id,
            'shaba' => 'required|min:24|max:24|unique:users,code,' . $user->id,
            'address' => 'required|min:20|max:1500',
        ]);
        $data['b_date'] = $user->convert_date($data['b_date']);
        $user->update($data);
        alert()->success();
return redirect()->route('user.index');
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
    public function user_authenticate(USer $user)
    {
        if(!$user->authenticated){
            $user->update(['authenticated'=> Carbon::now()]);
            alert()->success('کاربر با موفقیت تایید حساب شد ');
        }else{
            alert()->warning('این کاربر قبلا تایید حساب شده است ');
        }
return   back();
    }





}
