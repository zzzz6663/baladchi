@extends('main.manager')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"></span> ساخت مهارت جدید
        @if($parent)
        برای
   <span class="alert alert-success">
    {{ $parent->name }}
   </span>
        @endif
    </h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">

                <div class="card-body">
                    @include('main.error')
                    <form action="{{ route('skill.store') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">نام مهارت </label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="basic-default-name" placeholder="      مثلا صافکار">
                                <input type="text" name="type" value="{{ request('type',"parent") }}" hidden>
                                <input type="text" name="parent_id" value="{{ request('parent_id',null) }}" hidden>
                            </div>
                        </div>

                        {{--  <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="parent_id">انتخاب مهارت پدر </label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-control" id="">
                                    <option value="">یک مورد را انتخاب کنید </option>
                                    @foreach (App\Models\Skill::where('parent_id',null)->get() as $skill )
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  --}}
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a href="{{ route("skill.index") }}" class="btn btn-danger">برگشت</a>
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
