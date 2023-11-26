@extends('main.panel')
@section('content')
    <div class="dash-title">
        <h3>
            ویرایش آگهی
        </h3>
    </div>
    <div id="">
        <form action="" id="advertise_form">
            <div class="dash-main-content">
                <div class="takmil" id="edit_form_r" data-id="{{ $id }}" data-type="{{ $type }}"
                    data-ads="{{ $advertise->id }}">
                    <div class="section" id="form_advertise">
                    </div>

                </div>
            </div>
        </form>

        @if($advertise->notif)


        <div class="dash-main-content">
            <div class="tra-table">

                <h4 class="dash-in-title">تغییرات آگهی ها </h4>

                <table>
                    <thead>
                        <tr>
                            <th>
                                <span class="tit">شماره</span>
                            </th>

                            <th>
                                <span class="tit">یادداشت </span>
                            </th>

                            <th>
                                <span class="tit">تاریخ </span>
                            </th>


                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($advertise->memos as $memo)
                        <tr>
                            <td>
                                {{ $loop->iteration  }}
                            </td>

                            <td>
                                {{ $memo->memo  }}
                            </td>

                            <td>
                                {{Morilog\Jalali\Jalalian::forge( $memo->created_at)->format("Y-m-d H:i")  }}
                            </td>
                        </tr>
                        @endforeach




                    </tbody>

                </table>
            </div>
        </div>
        @endif

    </div>
@endsection
