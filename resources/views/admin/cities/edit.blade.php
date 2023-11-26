@extends('main.manager')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span>  ویرایش
        شهر
        <span class="alert alert-primary   "> {{ $city->name }}</span>
      </h4>
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">

            <div class="card-body">
                @include('main.error')
              <form action="{{ route('city.update',$city->id) }}" method="post" >
                @csrf
                @method('PATCH')

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">    lat</label>
                    <div class="col-sm-10">
                      <input type="text" name="lat" value="{{ old('lat',$city->lat) }}" class="form-control" id="basic-default-name" placeholder="    طول جغرافیایی">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">  lon    </label>
                    <div class="col-sm-10">
                      <input type="text" name="lon" value="{{ old('lon',$city->lon) }}" class="form-control" id="basic-default-name" placeholder="   عرض جغرافیایی    ">
                    </div>
                  </div>

                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">    انتخاب به عنوان سردسته</label>
                    <div class="col-sm-10">
                      <select  class="form-control select2"  name="parent_id" id="cat_id">
                        <option value="">یک مورد  را انتخاب کنید </option>
                        @foreach (App\Models\city::all() as $cat)
                            <option {{ old('parent_id',$cat->id)==$city->parent_id ? 'selected ':''}} value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div> --}}

                <div class="row justify-content-end">
                  <div class="col-sm-10">
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
