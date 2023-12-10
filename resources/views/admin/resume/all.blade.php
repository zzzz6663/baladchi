@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            جدول رزومه ها
            {{-- @if (request('category_id'))
        <span class="alert alert-primary">
            جستو جو در دسته بندی اصلی   `
            {{ $category->name }}
        </span>
        @endif --}}
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-body">
                <form class="dt_adv_search" method="get" action="{{ route('allresumes.index') }}">
                    @csrf
                    @method('get')
                    <div class="row">
                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <label class="form-label">نام:</label>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control dt-input dt-full-name" data-column="1"
                                        placeholder=" نام   ...  " data-column-index="0">
                                </div>
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <label class="form-label"> وضعیت</label>
                                   <select name="confirm" id="" class="form-control">
                                    <option value="">همه</option>
                                    <option {{ request("confirm")=="confirm"?"selected":"" }} value="confirm">تایید شده   </option>
                                    <option {{ request("wait")=="wait"?"selected":"" }} value="wait">در انتظار تایید   </option>
                                   </select>
                                </div>
                                {{-- <div class="col-12 col-sm-6 col-lg-4">
                      <label class="form-label">ایمیل:</label>
                      <input type="text" class="form-control dt-input text-start" dir="ltr" data-column="2" placeholder="demo@example.com" data-column-index="1">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                      <label class="form-label">شغل:</label>
                      <input type="text" class="form-control dt-input" data-column="3" placeholder="طراح وب" data-column-index="2">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                      <label class="form-label">شهر:</label>
                      <input type="text" class="form-control dt-input" data-column="4" placeholder="تبریز" data-column-index="3">
                    </div> --}}
                                {{-- <div class="col-12 col-sm-6 col-lg-4">
                      <label class="form-label">تاریخ:</label>
                      <div class="mb-0">
                        <input type="text" class="form-control dt-date flatpickr-range dt-input flatpickr-input" data-column="5" placeholder="تاریخ شروع تا پایان" data-column-index="4" name="dt_date" readonly="readonly">
                        <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date">
                        <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4">
                      </div>
                    </div> --}}
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="mb-1">
                                        <br>
                                        <button class="btn btn-primary">جستوجو</button>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="mb-1">
                                        <br>
                                        {{-- <a href="{{route('resume.create') }}" class="btn rounded-pill btn-secondary">
                        سوال جدید

                    </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table ">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>نام </th>
                            <th>نوع </th>
                            <th>عنوان </th>
                            <th>موقعیت </th>
                            <th>توضیحات </th>
                            <th>زمان </th>
                            <th>مدارک</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($resumes as $resume)
                            <tr>
                                <td>{{ $loop->iteration }} </td>

                                <td>
                                    {{ $resume->user->name }}
                                    {{ $resume->user->family }}
                                </td>



                                <td>
                                    {{ $resume->type }}
                                </td>
                                <td>
                                    {{ $resume->title }}
                                </td>
                                <td>
                                    {{ $resume->location }}
                                </td>


                                <td>
                                    {{ $resume->info }}
                                </td>

                                <td>
                                    {{ $resume->from }}-
                                    {{ $resume->to }}
                                </td>

                                {{--  <td>
                                    {{ Morilog\Jalali\Jalalian::forge($resume->created_at)->format('Y-m-d') }}
                                </td>  --}}
                                <td>
                                    @if( $resume->attach )
                                    <a target="__blank" href="{{$resume->attach()}}" class="btn btn-dark"> مدرک</a>
                                    @endif
                                </td>
                                <td>
                                    @if( $resume->confirm)تایید شده در
                                    {{ Morilog\Jalali\Jalalian::forge($resume->confirm)->format('Y-m-d') }}
                                    @else
                                    <form action="{{route("confirm.resume",$resume->id)}}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="submit" class="btn btn-success" value="تایید">
                                    </form>
                                    @endif

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-12">
                        {{ $resumes->appends(Request::all())->links('admin.section.pagination') }}
                    </div>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->


    </div>
@endsection
