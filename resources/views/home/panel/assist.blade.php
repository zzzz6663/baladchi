@extends('main.panel')
@section('content')
    <div id="dashmaسin">



        <div class="dash-main-content">
            <div class="tra-table">


                <div class="pre-sale-lists" id="deposit_sec">
                    <div class="tab-nav">
                        <ul>
                            <li class="deposit_sec_li"  ><span>ارسال شده</span></li>
                            <li class="active deposit_sec_li active"><span> دریافت شده</span></li>
                        </ul>
                    </div>
                    <div class="tab-container">
                        <ul>
                            <li >
                                <h4 class="dash-in-title">پیشنهاد های ارسال شده </h4>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="tit">شماره</span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> به</span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> عنوان</span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit">مدت </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit">حقوق</span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> توضیحات </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> تماس </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> تاریخ </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit">وضعیت </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($my_assists as $my)
                                            <tr>
                                                <td><span>{{ $loop->iteration }}</span></td>
                                                <td><span>

                                                        @if ($my->to)
                                                            {{ $my->to->name }} {{ $my->to->family }}
                                                        @endif
                                                    </span></td>
                                                <td><span> {{ $my->title }}</span></td>
                                                <td><span> {{ __('arr.' . $my->duration) }}</span></td>
                                                <td><span> {{ $my->salary }}</span></td>
                                                <td><span>
                                                    @include("home.panel.assist_pop",['id'=>$my->id,'info'=>$my->info])
                                                    <span class="icon show_op pointer" data-id="{{ $my->id }}">
                                                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.0006 0C16.3926 0 20.8786 3.88 21.8196 9C20.8796 14.12 16.3926 18 11.0006 18C5.60864 18 1.12264 14.12 0.181641 9C1.12164 3.88 5.60864 0 11.0006 0ZM11.0006 16C13.0401 15.9996 15.019 15.3068 16.6135 14.0352C18.208 12.7635 19.3235 10.9883 19.7776 9C19.3219 7.0133 18.2056 5.24 16.6113 3.97003C15.017 2.70005 13.0389 2.00853 11.0006 2.00853C8.96234 2.00853 6.98433 2.70005 5.39002 3.97003C3.7957 5.24 2.67941 7.0133 2.22364 9C2.67774 10.9883 3.79331 12.7635 5.38778 14.0352C6.98225 15.3068 8.96117 15.9996 11.0006 16ZM11.0006 13.5C9.80717 13.5 8.66257 13.0259 7.81866 12.182C6.97475 11.3381 6.50064 10.1935 6.50064 9C6.50064 7.80653 6.97475 6.66193 7.81866 5.81802C8.66257 4.97411 9.80717 4.5 11.0006 4.5C12.1941 4.5 13.3387 4.97411 14.1826 5.81802C15.0265 6.66193 15.5006 7.80653 15.5006 9C15.5006 10.1935 15.0265 11.3381 14.1826 12.182C13.3387 13.0259 12.1941 13.5 11.0006 13.5ZM11.0006 11.5C11.6637 11.5 12.2996 11.2366 12.7684 10.7678C13.2372 10.2989 13.5006 9.66304 13.5006 9C13.5006 8.33696 13.2372 7.70107 12.7684 7.23223C12.2996 6.76339 11.6637 6.5 11.0006 6.5C10.3376 6.5 9.70171 6.76339 9.23287 7.23223C8.76403 7.70107 8.50064 8.33696 8.50064 9C8.50064 9.66304 8.76403 10.2989 9.23287 10.7678C9.70171 11.2366 10.3376 11.5 11.0006 11.5Z" fill="#4F4F4F"></path>
                                                        </svg>
                                                    </span>
                                                </span></td>
                                                <td><span> {{ $my->contact }}</span></td>
                                                <td><span> {{ Morilog\Jalali\Jalalian::forge($my->created_at)->format('Y-m-d') }}</span>
                                                </td>
                                                <td><span class="unstat {{ $my->seen ? 'green' : 'orange' }}">
                                                        {{ $my->seen ? 'دیده شده' : 'دیده نشده' }}</span></td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </li>
                            <li class="active">
                                <h4 class="dash-in-title">پیشنهاد های دریافت شده </h4>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="tit">شماره</span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> از</span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> عنوان</span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit">مدت </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit">حقوق</span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> توضیحات </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> تماس </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="tit"> تاریخ </span>

                                                <div class="torder">
                                                    <span class="up">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 3.328L1.415 6.157L0 4.743L4.243 0.5L8.486 4.743L7.071 6.157L4.243 3.328Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="down">
                                                        <svg width="9" height="7" viewBox="0 0 9 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.243 6.49977L0 2.25677L1.415 0.842773L4.243 3.67177L7.071 0.842773L8.486 2.25677L4.243 6.49977Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($to_assists as $to)
                                            <tr>
                                                <td><span>{{ $loop->iteration }}</span></td>

                                                <td><span>
                                                        @if ($to->user)
                                                            {{ $to->user->name }} {{ $to->user->family }}
                                                        @endif
                                                    </span></td>
                                                <td><span> {{ $to->title }}</span></td>
                                                <td><span> {{ __('arr.' . $to->duration) }}</span></td>
                                                <td><span> {{ $to->salary }}</span></td>
                                                <td><span>
                                                    @include("home.panel.assist_pop",['id'=>$to->id,'info'=>$to->info])
                                                    <span class="icon show_op pointer" data-id="{{ $to->id }}">
                                                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.0006 0C16.3926 0 20.8786 3.88 21.8196 9C20.8796 14.12 16.3926 18 11.0006 18C5.60864 18 1.12264 14.12 0.181641 9C1.12164 3.88 5.60864 0 11.0006 0ZM11.0006 16C13.0401 15.9996 15.019 15.3068 16.6135 14.0352C18.208 12.7635 19.3235 10.9883 19.7776 9C19.3219 7.0133 18.2056 5.24 16.6113 3.97003C15.017 2.70005 13.0389 2.00853 11.0006 2.00853C8.96234 2.00853 6.98433 2.70005 5.39002 3.97003C3.7957 5.24 2.67941 7.0133 2.22364 9C2.67774 10.9883 3.79331 12.7635 5.38778 14.0352C6.98225 15.3068 8.96117 15.9996 11.0006 16ZM11.0006 13.5C9.80717 13.5 8.66257 13.0259 7.81866 12.182C6.97475 11.3381 6.50064 10.1935 6.50064 9C6.50064 7.80653 6.97475 6.66193 7.81866 5.81802C8.66257 4.97411 9.80717 4.5 11.0006 4.5C12.1941 4.5 13.3387 4.97411 14.1826 5.81802C15.0265 6.66193 15.5006 7.80653 15.5006 9C15.5006 10.1935 15.0265 11.3381 14.1826 12.182C13.3387 13.0259 12.1941 13.5 11.0006 13.5ZM11.0006 11.5C11.6637 11.5 12.2996 11.2366 12.7684 10.7678C13.2372 10.2989 13.5006 9.66304 13.5006 9C13.5006 8.33696 13.2372 7.70107 12.7684 7.23223C12.2996 6.76339 11.6637 6.5 11.0006 6.5C10.3376 6.5 9.70171 6.76339 9.23287 7.23223C8.76403 7.70107 8.50064 8.33696 8.50064 9C8.50064 9.66304 8.76403 10.2989 9.23287 10.7678C9.70171 11.2366 10.3376 11.5 11.0006 11.5Z" fill="#4F4F4F"></path>
                                                        </svg>
                                                    </span>

                                                </span></td>
                                                <td><span> {{ $to->contact }}</span></td>
                                                <td><span> {{ Morilog\Jalali\Jalalian::forge($to->created_at)->format('Y-m-d') }}</span>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>

{{--
        <div class="dash-main-content">
            <div class="tra-table">


            </div>
        </div>  --}}

    </div>
@endsection
