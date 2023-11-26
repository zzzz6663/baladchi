@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            جدول تنظیمات
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

            </div>

            <div class="table-responsive text-nowrap">
                <table class="table ">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>نام </th>
                            <th>مقدار </th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($settings as $setting)
                            <tr>
                                <td>{{ $loop->iteration }} </td>

                                <td>
                                    {{ $setting->name }}
                                </td>
                                <td>
                                    {{ $setting->val }}
                                </td>

                                <td>
                                  <a href="{{ route("setting.edit",$setting->id) }}" class="btn btn-success">ویرایش</a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-12">
                        {{ $settings->appends(Request::all())->links('admin.section.pagination') }}
                    </div>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->


    </div>
@endsection
