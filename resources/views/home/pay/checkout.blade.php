@extends('main.site')
@section('content')
@php
$vip=auth()->user()->vip_price();

@endphp
    <div id="main">
        <div class="container">

            <div class="row">
                <div class="bread-filter">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">بلدچی</a></li>
                            <li class="sep">
                                <span>
                                    <svg width="7" height="10" viewBox="0 0 7 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.943369 4.94888C0.94335 5.08612 0.970364 5.22202 1.02287 5.34882C1.07537 5.47561 1.15234 5.59084 1.24937 5.6879L5.14936 9.58789C5.34523 9.78375 5.61087 9.8938 5.88786 9.8938C6.16485 9.8938 6.43049 9.78375 6.62635 9.58789C6.82222 9.39203 6.93226 9.12639 6.93226 8.8494C6.93226 8.5724 6.82222 8.30676 6.62635 8.1109L4.22636 4.9469L6.62635 1.7829C6.82222 1.58704 6.93226 1.32139 6.93226 1.0444C6.93226 0.767412 6.82222 0.50174 6.62635 0.305878C6.43049 0.110015 6.16485 2.14471e-08 5.88786 0C5.61087 -2.1447e-08 5.34523 0.110015 5.14936 0.305878L1.24937 4.2059C1.15181 4.3034 1.07453 4.41925 1.02201 4.54678C0.969491 4.67431 0.942768 4.81096 0.943369 4.94888Z"
                                            fill="#A6A5AA"></path>
                                    </svg>

                                </span>
                            </li>
                            <li><span> صورتحساب</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('send.bill') }}">
                @csrf
                @method('post')

                <input type="text" name="type" value="{{ request('type') }}" hidden>
                <input type="text" name="advertise_id" value="{{ $advertise->id}}" hidden>
                <input type="text" name="amount" value="{{ request('amount') }}" hidden>
                <input type="text" name="deposit_day" value="{{ request('deposit_day') }}" hidden>


                <div class="answer-sec">
                    <div class="d-flex">
                        <div class="right-sec">
                            @include('home.ads.single')
                        </div>
                        <div class="left-sec">
                            <div class="user-full-messg">
                                <div class="top">
                                    <div class="rights">
                                        <h3> صورتحساب</h3>
                                    </div>
                                </div>

                                <div class="pre-pay">
                                    <h4>جزئیات</h4>
                                    <ul>
                                        @if(request('type')=='deposit'  )
                                        <li>
                                            <span class="tit">مبلغ بیعانه</span>
                                            <span class="val">
                                                {{ number_format(request('amount')) }}
                                                تومان
                                            </span>
                                        </li>
                                        <li>
                                            <span class="tit">شماره فروشنده</span>
                                            <span class="val">

                                                {{ $advertise->user->mobile }}
                                            </span>
                                        </li>
                                        <li>
                                            <span class="tit">مبلغ قابل پرداخت</span>
                                            <span class="val">
                                                {{ number_format(request('amount')) }}
                                                تومان
                                            </span>
                                        </li>
                                        @endif

                                        @if(request('type')=='vip')
                                        <li>
                                            <span class="tit">مبلغ vip</span>
                                            <span class="val">
                                                {{ number_format($vip) }}
                                                تومان
                                            </span>
                                        </li>
                                        @endif

                                    </ul>
                                    <h4>روش پرداخت</h4>
                                    <div class="pre-pay-options">
                                        <div class="pre-pay-option">
                                            <input type="radio" id="darg" name="prepay" value="darg"
                                                checked="">
                                            <label for="darg">
                                                <span class="icon">
                                                    <svg width="19" height="21" viewBox="0 0 19 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8 0.5L15.298 2.78C15.5015 2.84354 15.6794 2.97048 15.8057 3.14229C15.932 3.31409 16.0001 3.52177 16 3.735V5.5H18C18.2652 5.5 18.5196 5.60536 18.7071 5.79289C18.8946 5.98043 19 6.23478 19 6.5V14.5C19 14.7652 18.8946 15.0196 18.7071 15.2071C18.5196 15.3946 18.2652 15.5 18 15.5L14.78 15.501C14.393 16.011 13.923 16.461 13.38 16.831L8 20.5L2.62 16.832C1.81252 16.2815 1.15175 15.542 0.69514 14.6779C0.238528 13.8138 -0.000101223 12.8513 3.22098e-08 11.874V3.735C0.000120606 3.52194 0.0682866 3.31449 0.194562 3.14289C0.320838 2.97128 0.498622 2.84449 0.702 2.781L8 0.5ZM8 2.594L2 4.47V11.874C1.99986 12.4862 2.14025 13.0903 2.41036 13.6397C2.68048 14.1892 3.07311 14.6692 3.558 15.043L3.747 15.179L8 18.08L11.782 15.5H7C6.73478 15.5 6.48043 15.3946 6.29289 15.2071C6.10536 15.0196 6 14.7652 6 14.5V6.5C6 6.23478 6.10536 5.98043 6.29289 5.79289C6.48043 5.60536 6.73478 5.5 7 5.5H14V4.47L8 2.594ZM8 10.5V13.5H17V10.5H8ZM8 8.5H17V7.5H8V8.5Z"
                                                            fill="currentColor"></path>
                                                    </svg>

                                                </span>
                                                <span>درگاه اینترنتی</span>
                                                <span class="cir">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.6665 6.615L10.7945 0.486328L11.7378 1.42899L4.6665 8.50033L0.423828 4.25766L1.3665 3.31499L4.6665 6.615Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </span>
                                            </label>
                                        </div>
                                        {{--  <div class="pre-pay-option">
										<input type="radio" id="inp" name="prepay" value="inp">
										<label for="inp">
											<span class="icon">
												<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M1 0.5H19C19.2652 0.5 19.5196 0.605357 19.7071 0.792893C19.8946 0.98043 20 1.23478 20 1.5V17.5C20 17.7652 19.8946 18.0196 19.7071 18.2071C19.5196 18.3946 19.2652 18.5 19 18.5H1C0.734784 18.5 0.48043 18.3946 0.292893 18.2071C0.105357 18.0196 0 17.7652 0 17.5V1.5C0 1.23478 0.105357 0.98043 0.292893 0.792893C0.48043 0.605357 0.734784 0.5 1 0.5ZM18 8.5H2V16.5H18V8.5ZM18 6.5V2.5H2V6.5H18ZM12 12.5H16V14.5H12V12.5Z" fill="currentColor"></path>
												</svg>

											</span>
											<span>درگاه درون برنامه</span>
											<span class="cir">
												<svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M4.6665 6.615L10.7945 0.486328L11.7378 1.42899L4.6665 8.50033L0.423828 4.25766L1.3665 3.31499L4.6665 6.615Z" fill="white"></path>
												</svg>
											</span>
										</label>
									</div>  --}}
                                    </div>
                                </div>

                                <div class="circle-line">
                                    <span></span>
                                </div>

                                <div class="pre-pay-footer">
                                    <div class="right-secd">

                                        <div class="input-toggle text red">
                                            <input type="checkbox" name="pay_from_cash" class="pay_from_cash" data-balance="{{ $user->balance }}"
                                                data-amount="{{ request('amount') }}" id="pay_from_cash"
                                                {{ $user->balance == 0 ? 'disabled' : '' }} name="from-dep">
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
                                    <div class="left-sec">
                                        <button class="icon-button green full">
                                            <span>پرداخت</span>
                                            <span class="num">
                                                <b>
                                                    <span class="res_pay">
                                                        @if(request('type')=='deposit')
                                                        {{ number_format(request('amount')) }}

                                                        @endif
                                                        @if(request('type')=='vip')
                                                        {{ number_format($vip) }}
                                                        @endif
                                                    </span>
                                                    تومان</b>
                                            </span>
                                            <span class="icon">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 6V0H8V6H14V8H8V14H6V8H0V6H6Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
@endsection
