@extends('main.manager')
   @section('content')

   <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        جدول خرد جمعی
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-body">
            <form class="dt_adv_search" method="get" action="{{ route('counsel.index') }}">
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
                       <select name="status" id="" class="form-control">
                        <option value="">همه</option>
                        <option {{ request("created")=="created"?"selected":"" }} value="created">{{ __("status.created") }}   </option>
                        <option {{ request("ready_to_show")=="ready_to_show"?"selected":"" }} value="ready_to_show">{{ __("status.ready_to_show") }}    </option>
                        <option {{ request("finish")=="finish"?"selected":"" }} value="finish">{{ __("status.finish") }}    </option>
                        <option {{ request("show")=="show"?"selected":"" }} value="show">{{ __("status.show") }}    </option>
                       </select>
                    </div>
                    {{--  <div class="col-12 col-sm-6 col-lg-4">
                      <label class="form-label">نام:

                      </label>
                      <input type="text" step="0.01" name="search" id="sea" value="{{ request('search') }}"  class="form-control dt-input dt-full-name" data-column="1" placeholder=" نام و موبایل و...  " data-column-index="0">
                    </div>  --}}
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
                        <div class="mb-0">
                            <br>
                      <button class="btn btn-primary">جست و جو</button>
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
                    <th>
                        <span class="tit">شماره</span>


                    </th>
                    <th>
                        <span class="tit"> عنوان</span>


                    </th>
                    <th>
                        <span class="tit">مهارت</span>


                    </th>
                    <th>
                        <span class="tit">وضعیت نمایش</span>
                    </th>
                    <th> <span class="tit"> وضعیت </span></th>
                    <th> <span class="tit"> پاسخ دهندگان</span></th>
                   <th> <span class="tit"> پاداش</span></th>
                    <th> <span class="tit"> تعداد سوال</span></th>
                    <th> <span class="tit"> تاریخ ایجاد</span></th>
                    <th>
                        <span class="tit"> عملکرد</span>
                    </th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @foreach ($counsels as $counsel)
                    {{--  @dd($counsel)  --}}
                    <tr>
                        <td><span>{{ $loop->iteration }}</span></td>
                        <td><span>{{ $counsel->title }}</span></td>
                        <td><span>{{implode( " - ",$counsel->skills()->pluck("name")->toArray())}}</span></td>
                         <td><span>{{ $counsel->active ? 'در حال نمایش' : 'غیر فعال' }}</span></td>
                        <td><span>{{ $counsel->status }}</span></td>
                        <td><span>0 </span></td>
                        <td><span>{{ __('arr.' . $counsel->reward) }}</span></td>
                        <td><span>
                                {{ $counsel->Counselquestions()->count() }}
                            </span></td>
                        <td><span>{{ Morilog\Jalali\Jalalian::forge($counsel->created_at)->format('Y-m-d') }}</span>
                        </td>
                        {{--  @dd($counsel->confirm)  --}}

                        <td>
                            @if(!$counsel->removed )
                            <form class="inline-block" action="{{ route('counsel.destroy', $counsel->id) }}"
                                method="post" data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    حذف
                                </button>
                            </form>
                            @else
                            {{ Morilog\Jalali\Jalalian::forge($counsel->removed)->format('Y-m-d') }}
                            حذف شده
                            @endif

                            @if(!$counsel->confirm )
                            <form class="inline-block" action="{{ route('confirm.counsel', $counsel->id) }}"
                                method="post" data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                @csrf
                                @method('post')
                                <button class="btn btn-success">
                                    تایید
                                </button>
                            </form>
                            @else
                            {{ Morilog\Jalali\Jalalian::forge($counsel->confirm)->format('Y-m-d') }}
                            تایید شده
                            @endif
                            <a  class="btn btn-primary" href="{{ route('counsel.show',$counsel->id) }}">جزئیات</a>
                        </td>


                    </tr>
                @endforeach





            </tbody>

        </table>



  </div>

   @endsection
