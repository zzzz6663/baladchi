
@extends('main.manager')
   @section('content')
   {{ Breadcrumbs::render('province.edit',$province) }}
    <div class="col-lg-6">
        <div class="portlet box border shadow">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h3 class="title">
                        <i class="icon-frane"></i>
                        به روز رسانی تصویر  استان
                        {{$province->name}}
                    </h3>
                </div><!-- /.portlet-title -->
                <div class="buttons-box">

                </div><!-- /.buttons-box -->
            </div><!-- /.portlet-heading -->
            <div class="portlet-body">
                @include('main.error')
                <form action="{{route('province.update',$province->id)}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="form-group relative">
                                <input type="file"  accept="image/*" name="image" class="form-control">
                                <label>آپلود فایل</label>
                                <div class="input-group round">
                                    <input type="text" class="form-control file-input" placeholder="برای آپلود کلیک کنید">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info">
                                            <i class="icon-picture"></i>
                                            آپلود عکس
                                        <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></button>
                                    </span>
                                </div><!-- /.input-group -->
                                <div class="help-block"></div>
                            </div>
                            <div class="form-group relative">
                                <button type="submit" class="btn btn-info curve">
                                    ذخیره
                                <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></button>
                            </div>
                        </div>

                    </div>

                </form>

            </div><!-- /.portlet-body -->
        </div><!-- /.portlet -->
    </div>
   @endsection
