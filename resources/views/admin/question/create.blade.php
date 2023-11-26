@extends('main.manager')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span>  ساخت     سوال جدید
      </h4>
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">

            <div class="card-body">
                @include('main.error')
              <form action="{{ route('question.store') }}" method="post" >
                @csrf
                @method('post')
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">نام   فارسی</label>
                  <div class="col-sm-10">
                    <input type="text" name="fa" value="{{ old('fa') }}" class="form-control" id="basic-default-name" placeholder="  نام    فارسی">
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">نام   لاتین</label>
                    <div class="col-sm-10">
                      <input type="text" name="en" value="{{ old('en') }}" class="form-control" id="basic-default-name" placeholder="  نام    لاتین">
                    </div>
                  </div>


                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">       انتخاب دسته بندی نهایی</label>
                    <div class="col-sm-10">
                      <select  class="form-control select2"  name="telics[]" multiple="multiple" id="cat_id">
                        <option value="">یک مورد  را انتخاب کنید </option>
                        @foreach (App\Models\Telics::all() as $telic)
                            <option {{in_array( $telic->id, old('telics'))}} value="{{ $telic->id }}">{{ $telic->name }}</option>
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
