@extends('main.panel')
@section('content')
    <div id="dashmain">
        <div class="search-title">
            <h3>بیعانه</h3>

        </div>
        <div class="pre-sale-lists" id="deposit_sec">
            <div class="tab-nav">
                <ul>
                    <li class="deposit_sec_li"><span>مشاوره دهنده </span></li>
                    <li class="active deposit_sec_li"><span>مشاوره گیرنده</span></li>
                </ul>
            </div>
            <div class="tab-container">
                <ul>
                    <li class="active">

                        <div class="dash-main-content">
                            <div class="tra-table">

                                <h4 class="dash-in-title">تاریخچه مشاوره ها</h4>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="tit">شماره</span>
                                            </th>
                                            <th>
                                                <span class="tit"> مشاور</span>
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
                                        @foreach ($user_talk as $talk)
                                            <tr>
                                                <td><span>{{ $loop->iteration }}</span></td>
                                                <td><a href="{{ route("single.user",$talk->talker->id) }}">
                                                        {{ $talk->talker->name }}
                                                        {{ $talk->talker->family }}
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
                        </div>
                    </li>

                    <li>
                        <div class="dash-main-content">
                            <div class="tra-table">

                                <h4 class="dash-in-title">تاریخچه مشتری ها</h4>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="tit">شماره</span>
                                            </th>
                                            <th>
                                                <span class="tit"> مشاور</span>
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
                                        @foreach ($to_talk as $talk)
                                            <tr>
                                                <td><span>{{ $loop->iteration }}</span></td>
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
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>







    </div>
@endsection
