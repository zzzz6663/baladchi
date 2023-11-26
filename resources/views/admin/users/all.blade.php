@extends('main.manager')
   @section('content')

   <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        جدول کاربران
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-body">
            <form class="dt_adv_search" method="get" action="{{ route('user.index') }}">
                @csrf
                @method('get')
              <div class="row">
                <div class="col-12">
                  <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-4">
                      <label class="form-label">نام:

                        {{--  {{  Carbon\Carbon::now()->addDays(8)->format('Y-m-d') }}  --}}
                      </label>
                      {{-- <input type="text" name="search"   pattern="[0-9]{10}" required value="{{ request('search') }}"  class="form-control dt-input dt-full-name" data-column="1" placeholder=" نام و موبایل و...  " data-column-index="0"> --}}
                      <input type="text" step="0.01" name="search" id="sea" value="{{ request('search') }}"  class="form-control dt-input dt-full-name" data-column="1" placeholder=" نام و موبایل و...  " data-column-index="0">
                      {{--  <input min="" type="date"  name="search"  value="{{  Carbon\Carbon::now()->addDays(8) }}"  class="form-control dt-input dt-full-name"  >  --}}

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
              <th>id</th>
              <th>نام </th>
              <th>همراه</th>
              <th>استان </th>
              <th>رمز عبور</th>
              <th>تایید  </th>
              <th>تاریخ </th>
              <th>عمل‌ها</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($users as $user )
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $user->name }}
                    {{ $user->family }}
                </td>
                <td>
                    {{ $user->mobile }}
                </td>
                <td>
                    @if($user->province)
                    {{ $user->province->name }}
                    @endif
                    @if($user->city)
                    {{ $user->city->name }}
                    @endif
                </td>
                <td>
                    {{ $user->password }}
                </td>

                <td>
                    @if($user->authenticated)
                    {{  \Morilog\Jalali\Jalalian::forge($user->authenticated)->format('Y-m-d') }}
                    @else
                    <form action="{{ route('user.authenticate',$user->id) }}" method="post">
                        @csrf
                        @method('post')
                        <input type="submit" class="btn btn-success" value="تایید حساب کاربری ">
                    </form>
                    @endif

                </td>
                <td>
                    {{  \Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y-m-d') }}
                </td>
                <td>
                    <a class="dropdown-item" href="{{ route('user.show',$user->id) }}"><i class="bx bx-edit-alt me-1"></i> مشاهده</a>
                    <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">  ویرایش</a>
                </td>
              </tr>
            @endforeach


          </tbody>
        </table>

        <div class="row">
            <div class="col-lg-12">
                {{ $users->appends(Request::all())->links('admin.section.pagination') }}
            </div>
        </div>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->


  </div>

   @endsection
