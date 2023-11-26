@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light"></span>
            تنظیم جدید
            <span class="alert alert-primary">
                {{ $setting->name }}
            </span>
        </h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-body">
                        @include('main.error')
                        <form action="{{ route('setting.update',$setting->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">نام تنظیم</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ old('name',$setting->name) }}" class="form-control"
                                        id="basic-default-name" placeholder="      ">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">مقدار</label>
                                <div class="col-sm-10">
                                    <input type="text" name="val" value="{{ old('val',$setting->val) }}" class="form-control"
                                        id="basic-default-val" placeholder="      ">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">

                                        <a href="{{ route('setting.index') }}"
                                            class="btn btn-danger">برگشت </a>
                                    <button type="submit" class="btn btn-primary">ارسال</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
