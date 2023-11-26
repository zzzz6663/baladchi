@extends('main.manager')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span>  ویرایش  دسته بندی
        <span class="alert alert-primary   "> {{ $category->name }}</span>
      </h4>
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">

            <div class="card-body">
                @include('main.error')
              <form action="{{ route('category.update',$category->id) }}" method="post" >
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">نام دسته بندی</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{ old('name',$category->name) }}" class="form-control" id="basic-default-name" placeholder="  نام دسته بندی">
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">    icon</label>
                    <div class="col-sm-10">
                      <input type="text" name="icon" value="{{ old('icon',$category->icon) }}" class="form-control" id="basic-default-name" placeholder="    class">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">قیمت آگهی    </label>
                    <div class="col-sm-10">
                      <input type="number" name="price" value="{{ old('price',$category->price) }}" class="form-control" id="basic-default-name" placeholder="  قیمت آگهی    ">
                    </div>
                  </div>

                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">    انتخاب به عنوان سردسته</label>
                    <div class="col-sm-10">
                      <select  class="form-control select2"  name="parent_id" id="cat_id">
                        <option value="">یک مورد  را انتخاب کنید </option>
                        @foreach (App\Models\Category::all() as $cat)
                            <option {{ old('parent_id',$cat->id)==$category->parent_id ? 'selected ':''}} value="{{ $cat->id }}">{{ $cat->name }}</option>
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
        <div class="col-xxl">
            <div class="card mb-4">
              <div class="card-body">
                <h4>
                    زیر دسته های
                    <span id="catname">{{ $category->name }}</span>
                </h4>
                <div id="cat_li">
                    <ul>
                        @foreach ($category->subsets as $subset)
                        <li>{{ $subset->name }}</li>

                        @endforeach
                    </ul>

                    <br>


                </div>
              </div>
            </div>
          </div>
      </div>
 </div>
@endsection
