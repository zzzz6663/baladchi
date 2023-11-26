@extends('main.manager')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span> ویرایش زیر دسته نهایی
        {{ $telic->name }}
    </h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">

                <div class="card-body">
                    @include('main.error')
                    <form action="{{ route('telic.update',$telic->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">نام زیر دسته</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{ old('name',$telic->name) }}" class="form-control" id="basic-default-name" placeholder="  نام  زیر دسته">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> icon</label>
                            <div class="col-sm-10">
                                <input type="text" name="icon" value="{{ old('icon') }}" class="form-control" id="basic-default-name" placeholder="    class">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> انتخاب به عنوان سردسته</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="subset_id" id="cat_id">
                                    <option value="">یک مورد را انتخاب کنید </option>
                                    @foreach (App\Models\Subset::all() as $subset)
                                    <option {{ old('parent_id',$telic->subset->id)==$subset->id?'selected':'' }} value="{{ $subset->id }}">{{ $subset->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="telicmit" class="btn btn-primary">ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
