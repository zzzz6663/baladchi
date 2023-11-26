@extends('main.manager')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span>       کپی سوالات
        {{ $subset->name }}
        -
{{ $subset->questions()->count()  }}
        سوال
    </h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">

                <div class="card-body">
                    @include('main.error')
                    <form action="{{ route('subset.copy.question',$subset->id) }}" method="post">
                        @csrf
                        @method('post')


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> انتخاب به عنوان مرجع سوال</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="subset_id" id="">
                                    <option value="">یک مورد را انتخاب کنید </option>
                                    @foreach (App\Models\Subset::all() as $subset)
                                    <option {{ old('parent_id',$subset->id)==$subset->id?'selected':'' }} value="{{ $subset->id }}">{{ $subset->name }} - {{  $subset->questions()->count() }} سوال</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="subsetmit" class="btn btn-primary">ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
