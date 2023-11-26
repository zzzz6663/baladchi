@extends('main.manager')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span>  ساخت   زیر دسته جدید
      </h4>
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">

            <div class="card-body">
                @include('main.error')
              <form action="{{ route('subset.store') }}" method="post" >
                @csrf
                @method('post')
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">نام  زیر دسته</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="basic-default-name" placeholder="  نام  زیر دسته">
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">    icon</label>
                    <div class="col-sm-10">
                      <input type="text" name="icon" value="{{ old('icon') }}" class="form-control" id="basic-default-name" placeholder="    class">
                    </div>
                  </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">    انتخاب به عنوان سردسته</label>
                    <div class="col-sm-10">
                      <select  class="form-control select2"  name="category_id" id="cat_id">
                        <option value="">یک مورد  را انتخاب کنید </option>
                        @foreach (App\Models\Category::where('parent_id',null)->latest()->get() as $cat)
                            <option {{ $loop->iteration==1?'selected':'' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
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
        <div class="col-xxl">
            <div class="card mb-4">
              <div class="card-body">
                <h4>
                    زیر دسته های
                    <span id="catname"></span>
                </h4>
                <div id="cat_li">

                </div>
              </div>
            </div>
          </div>
      </div>
 </div>
@endsection
