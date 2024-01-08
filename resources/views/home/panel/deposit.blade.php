@extends('main.panel')
@section('content')
    <div id="dashmain">
        <div class="search-title">
            <h3>بیعانه</h3>

        </div>
        <div class="pre-sale-lists" id="deposit_sec">
            <div class="tab-nav">
                <ul>
                    <li class="deposit_sec_li"><span>بیعانه خرید</span></li>
                    <li class="active deposit_sec_li"><span>بیعانه فروش</span></li>
                </ul>
            </div>
            <div class="tab-container">
                <ul>
                    <li class=" ">
                        <div>
                            @foreach ($user->deposits as $deposit)
                                {{--  @dd($user)  --}}
                                {{--  @dd($deposit->advertise)  --}}


                                <div class="pre-sale-item">
                                    <div class="right-sec">
                                        <div class="top">
                                            <div class="img">
                                                <img src="images/ad1.jpg" alt="">
                                            </div>
                                            <div class="inf">
                                                <h4><a href="{{ route('single.ad', $deposit->advertise->id) }}">
                                                        {{ $deposit->advertise->title }}</a></h4>
                                                <div class="price">
                                                    <span
                                                        class="num">{{ number_format($deposit->advertise->price) }}</span>
                                                    <span class="un">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bot">
                                            <a class="pre-sale-act"
                                                href="{{ route('single.ad', $deposit->advertise->id) }}">
                                                <span>مشاهده آگهی</span>
                                                <span class="icon">
                                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0002 0.5C14.4935 0.5 18.2319 3.73333 19.016 8C18.2327 12.2667 14.4935 15.5 10.0002 15.5C5.50688 15.5 1.76854 12.2667 0.984375 8C1.76771 3.73333 5.50688 0.5 10.0002 0.5ZM10.0002 13.8333C11.6998 13.833 13.3489 13.2557 14.6776 12.196C16.0063 11.1363 16.936 9.65689 17.3144 8C16.9346 6.34442 16.0043 4.86667 14.6757 3.80835C13.3471 2.75004 11.6988 2.17377 10.0002 2.17377C8.30162 2.17377 6.65328 2.75004 5.32469 3.80835C3.99609 4.86667 3.06585 6.34442 2.68604 8C3.06446 9.65689 3.9941 11.1363 5.32283 12.196C6.65155 13.2557 8.30065 13.833 10.0002 13.8333ZM10.0002 11.75C9.00565 11.75 8.05182 11.3549 7.34856 10.6516C6.6453 9.94839 6.25021 8.99456 6.25021 8C6.25021 7.00544 6.6453 6.05161 7.34856 5.34835C8.05182 4.64509 9.00565 4.25 10.0002 4.25C10.9948 4.25 11.9486 4.64509 12.6519 5.34835C13.3551 6.05161 13.7502 7.00544 13.7502 8C13.7502 8.99456 13.3551 9.94839 12.6519 10.6516C11.9486 11.3549 10.9948 11.75 10.0002 11.75ZM10.0002 10.0833C10.5527 10.0833 11.0826 9.86384 11.4733 9.47314C11.864 9.08244 12.0835 8.55253 12.0835 8C12.0835 7.44747 11.864 6.91756 11.4733 6.52686C11.0826 6.13616 10.5527 5.91667 10.0002 5.91667C9.44767 5.91667 8.91777 6.13616 8.52707 6.52686C8.13637 6.91756 7.91688 7.44747 7.91688 8C7.91688 8.55253 8.13637 9.08244 8.52707 9.47314C8.91777 9.86384 9.44767 10.0833 10.0002 10.0833Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="pre-sale-act"
                                                href="{{ route('single.user', $deposit->advertise->user->id) }}">
                                                <span>درباه فروشنده</span>
                                                <span class="icon">
                                                    <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.333984 18.333C0.333984 16.5649 1.03636 14.8692 2.28661 13.619C3.53685 12.3687 5.23254 11.6663 7.00065 11.6663C8.76876 11.6663 10.4645 12.3687 11.7147 13.619C12.9649 14.8692 13.6673 16.5649 13.6673 18.333H12.0007C12.0007 17.0069 11.4739 15.7352 10.5362 14.7975C9.5985 13.8598 8.32673 13.333 7.00065 13.333C5.67457 13.333 4.4028 13.8598 3.46512 14.7975C2.52744 15.7352 2.00065 17.0069 2.00065 18.333H0.333984ZM7.00065 10.833C4.23815 10.833 2.00065 8.59551 2.00065 5.83301C2.00065 3.07051 4.23815 0.833008 7.00065 0.833008C9.76315 0.833008 12.0007 3.07051 12.0007 5.83301C12.0007 8.59551 9.76315 10.833 7.00065 10.833ZM7.00065 9.16634C8.84232 9.16634 10.334 7.67467 10.334 5.83301C10.334 3.99134 8.84232 2.49967 7.00065 2.49967C5.15898 2.49967 3.66732 3.99134 3.66732 5.83301C3.66732 7.67467 5.15898 9.16634 7.00065 9.16634Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="pre-sale-act" href="#">
                                                <span class="add_report" data-id="{{ $deposit->id }}">گزارش مشکل</span>
                                                <span class="icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.0013 17.3337C4.3988 17.3337 0.667969 13.6028 0.667969 9.00033C0.667969 4.39783 4.3988 0.666992 9.0013 0.666992C13.6038 0.666992 17.3346 4.39783 17.3346 9.00033C17.3346 13.6028 13.6038 17.3337 9.0013 17.3337ZM9.0013 15.667C10.7694 15.667 12.4651 14.9646 13.7153 13.7144C14.9656 12.4641 15.668 10.7684 15.668 9.00033C15.668 7.23222 14.9656 5.53652 13.7153 4.28628C12.4651 3.03604 10.7694 2.33366 9.0013 2.33366C7.23319 2.33366 5.5375 3.03604 4.28726 4.28628C3.03701 5.53652 2.33464 7.23222 2.33464 9.00033C2.33464 10.7684 3.03701 12.4641 4.28726 13.7144C5.5375 14.9646 7.23319 15.667 9.0013 15.667ZM8.16797 11.5003H9.83463V13.167H8.16797V11.5003ZM8.16797 4.83366H9.83463V9.83366H8.16797V4.83366Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            @if ($deposit->status=="confirmed_deposit")
                                            <a class="pre-sale-act" href="#">
                                                <form id="ca_{{ $deposit->id }}"
                                                    action="{{ route('panel.cancel.deposit', $deposit->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('post')
                                                    <span class="cancel_deposit" data-id="{{ $deposit->id }}">لغو
                                                        کردن</span>
                                                    <span class="icon">
                                                        <svg width="17" height="18" viewBox="0 0 17 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.33333 17.3337C3.73083 17.3337 0 13.6028 0 9.00033C0 4.39783 3.73083 0.666992 8.33333 0.666992C12.9358 0.666992 16.6667 4.39783 16.6667 9.00033C16.6667 13.6028 12.9358 17.3337 8.33333 17.3337ZM8.33333 15.667C10.1014 15.667 11.7971 14.9646 13.0474 13.7144C14.2976 12.4641 15 10.7684 15 9.00033C15 7.23222 14.2976 5.53652 13.0474 4.28628C11.7971 3.03604 10.1014 2.33366 8.33333 2.33366C6.56522 2.33366 4.86953 3.03604 3.61929 4.28628C2.36905 5.53652 1.66667 7.23222 1.66667 9.00033C1.66667 10.7684 2.36905 12.4641 3.61929 13.7144C4.86953 14.9646 6.56522 15.667 8.33333 15.667ZM8.33333 7.82199L10.69 5.46449L11.8692 6.64366L9.51167 9.00033L11.8692 11.357L10.69 12.5362L8.33333 10.1787L5.97667 12.5362L4.7975 11.357L7.155 9.00033L4.7975 6.64366L5.97667 5.46449L8.33333 7.82199Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </form>

                                            </a>
                                            @endif
                                        </div>
                                        <div class="vline">
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                    <div class="left-sec">
                                        <div class="pre-sale-option">

                                            <ul>

                                                <li>
                                                    <span class="title">وضعیت بیعانه: </span>
                                                    <span
                                                        class="val stat {{ $deposit->check_status_color() }}">{{ __('arr.' . $deposit->status) }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">مبلغ بیعانه </span>
                                                    <span class="val">
                                                        {{ number_format($deposit->amount) }}
                                                        تومان</span>
                                                </li>
                                                {{--  <li>
                                                    <span class="title">زمان باقی مانده پرداخت</span>
                                                    <span class="val time">
                                                    </span>
                                                </li>  --}}
                                            </ul>
                                            <div class="vline">
                                                <div class="line"></div>
                                            </div>
                                        </div>

                                        {{--  <div class="pre-sale-pay">
                                    @if ($deposit->status == 'created')
                                    <form action="{{ route('send.bill') }}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="text" name="type" value="repay_deposit" hidden>
                                        <input type="text" name="amount" value="{{ $deposit->amount }}" hidden>
                                        <input type="text" name="deposit_id" value="{{ $deposit->id }}" hidden>
                                        <button class="icon-button green full">
                                            <span>پرداخت مبلغ بیعانه</span>
                                        </button>
                                       </form>
                                    @endif
                                </div>  --}}
                                        @if ($deposit->status == 'created')
                                            <form action="{{ route('send.bill') }}" method="post">
                                                <input type="text" name="type" value="repay_deposit" hidden>
                                                <input type="text" name="amount" value="{{ $deposit->amount }}" hidden>
                                                <input type="text" name="deposit_id" value="{{ $deposit->id }}" hidden>
                                                @csrf
                                                @method('post')
                                                <div class="pre-pay-footer">
                                                    <div class="right-secd">
                                                        <div class="input-toggle text red">
                                                            <input type="checkbox" name="pay_from_cash"
                                                                class="pay_from_cash" data-balance="{{ $user->balance }}"
                                                                value="1" data-amount="{{ $deposit->amount }}"
                                                                id="pay_from_cash{{ $deposit->id }}"
                                                                {{ $user->balance == 0 ? 'disabled' : '' }}
                                                                name="from-dep">
                                                            <label for="pay_from_cash{{ $deposit->id }}">
                                                                <div class="d-flex">
                                                                    <span class="icon">
                                                                        <svg width="20" height="18"
                                                                            viewBox="0 0 20 18" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
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
                                                                        {{ number_format($deposit->amount) }}
                                                                    </span>
                                                                    تومان</b>
                                                            </span>
                                                            <span class="icon">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6 6V0H8V6H14V8H8V14H6V8H0V6H6Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </li>
                    <li class="active  ">
                        <div>
                            @foreach ($indeposits as $depos)

                                <div class="pre-sale-item">
                                    <div class="right-sec">
                                        <div class="pre-sale-use">
                                            <ul>
                                                <li>
                                                    <span class="title">پیشنهاد بیعانه توسط </span>
                                                    <span class="val green">{{ $depos->user->name }}
                                                        {{ $depos->user->family }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">شماره تماس</span>
                                                    <span class="val">{{ $depos->user->mobile }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bot">

                                            <a class="pre-sale-act"
                                                href="{{ route('single.ad', $depos->advertise->id) }}">
                                                <span>مشاهده آگهی</span>
                                                <span class="icon">
                                                    <svg width="20" height="16" viewBox="0 0 20 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0002 0.5C14.4935 0.5 18.2319 3.73333 19.016 8C18.2327 12.2667 14.4935 15.5 10.0002 15.5C5.50688 15.5 1.76854 12.2667 0.984375 8C1.76771 3.73333 5.50688 0.5 10.0002 0.5ZM10.0002 13.8333C11.6998 13.833 13.3489 13.2557 14.6776 12.196C16.0063 11.1363 16.936 9.65689 17.3144 8C16.9346 6.34442 16.0043 4.86667 14.6757 3.80835C13.3471 2.75004 11.6988 2.17377 10.0002 2.17377C8.30162 2.17377 6.65328 2.75004 5.32469 3.80835C3.99609 4.86667 3.06585 6.34442 2.68604 8C3.06446 9.65689 3.9941 11.1363 5.32283 12.196C6.65155 13.2557 8.30065 13.833 10.0002 13.8333ZM10.0002 11.75C9.00565 11.75 8.05182 11.3549 7.34856 10.6516C6.6453 9.94839 6.25021 8.99456 6.25021 8C6.25021 7.00544 6.6453 6.05161 7.34856 5.34835C8.05182 4.64509 9.00565 4.25 10.0002 4.25C10.9948 4.25 11.9486 4.64509 12.6519 5.34835C13.3551 6.05161 13.7502 7.00544 13.7502 8C13.7502 8.99456 13.3551 9.94839 12.6519 10.6516C11.9486 11.3549 10.9948 11.75 10.0002 11.75ZM10.0002 10.0833C10.5527 10.0833 11.0826 9.86384 11.4733 9.47314C11.864 9.08244 12.0835 8.55253 12.0835 8C12.0835 7.44747 11.864 6.91756 11.4733 6.52686C11.0826 6.13616 10.5527 5.91667 10.0002 5.91667C9.44767 5.91667 8.91777 6.13616 8.52707 6.52686C8.13637 6.91756 7.91688 7.44747 7.91688 8C7.91688 8.55253 8.13637 9.08244 8.52707 9.47314C8.91777 9.86384 9.44767 10.0833 10.0002 10.0833Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="pre-sale-act"
                                                href="{{ route('single.user', $depos->user->id) }}">
                                                <span>درباه خریدار</span>
                                                <span class="icon">
                                                    <svg width="14" height="19" viewBox="0 0 14 19"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.333984 18.333C0.333984 16.5649 1.03636 14.8692 2.28661 13.619C3.53685 12.3687 5.23254 11.6663 7.00065 11.6663C8.76876 11.6663 10.4645 12.3687 11.7147 13.619C12.9649 14.8692 13.6673 16.5649 13.6673 18.333H12.0007C12.0007 17.0069 11.4739 15.7352 10.5362 14.7975C9.5985 13.8598 8.32673 13.333 7.00065 13.333C5.67457 13.333 4.4028 13.8598 3.46512 14.7975C2.52744 15.7352 2.00065 17.0069 2.00065 18.333H0.333984ZM7.00065 10.833C4.23815 10.833 2.00065 8.59551 2.00065 5.83301C2.00065 3.07051 4.23815 0.833008 7.00065 0.833008C9.76315 0.833008 12.0007 3.07051 12.0007 5.83301C12.0007 8.59551 9.76315 10.833 7.00065 10.833ZM7.00065 9.16634C8.84232 9.16634 10.334 7.67467 10.334 5.83301C10.334 3.99134 8.84232 2.49967 7.00065 2.49967C5.15898 2.49967 3.66732 3.99134 3.66732 5.83301C3.66732 7.67467 5.15898 9.16634 7.00065 9.16634Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="pre-sale-act" href="#">
                                                <span class="add_report" data-id="{{ $depos->id }}">گزارش مشکل</span>
                                                <span class="icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.0013 17.3337C4.3988 17.3337 0.667969 13.6028 0.667969 9.00033C0.667969 4.39783 4.3988 0.666992 9.0013 0.666992C13.6038 0.666992 17.3346 4.39783 17.3346 9.00033C17.3346 13.6028 13.6038 17.3337 9.0013 17.3337ZM9.0013 15.667C10.7694 15.667 12.4651 14.9646 13.7153 13.7144C14.9656 12.4641 15.668 10.7684 15.668 9.00033C15.668 7.23222 14.9656 5.53652 13.7153 4.28628C12.4651 3.03604 10.7694 2.33366 9.0013 2.33366C7.23319 2.33366 5.5375 3.03604 4.28726 4.28628C3.03701 5.53652 2.33464 7.23222 2.33464 9.00033C2.33464 10.7684 3.03701 12.4641 4.28726 13.7144C5.5375 14.9646 7.23319 15.667 9.0013 15.667ZM8.16797 11.5003H9.83463V13.167H8.16797V11.5003ZM8.16797 4.83366H9.83463V9.83366H8.16797V4.83366Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>

                                        </div>
                                        <div class="vline">
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                    <div class="left-sec">
                                        <div class="pre-sale-option">

                                            <ul>

                                                <li class=" sm">
                                                    <span class="title">مبلغ بیعانه ({{ number_format($depos->amount) }}
                                                        تومان)</span>
                                                    <span
                                                        class="val stat {{ $depos->check_status_color() }} sm">{{ __('arr.' . $depos->status) }}</span>
                                                </li>
                                                <li class=" sm">
                                                    <span class="title">زمان قطعی شدن معامله </span>
                                                    <span class="val time">
                                                        {{ Morilog\Jalali\Jalalian::forge($depos->reflux)->format("Y-m-d H:i:s") }}
                                                    </span>
                                                </li>
                                                {{--  <li class=" sm">
                                                    <span class="title sm">زمان مانده تا پذیرش توسط شما</span>
                                                    <span class="val time">12 ساعت</span>
                                                </li>  --}}
                                            </ul>
                                            <div class="vline">
                                                <div class="line"></div>
                                            </div>
                                        </div>
                                        <div class="pre-sale-pay big">

                                            {{--  @if($depos->advertise->status="confirmed")
                                            @continue
                                            @endif  --}}
                                            @if ($depos->status == 'payed' && $depos->advertise->status=="confirmed")
                                                <form action="{{ route('panel.accept.deposit', $depos->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('post')
                                                    <button class="icon-button green full" name="accept" value="1">
                                                        <span class="ic">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9.003 14L16.073 6.929L14.659 5.515L9.003 11.172L6.174 8.343L4.76 9.757L9.003 14Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <span>پذیرش</span>
                                                    </button>
                                                    <button class="icon-button gray full" name="reject" value="1">
                                                        <span class="ic">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 8.586L7.172 5.757L5.757 7.172L8.586 10L5.757 12.828L7.172 14.243L10 11.414L12.828 14.243L14.243 12.828L11.414 10L14.243 7.172L12.828 5.757L10 8.586Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <span>رد کردن</span>
                                                    </button>
                                                </form>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>




    @if(request("show_cookie"))

    <div class="modal fade" id="deposit_e_modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> نکته </h5>
                    <button type="button" class="close close_pops" data-dismiss="modal" aria-label="Close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                fill="currentColor"></path>
                        </svg>

                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        متن تستی
                    </p>
                    <button class="icon-button red deposit_e full close_pops">
                        <span>متوجه شدم</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    @endif




    <div class="modal fade " id="report_modal" style="display: none" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title right" id="exampleModalLongTitle">گزارش تخلف و مشکل آگهی</h5>
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                fill="currentColor"></path>
                        </svg>

                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">

                        <form action="" id="report_form">
                            <input type="text" name="mode" value="deposit" hidden>
                            <input type="text" name="deposit_id" value="" id="deposit_id" hidden>
                            <h3>چه مشکلی در مورد این اگهی وجود دارد؟</h3>

                            <div class="checkcontainer">
                                <input type="checkbox" name="scam" id="scam" value="1">
                                <label for="scam">
                                    <span class="check">
                                        <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    کلاهبرداری، نقض قانون و یا وقوع جرم
                                </label>
                            </div>

                            <div class="checkcontainer">
                                <input type="checkbox" name="problem" id="problem" value="1">
                                <label for="problem">
                                    <span class="check">
                                        <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    مشکلات با صاحب آگهی
                                </label>
                            </div>
                            <div class="checkcontainer">
                                <input type="checkbox" name="other" id="other" value="1">
                                <label for="other">
                                    <span class="check">
                                        <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    سایز
                                </label>
                            </div>

                            <div class="textarea-icon">

                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 0H12C14.1217 0 16.1566 0.842855 17.6569 2.34315C19.1571 3.84344 20 5.87827 20 8C20 10.1217 19.1571 12.1566 17.6569 13.6569C16.1566 15.1571 14.1217 16 12 16V19.5C7 17.5 0 14.5 0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0ZM10 14H12C12.7879 14 13.5681 13.8448 14.2961 13.5433C15.0241 13.2417 15.6855 12.7998 16.2426 12.2426C16.7998 11.6855 17.2417 11.0241 17.5433 10.2961C17.8448 9.56815 18 8.78793 18 8C18 7.21207 17.8448 6.43185 17.5433 5.7039C17.2417 4.97595 16.7998 4.31451 16.2426 3.75736C15.6855 3.20021 15.0241 2.75825 14.2961 2.45672C13.5681 2.15519 12.7879 2 12 2H8C6.4087 2 4.88258 2.63214 3.75736 3.75736C2.63214 4.88258 2 6.4087 2 8C2 11.61 4.462 13.966 10 16.48V14Z"
                                            fill="#8895BA"></path>
                                    </svg>
                                    <span>
                                        توضیحات
                                    </span>

                                </span>
                                <textarea name="info" placeholder="توضیحات خود را در مورد مشکل این آگهی اینجا بنویسید" id=""
                                    cols="30" rows="10"></textarea>

                            </div>


                            <div class="pair-button">
                                <span class="mid-button pointer close_modal">
                                    انصراف
                                </span>
                                <span class="mid-button icon-button red insert_report pointer ">
                                    ارسال گزارش


                                </span>
                            </div>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
