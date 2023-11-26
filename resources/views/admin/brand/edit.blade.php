@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light"></span>
            ویرایش برند

            <span class="alert alert-primary">
                @if ($brand)
                    برای برند
                    {{ $brand->name }}
                @endif
                @if ($telic)
                    برای دسته بندی
                    {{ $telic->name }}
                @endif
            </span>

        </h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-body">
                        @include('main.error')
                        <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">نام برند</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ old('name', $brand->name) }}"
                                        class="form-control" id="basic-default-name" placeholder="     مثلا تویوتا">
                                    <input type="text" name="telic_id" value="{{ request('telic_id') }}" hidden>
                                    @if ($brand)
                                        <input type="text" name="parent_id" value="{{ request('brand_id') }}" hidden>
                                        <input type="text" name="telic_id" value="{{ $brand->telic_id }}" hidden>
                                    @endif

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name"> icon</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="icon" type="file" id="formFile">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name"> سال تولید</label>
                                <div class="col-sm-10">
                                    {{-- <input class="form-control select2_tag"   type="text"> --}}
                                    {{-- <select class="form-control select2_tag" name="questions[]" > --}}
                                        <select name="years[]" class="form-control select2_tag" multiple >
                                            @foreach ($brand->years as $year )
                                                <option selected value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endforeach
                                         </select>
                                </div>
                            </div>


                            {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">    انتخاب به عنوان سردسته</label>
                    <div class="col-sm-10">
                      <select  class="form-control select2"  name="brand_id" id="cat_id">
                        <option value="">یک مورد  را انتخاب کنید </option>
                        @foreach (App\Models\Brand::all() as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div> --}}
                            <div class="row justify-content-end">
                                <div class="col-sm-10">

                                    @if ($telic)
                                        <a href="{{ route('brand.index', ['telic_id' => $telic->id]) }}"
                                            class="btn btn-danger">برگشت </a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">ارسال</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xxl">
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
          </div> --}}
        </div>

    </div>
@endsection
