@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light"></span> ساخت منطقه جدید
        </h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">

                    <div class="card-body">
                        @include('main.error')
                        <form action="{{ route('region.store') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">نام منطقه</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        id="basic-default-name" placeholder="  نام    منطقه">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name"> شهر </label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="city_id" id="">
                                        <option value="">یک مورد را انتخاب کنید </option>
                                        @foreach (App\Models\City::all() as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                     <a href="{{ route('region.index') }}" class="btn btn-danger">برگشت</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
