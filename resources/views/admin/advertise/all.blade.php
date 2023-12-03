
@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            جدول آگهی ها
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-body">
                <form class="dt_adv_search" method="get" action="{{ route('advertise.index') }}">
                    @csrf
                    @method('get')
                    <div class="row">
                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <label class="form-label">نام:</label>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control dt-input dt-full-name" data-column="1"
                                        placeholder=" نام و موبایل و...  " data-column-index="0">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-4">
                                    <label class="form-label"> وضعیت</label>
                                   <select name="confirm" id="" class="form-control">
                                    <option value="">همه</option>
                                    <option {{ request("confirm")=="confirmed"?"selected":"" }} value="confirmed">تایید شده ها </option>
                                    <option {{ request("confirm")=="rejected"?"selected":"" }} value="rejected">رد شده ها  </option>
                                    <option {{ request("confirm")=="null"?"selected":"" }} value="null">در انتظار تایید   </option>

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
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive text-nowrap">
                        <table class="table ">
                            <thead class="table-dark">
                                <tr>
                                    <th>id</th>
                                    <th>تایتل </th>

                                    <th>نام </th>
                                    <th>همراه  </th>
                                    <th>محل </th>
                                    <th>vip </th>
                                    <th>دسته بندی </th>
                                    <th>تاریخ </th>
                                    <th>انقضا </th>
                                    <th>عمل‌ها</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($advertises as $advertise)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>
                                            {{ $advertise->title}}
                                        </td>
                                        <td>
                                            {{ $advertise->user->name }}
                                            {{ $advertise->user->family }}
                                        </td>
                                        <td>
                                            {{ $advertise->user->mobile }}
                                        </td>
                                        <td>
                                            {{ $advertise->city->name}}
                                        </td>
                                        <td>

                                            <span class="alert alert-{{ $advertise->vip==1?'success':'danger'}}">
                                                      {{ $advertise->vip==1?'vip':'معمولی'}}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $advertise->category->name }}
                                            <br>
                                            {{ $advertise->subset->name }}
                                            @if($advertise->telic)
                                            <br>
                                            {{ $advertise->telic->name }}
                                            @endif
                                        </td>

                                        <td>
                                            {{  Morilog\Jalali\Jalalian::forge( $advertise->created_at)->format('Y-m-d') }}
                                        </td>

                                        <td>
                                            {{  Morilog\Jalali\Jalalian::forge( $advertise->expired_at)->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            @if(!$advertise->confirm)
                                            <form action="{{ route('change.advertise.status',$advertise->id) }}" method="post">
                                            @csrf
                                            @method('post')
                                                <input type="submit"  name="confirmed" class="btn btn-success" value="تایید ">
                                                <input type="submit" name="rejected" class="btn btn-danger" value="رد ">
                                            </form>
                                            @else
                                            {{  Morilog\Jalali\Jalalian::forge( $advertise->confirm)->format('Y-m-d') }}
                                            -
                                            {{ __('status.'.$advertise->status) }}
                                            @endif
                                            <a href="{{ route('advertise.show',$advertise->id) }}" class="btn btn-primary">جزئیات</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-12">
                                {{ $advertises->appends(Request::all())->links('admin.section.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->


    </div>
@endsection
