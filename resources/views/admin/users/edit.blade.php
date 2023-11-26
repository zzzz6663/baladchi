@extends('main.manager')
@section('content')

 <div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span>  ویرایش
        اطلاعات
    {{ $user->name }}
    {{ $user->family }}
      </h4>
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">

            <div class="card-body">
                @include('main.error')
              <form action="{{ route('user.update',$user->id) }}" method="post" >
                @csrf
                @method('patch')
                {{--  <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">نام  مهارت  </label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control" id="basic-default-name" placeholder="      مثلا صافکار">
                  </div>
                </div>  --}}

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="parent_id">      </label>
                    <div class="col-sm-10">

                        <select name="parent_id" class="form-control" id="">
                            <option value="">یک مورد را انتخاب کنید </option>
                        </select>
                        </div>
                  </div>
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
 </div>

@endsection
