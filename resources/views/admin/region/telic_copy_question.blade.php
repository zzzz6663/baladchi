@extends('main.manager')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span>       کپی سوالات
        {{ $telic->name }}
        -
{{ $telic->questions()->count()  }}
        سوال
    </h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">

                <div class="card-body">
                    @include('main.error')
                    <form action="{{ route('telic.copy.question',$telic->id) }}" method="post">
                        @csrf
                        @method('post')


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> انتخاب به عنوان مرجع سوال</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="telic_id" id="">
                                    <option value="">یک مورد را انتخاب کنید </option>
                                    @foreach (App\Models\Telic::all() as $telic)
                                    <option {{ old('parent_id',$telic->id)==$telic->id?'selected':'' }} value="{{ $telic->id }}">{{ $telic->name }} - {{  $telic->questions()->count() }} سوال</option>
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
