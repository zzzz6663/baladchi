@extends('main.site')
@section('content')
    <div class="container">

        <div id="dash-show">
            <div class="tab-nav">
                <ul>
                    <li class="active"><span>ارتقا</span></li>
                    <li class=""><span>آمار</span></li>
                </ul>
            </div>
            <div class="tab-container">
                <ul>
                    <li class="active">
                        <div class="ertegha">
                            <div class="ertegha-options">
                                @if (!$advertise->vip)
                                    <div class="ertegha-option">
                                        <input form="promotion" type="checkbox" name="vip" id="vip_price"
                                            value="{{ $user->vip_price() }}" class="check_pr">
                                        <label for="vip_price">
                                            <div class="check-box">
                                                <div class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.66845 7.11451L10.7964 0.98584L11.7398 1.92851L4.66845 8.99984L0.425781 4.75717L1.36845 3.81451L4.66845 7.11451Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h4>آگهی ویژه</h4>
                                                <p>آگهی شما تا زمان دریافت آگهی تازه‌تر در صفحه اصلی سایت با علامت تاج نمایش
                                                    داده می‌شود.</p>
                                            </div>
                                            <div class="price">
                                                <span>

                                                    {{ number_format($user->vip_price()) }}
                                                    تومان
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                @endif
                                @if (!$advertise->sort)
                                    <div class="ertegha-option">
                                        <input form="promotion" type="checkbox" name="sort" id="sort_price"
                                            value="{{ $user->sort_price() }}" class="check_pr">
                                        <label for="sort_price">
                                            <div class="check-box">
                                                <div class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.66845 7.11451L10.7964 0.98584L11.7398 1.92851L4.66845 8.99984L0.425781 4.75717L1.36845 3.81451L4.66845 7.11451Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h4>
                                                    نردبان آگهی

                                                </h4>
                                                <p>
                                                    آگهی شما به مدت سه روز در بالای همه آگهی ها قرار خواهد گرفت

                                                </p>

                                            </div>
                                            <div class="price">
                                                <span>
                                                    {{ number_format($user->sort_price()) }}
                                                    تومان
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                @endif
                                @if (!$advertise->notif)
                                    <div class="ertegha-option">
                                        <input form="promotion" type="checkbox" name="notif" id="notif_price"
                                            value="{{ $user->notif_price() }}" class="check_pr">
                                        <label for="notif_price">
                                            <div class="check-box">
                                                <div class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.66845 7.11451L10.7964 0.98584L11.7398 1.92851L4.66845 8.99984L0.425781 4.75717L1.36845 3.81451L4.66845 7.11451Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h4>ارسال اعلان برای کاربرانی که آگهی شما را لایک کرده اند <span>(
                                                        {{ $advertise->faves_users->count() }}
                                                        نفر)</span></h4>
                                                <p>
                                                    در هنگام ویرایش باکس مخصوص اعلانات برا شما باز خواهد شد و با هر بار
                                                    ویرایش اعلان برای کاربرانی که آگهی شما را به لیست علاقه مندی ها اضافه
                                                    کرده اند ارسال خواهد شد
                                                </p>
                                            </div>
                                            <div class="price">
                                                <span>
                                                    {{ number_format($user->notif_price()) }}
                                                    تومان
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                @else
                                    <div class="ertegha-option">
                                        <label for="">

                                            <div class="text">
                                                <h4>
                                                    توضیحات تغییر در آگهی

                                                </h4>
                                                <p>
                                                    در صورتیکه مایلید کسانیکه آگهی شما را ذخیره کرده اند از آخرین تغییرات با خیر بشوند تغییرات خود را در کادر
                                                    زیر بنویسید
                                                </p>
                                                <br>
                                                <br>
                                                <div class="input-label textarea big">

                                                    <label for=""> توضیحات </label>
                                                    <textarea name="info" id="memo" cols="30" rows="10"></textarea>

                                                </div>
                                                <div class="">
                                                    <div class="footer-section">
                                                        <div class="pair-button">
                                                                <span class="mid-button blue pointer insert_new_memo" data-id="{{ $advertise->id  }}" id=" "
                                                                    value=" ">
                                                                    ارسال برای کاربران
                                                                   ( {{ $advertise->faves_users()->count() }}
                                                                        کاربر
                                                                   )

                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price">

                                            </div>
                                        </label>



                                    </div>
                                @endif

                                @if ($advertise->expired())
                                    <div class="ertegha-option">
                                        <input form="promotion" type="checkbox" name="holdover" id="holdover_price"
                                            value="{{ $user->holdover_price() }}" class="check_pr">
                                        <label for="holdover_price">
                                            <div class="check-box">
                                                <div class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.66845 7.11451L10.7964 0.98584L11.7398 1.92851L4.66845 8.99984L0.425781 4.75717L1.36845 3.81451L4.66845 7.11451Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h4>تمدید</h4>
                                                <p>آگهی شما قبل از اینکه منقضی شود، تمدید می‌گردد و برای یک ماه دیگر روی
                                                    دیوار باقی خواهد ماند.</p>
                                            </div>
                                            <div class="price">
                                                <span>
                                                    {{ number_format($user->holdover_price()) }}
                                                    تومان
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                @endif
                                <div class="pre-pay-footer">
                                    <div class="right-secd">

                                        <div class="input-toggle text red send_pay_p" style="display:none">
                                            <input form="promotion" type="checkbox" name="pay_from_cash"
                                                class="pay_from_cash2  " data-balance="{{ $user->balance }}"
                                                id="pay_from_cash" {{ $user->balance == 0 ? 'disabled' : '' }}
                                                name="from-dep">
                                            <label for="pay_from_cash">
                                                <div class="d-flex">
                                                    <span class="icon">
                                                        <svg width="20" height="18" viewBox="0 0 20 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16 4H19C19.2652 4 19.5196 4.10536 19.7071 4.29289C19.8946 4.48043 20 4.73478 20 5V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H16V4ZM2 6V16H18V6H2ZM2 2V4H14V2H2ZM13 10H16V12H13V10Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span>کسر از کیف پول</span>
                                                    <span class="num">
                                                        <b>
                                                            {{ number_format($user->balance) }}
                                                            تومان
                                                        </b>
                                                    </span>
                                                </div>
                                                <div class="togg">
                                                    <span></span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ertegha-basket">
                                <div class="class-price-box">
                                    <h4>مبلغ قابل پرداخت</h4>

                                    <div class="class-price">
                                        {{--  <span class="percent">۹%</span>  --}}
                                        <span class="res_pay">0 </span>
                                        <span class="un">تومان</span>
                                    </div>


                                    <div class="circle-line">
                                        <span></span>
                                    </div>

                                    <form id="promotion" action="{{ route('send.bill') }}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="text" name="type" value="promotion" hidden>
                                        <input type="text" name="advertise_id" value="{{ $advertise->id }}" hidden>
                                        <button class="icon-button green full send_pay_p" style="display:none">
                                            <span>پرداخت</span>
                                            <span class="icon">
                                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8 0L15.298 2.28C15.5015 2.34354 15.6794 2.47048 15.8057 2.64229C15.932 2.81409 16.0001 3.02177 16 3.235V5H18C18.2652 5 18.5196 5.10536 18.7071 5.29289C18.8946 5.48043 19 5.73478 19 6V14C19 14.2652 18.8946 14.5196 18.7071 14.7071C18.5196 14.8946 18.2652 15 18 15L14.78 15.001C14.393 15.511 13.923 15.961 13.38 16.331L8 20L2.62 16.332C1.81252 15.7815 1.15175 15.042 0.69514 14.1779C0.238528 13.3138 -0.000101223 12.3513 3.22098e-08 11.374V3.235C0.000120606 3.02194 0.0682866 2.81449 0.194562 2.64289C0.320838 2.47128 0.498622 2.34449 0.702 2.281L8 0ZM8 2.094L2 3.97V11.374C1.99986 11.9862 2.14025 12.5903 2.41036 13.1397C2.68048 13.6892 3.07311 14.1692 3.558 14.543L3.747 14.679L8 17.58L11.782 15H7C6.73478 15 6.48043 14.8946 6.29289 14.7071C6.10536 14.5196 6 14.2652 6 14V6C6 5.73478 6.10536 5.48043 6.29289 5.29289C6.48043 5.10536 6.73478 5 7 5H14V3.97L8 2.094ZM8 10V13H17V10H8ZM8 8H17V7H8V8Z"
                                                        fill="white"></path>
                                                </svg>
                                            </span>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <div class="ad-chart">
                            <div class="stats">
                                <div class="top">
                                    <h4>آمار آگهی</h4>
                                    <p>آمار تعداد بازدید روزانه آگهی شما از زمان انتشار آگهی در این نمودار قابل مشاهده است.
                                    </p>
                                </div>
                                <div class="icon-stats">
                                    <div class="icon-stat">
                                        <div class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.5819 11.9999C15.5819 13.9799 13.9819 15.5799 12.0019 15.5799C10.0219 15.5799 8.42188 13.9799 8.42188 11.9999C8.42188 10.0199 10.0219 8.41992 12.0019 8.41992C13.9819 8.41992 15.5819 10.0199 15.5819 11.9999Z"
                                                    stroke="#4F4F4F" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M11.9998 20.2697C15.5298 20.2697 18.8198 18.1897 21.1098 14.5897C22.0098 13.1797 22.0098 10.8097 21.1098 9.39973C18.8198 5.79973 15.5298 3.71973 11.9998 3.71973C8.46984 3.71973 5.17984 5.79973 2.88984 9.39973C1.98984 10.8097 1.98984 13.1797 2.88984 14.5897C5.17984 18.1897 8.46984 20.2697 11.9998 20.2697Z"
                                                    stroke="#4F4F4F" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>

                                        </div>
                                        <div class="val">
                                            بازدید کلی:
                                            {{ $advertise->seen_user()->count() }}
                                        </div>
                                    </div>
                                    <div class="icon-stat">
                                        <div class="icon">
                                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11 19.6501C10.69 19.6501 10.39 19.6101 10.14 19.5201C6.32 18.2101 0.25 13.5601 0.25 6.6901C0.25 3.1901 3.08 0.350098 6.56 0.350098C8.25 0.350098 9.83 1.0101 11 2.1901C12.17 1.0101 13.75 0.350098 15.44 0.350098C18.92 0.350098 21.75 3.2001 21.75 6.6901C21.75 13.5701 15.68 18.2101 11.86 19.5201C11.61 19.6101 11.31 19.6501 11 19.6501ZM6.56 1.8501C3.91 1.8501 1.75 4.0201 1.75 6.6901C1.75 13.5201 8.32 17.3201 10.63 18.1101C10.81 18.1701 11.2 18.1701 11.38 18.1101C13.68 17.3201 20.26 13.5301 20.26 6.6901C20.26 4.0201 18.1 1.8501 15.45 1.8501C13.93 1.8501 12.52 2.5601 11.61 3.7901C11.33 4.1701 10.69 4.1701 10.41 3.7901C9.48 2.5501 8.08 1.8501 6.56 1.8501Z"
                                                    fill="#292D32"></path>
                                            </svg>
                                        </div>
                                        <div class="val">
                                            لایک ها : {{ $advertise->faves_users()->count() }}
                                        </div>
                                    </div>
                                    <div class="icon-stat">
                                        <div class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.6216 13.0699C20.2416 13.0699 19.9216 12.7799 19.8716 12.3999C19.6316 10.1399 18.4116 8.08986 16.5316 6.78986C16.1916 6.54986 16.1116 6.08986 16.3416 5.74986C16.5816 5.40986 17.0516 5.32986 17.3816 5.55986C19.6216 7.10986 21.0616 9.54986 21.3516 12.2399C21.3916 12.6499 21.1016 13.0199 20.6816 13.0699C20.6716 13.0699 20.6416 13.0699 20.6216 13.0699Z"
                                                    fill="#292D32"></path>
                                                <path
                                                    d="M3.49186 13.1198C3.46186 13.1198 3.44186 13.1198 3.41186 13.1198C3.00186 13.0698 2.70186 12.6998 2.74186 12.2898C3.01186 9.59977 4.44186 7.16977 6.65186 5.59977C6.99186 5.35977 7.46186 5.43977 7.70186 5.77977C7.94186 6.11977 7.86186 6.58977 7.52186 6.82977C5.66186 8.13977 4.46186 10.1898 4.23186 12.4498C4.20186 12.8298 3.87186 13.1198 3.49186 13.1198Z"
                                                    fill="#292D32"></path>
                                                <path
                                                    d="M12.06 22.61C10.58 22.61 9.16997 22.27 7.84997 21.61C7.47997 21.42 7.32997 20.97 7.51997 20.6C7.70997 20.23 8.15997 20.08 8.52997 20.27C10.69 21.36 13.29 21.38 15.47 20.33C15.84 20.15 16.29 20.31 16.47 20.68C16.65 21.05 16.49 21.5 16.12 21.68C14.84 22.3 13.48 22.61 12.06 22.61Z"
                                                    fill="#292D32"></path>
                                                <path
                                                    d="M12.0613 8.43988C10.1113 8.43988 8.53125 6.85988 8.53125 4.90988C8.53125 2.95988 10.1113 1.37988 12.0613 1.37988C14.0113 1.37988 15.5913 2.95988 15.5913 4.90988C15.5913 6.85988 14.0013 8.43988 12.0613 8.43988ZM12.0613 2.88988C10.9413 2.88988 10.0312 3.79988 10.0312 4.91988C10.0312 6.03988 10.9413 6.94988 12.0613 6.94988C13.1813 6.94988 14.0913 6.03988 14.0913 4.91988C14.0913 3.79988 13.1713 2.88988 12.0613 2.88988Z"
                                                    fill="#292D32"></path>
                                                <path
                                                    d="M4.83078 20.6699C2.88078 20.6699 1.30078 19.0899 1.30078 17.1399C1.30078 15.1999 2.88078 13.6099 4.83078 13.6099C6.78078 13.6099 8.36078 15.1899 8.36078 17.1399C8.36078 19.0799 6.78078 20.6699 4.83078 20.6699ZM4.83078 15.1099C3.71078 15.1099 2.80078 16.0199 2.80078 17.1399C2.80078 18.2599 3.71078 19.1699 4.83078 19.1699C5.95078 19.1699 6.86078 18.2599 6.86078 17.1399C6.86078 16.0199 5.95078 15.1099 4.83078 15.1099Z"
                                                    fill="#292D32"></path>
                                                <path
                                                    d="M19.1706 20.6699C17.2206 20.6699 15.6406 19.0899 15.6406 17.1399C15.6406 15.1999 17.2206 13.6099 19.1706 13.6099C21.1206 13.6099 22.7006 15.1899 22.7006 17.1399C22.6906 19.0799 21.1106 20.6699 19.1706 20.6699ZM19.1706 15.1099C18.0506 15.1099 17.1406 16.0199 17.1406 17.1399C17.1406 18.2599 18.0506 19.1699 19.1706 19.1699C20.2906 19.1699 21.2006 18.2599 21.2006 17.1399C21.1906 16.0199 20.2906 15.1099 19.1706 15.1099Z"
                                                    fill="#292D32"></path>
                                            </svg>
                                        </div>
                                        <div class="val">
                                            اشتراک گذاری :

                                            {{ $advertise->share }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stat">
                                <div id="adchart">

                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

    </div>
    <script src="/home/js/apexcharts.min.js"></script>
    <script>
        var app = @json($days);
        var options = {
            series: [{
                name: ' بازدید',
                data: @json($amar)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#029591', '#66DA26', '#546E7A', '#E91E63', '#FF9800'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '32%',
                    borderRadius: 12,
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                show: false,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: app,
                labels: {
                    style: {
                        fontSize: '11px',
                        color: '#4F4F4F',
                        fontFamily: 'iranyekan'
                    }
                }
            },
            yaxis: {

            },
            grid: {
                show: false
            },
            fill: {
                opacity: 1
            },
            // tooltip: {
            //   y: {
            //     formatter: function (val) {
            //       return   val + " نفر"
            //     }
            //   }
            // }
            tooltip: {
                custom: function({
                    series,
                    seriesIndex,
                    dataPointIndex,
                    w
                }) {
                    return '<div class="arrow_box">' +
                        '<span>' + series[seriesIndex][dataPointIndex] + ' نفر</span>' +
                        '</div>'
                }
            },
            responsive: [{
                breakpoint: 576,
                options: {
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '32%',
                            borderRadius: 8,
                            endingShape: 'rounded'
                        },
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#adchart"), options);
        chart.render();
    </script>
@endsection
