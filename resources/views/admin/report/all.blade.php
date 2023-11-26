@extends('main.manager')
   @section('content')

   <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        جدول     گزارشات
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
            <form class="dt_adv_search" method="get" action="{{ route('report.index') }}">
                @csrf
                @method('get')
              <div class="row">
                <div class="col-12">
                  <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-4">
                      <label class="form-label">نام:</label>
                      <input type="text" name="search" value="{{ request('search') }}"  class="form-control dt-input dt-full-name" data-column="1" placeholder=" نام   ...  " data-column-index="0">
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
                    {{-- <a href="{{route('report.create') }}" class="btn rounded-pill btn-secondary">
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
              <th>گزارش دهنده </th>
              <th>نوع </th>
              <th>موارد  </th>
              <th>آگهی  </th>
              <th>توضیحات  </th>
              <th>تاریخ</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($reports as $report )
            <tr>
                <td>{{ $loop->iteration }} </td>

                <td>
                        {{ $report->user->name }}
                        {{ $report->user->family }}
                </td>

                <td>{{ __('arr.'.$report->mode) }} </td>
                <td>
                    ({{ $report->content?__('arr.content'):"" }})
                    ({{ $report->problem?__('arr.problem'):"" }})
                    ({{ $report->scam?__('arr.scam'):"" }})
                    (  {{ $report->other?__('arr.other'):"" }})
                </td>
                <td>
                  @if($report->mode=="advertise")
                    <a href="{{ route('advertise.show',$report->advertise->id) }}">
                        {{ $report->advertise->title }}
                    </a>
                  @endif

                  @if($report->mode=="deposit")
                  <a href="{{ route('advertise.show',$report->deposit->advertise->id) }}">
                      {{ $report->deposit->advertise->title }}
                  </a>
                @endif
                </td>

                <td>
                        {{ $report->info }}
                </td>

                <td>
                    {{  Morilog\Jalali\Jalalian::forge( $report->created_at)->format('Y-m-d') }}
                </td>

              </tr>
            @endforeach

          </tbody>
        </table>
        <div class="row">
            <div class="col-lg-12">
                {{ $reports->appends(Request::all())->links('admin.section.pagination') }}
            </div>
        </div>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->


  </div>

   @endsection
