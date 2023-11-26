@extends('main.manager')
@section('content')
{{ Breadcrumbs::render('user.edit',$user) }}

<div class="col-lg-6">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-frane"></i>
                    ویرایش همکار
                    {{$user->name}}
                    {{$user->family}}
                </h3>
            </div><!-- /.portlet-title -->
            <div class="buttons-box">

            </div><!-- /.buttons-box -->
        </div><!-- /.portlet-heading -->
        <div class="portlet-body">
            @include('main.error')
            <form role="form" action="{{route('user.update' ,$user->id)}}" method="post"" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-body">
                    <div class="form-group">
                        <label>نام</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control" placeholder="نام">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>نام خانوادگی</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" name="family" value="{{old('family',$user->family)}}" class="form-control" placeholder="نام خانوادگی">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label> همراه</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </span>
                            <input type="number" name="mobile" value="{{old('mobile',$user->mobile)}}" class="form-control" placeholder="همراه">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label> ایمیل</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-envelope"></i>
                            </span>
                            <input type="email" name="email" value="{{old('email',$user->email)}}" class="form-control" placeholder="ایمیل">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>  جنسیت</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-options"></i>
                            </span>
                            <select name="gender"  class="form-control">
                                <option {{old('gender',$user->gender)=='male'?'selected':''}} value="male">  مذکر</option>
                                <option {{old('gender',$user->gender)=='female'?'selected':''}} value="female">  مونث</option>
                            </select>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label> تاریخ تولد</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-envelope"></i>
                            </span>
                            <input type="text" name="b_date" value="{{old('b_date',$user->b_date)}}" class="form-control persian" placeholder="تاریخ تولد">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    </select>
                    <div class="form-group">
                        <label>  استان </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-options"></i>
                            </span>
                            <select class=" form-control " name="province_id" id="province" required>
                                <option value="">استان </option>
                                @foreach (App\Models\Province::all() as $province)
                                    <option {{old('province_id' ,$user->province->id)==$province->id?'selected':''}} value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>  شهر </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-options"></i>
                            </span>
                            <select class=" form-control " name="city_id" id="city" required>
                                <option value="{{$user->city->id}}">{{$user->city->name}}</option>
                            </select>

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label> کدملی</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </span>
                            <input type="tel" name="code" value="{{old('code',$user->code)}}" class="form-control" placeholder="کدملی">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label> شبا</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </span>
                            <input type="tel" name="shaba" value="{{old('shaba',$user->shaba)}}" class="form-control" placeholder="شبا">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>  آدرس</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" name="address" value="{{old('address',$user->address)}}" class="form-control" placeholder="  آدرس">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                </div><!-- /.form-body -->

                <div class="form-actions">
                    <button type="submit" class="btn btn-info btn-round">
                        <i class="icon-check"></i>
                        ذخیره
                    <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></button>

                </div><!-- /.form-actions -->
            </form>

        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div>


<div class="breadcrumb-box border shadow">
    <ul class="breadcrumb">
        <a href="{{route('user.index')}}" class="btn btn-danger">برگشت</a>
    </ul>

</div><!-- /.breadcrumb-left -->
</div>
@endsection
