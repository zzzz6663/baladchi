@extends('main.panel')
@section('content')
    <div class="search-title">
        <h3>علاقه مندی ها</h3>
        {{--  <div class="pur-search-form">
        <form action="{{ route('panel.faves') }}" method="get">
            @csrf
            @method('get')
            <input type="text" name="search" value="{{ request('search') }}" class="text" placeholder="جست و جو در بین علاقه مندی ها">
            <button class="search-button">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.58341 17.5C13.9557 17.5 17.5001 13.9555 17.5001 9.58329C17.5001 5.21104 13.9557 1.66663 9.58341 1.66663C5.21116 1.66663 1.66675 5.21104 1.66675 9.58329C1.66675 13.9555 5.21116 17.5 9.58341 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path opacity="0.4" d="M18.3334 18.3333L16.6667 16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>

            </button>
        </form>
    </div>  --}}
    </div>

    <div class="fav-list">
        <div class="row">
            @foreach ($fave_ads as $advertise)
                <div class="col-xxl-3 col-lg-4 col-md-6">

                    @include('home.ads.single')
                </div>
            @endforeach
        </div>
    </div>

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
                            <span class="tit">نام تبلغ </span>
                        </th>
                        <th>
                            <span class="tit">یادداشت </span>
                        </th>
                        <th>
                            <span class="tit">مشاهده</span>
                        </th>
                        <th>
                            <span class="tit">تاریخ</span>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user->memos as $memo)
                    <tr>
                        <td>
                            {{ $loop->iteration  }}
                        </td>
                        <td>
                            {{ $memo->advertise->title  }}
                        </td>
                        <td>
                            {{ $memo->memo  }}
                        </td>
                        <td>
                            <a href="{{ route("single.ad",$memo->advertise->id) }}">مشاهده</a>
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
@endsection
