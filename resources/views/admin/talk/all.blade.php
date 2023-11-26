@extends('main.manager')
   @section('content')

   <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        جدول     مشاوره ها
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-body">
            <form class="dt_adv_search" method="get" action="{{ route('talk.index') }}">
                @csrf
                @method('get')
              <div class="row">
                <div class="col-12">
                  <div class="row g-3">
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
                    {{--  <div class="col-12 col-sm-6 col-lg-4">
                        <div class="mb-0">
                            <br>
                      <button class="btn btn-primary">جست و جو</button>
                      </div>
                    </div>  --}}
                  </div>
                </div>
              </div>
            </form>
          </div>

      <div class="table-responsive text-nowrap">






        <table class="table">
            <thead>
                <tr>
                    <th>
                        <span class="tit">شماره</span>
                    </th>
                    <th>
                        <span class="tit"> مشاور</span>
                    </th>

                    <th>
                        <span class="tit"> مشتری</span>
                    </th>
                    <th>
                        <span class="tit"> قیمت</span>
                    </th>
                    <th>
                        <span class="tit">تاریخ</span>
                    </th>
                    <th>
                        <span class="tit">وضعیت</span>
                    </th>
                    <th>
                        <span class="tit">اقدام </span>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($talks as $talk)
                    <tr>
                        <td><span>{{ $loop->iteration }}</span></td>
                        <td><a href="{{ route("single.user",$talk->talker->id) }}">
                                {{ $talk->talker->name }}
                                {{ $talk->talker->family }}
                            </a>
                        </td>

                        <td><a href="{{ route("single.user",$talk->user->id) }}">
                            {{ $talk->user->name }}
                            {{ $talk->user->family }}
                        </a>
                    </td>
                        <td>
                            <span>
                                {{ number_format($talk->amount) }}
                                تومان
                            </span>
                        </td>
                        <td>
                            <span>
                            {{ Morilog\Jalali\Jalalian::forge($talk->created_at)->format("Y-m-d") }}
                            </span>
                        </td>
                        <td>
                            <span>
                            {{ __("arr.".$talk->status) }}
                            </span>
                        </td>
                        <td>
                            <span>
                                @if(!$talk->confirm  && $talk->status=="payed")
                                <form class="inline-block" action="{{ route('confirm.talk', $talk->id) }}"
                                    method="post">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-success">
                                        تایید
                                    </button>
                                </form>
                                @else
                                {{ Morilog\Jalali\Jalalian::forge($talk->confirm)->format('Y-m-d') }}
                                تایید شده
                                @endif
                            </span>
                        </td>

                    </tr>
                @endforeach


            </tbody>

        </table>


  </div>

   @endsection
