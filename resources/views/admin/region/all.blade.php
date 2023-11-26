@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            جدول     مناطق

        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-body">
                <form class="dt_adv_search" method="get" action="{{ route('region.index') }}">
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
                                        <a href="{{ route('region.create') }}" class="btn rounded-pill btn-secondary">
                                            زیر
                                            دسته جدید
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @if(request("city_id"))

                <br>
                <div class="row ">
                    <div class="col-lg-12">
                        مناطق شهر
                     <span class="alert alert-success alert-style-light">
                        {{ $city->name }}
                     </span>
                     <a href="{{ route("region.index") }}"  class="btn btn-danger">
                        همه مناطق
                     </a>
                    </div>
                </div>
                @endif

            </div>

            <div class="table-responsive text-nowrap">
                <table class="table ">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>نام </th>
                            <th>شهر </th>
                            <th>عمل‌ها</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($regions as $region)
                            <tr>
                                <td>{{ $loop->iteration }} </td>

                                <td> <strong> {{ $region->name }}</strong></td>
                                <td> <strong>
                                <a href="{{ route("region.index",["city_id"=>$region->city_id]) }}">
                                    {{ $region->city->name }}
                                </a>
                                </strong></td>

                                <td>
                                    <a class="dropdown-item" href="{{ route('region.edit', $region->id) }}"><i
                                            class="bx bx-edit-alt me-1"></i> ویرایش</a>
                                    {{-- <form  onclick="return confirm('Are you sure?')" action="{{ route('region.destroy',$region->id) }}" method="post">
                      @csrf
                      <button class="dropdown-item"><i class="bx bx-trash me-1"></i> حذف</button>
                      @method('delete')
                  </form> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->


    </div>
@endsection
