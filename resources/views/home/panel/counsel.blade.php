@extends('main.panel')
@section('content')
    <div class="dash-main-content">
        <div class="tra-table">
            <div class="search-title">
                <a class="icon-button red" href="{{ route('panel.new.counsel1') }}">
                    <span> خردجمعی جدید</span>
                    <span class="icon">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 6V0H8V6H14V8H8V14H6V8H0V6H6Z" fill="currentColor"></path>
                        </svg>

                    </span>
                </a>
                <br>
            </div>
        </div>
    </div>
    <div class="dash-main-content">

        <div class="tra-table">


            <div class="my-add-list">
                @if($counsels->count())
                <h4 class="dash-in-title">آخرین سوالاتی که شما ثبت کرده اید</h4>

                @endif
                @foreach ($counsels as $counsel)
                    <div class="my-add">
                        <div class="right-sec">
                            <div class="img">
                                <img src="{{ $counsel->img() }}" alt="">
                            </div>
                            <div class="inf">
                                <h4>
                                    {{ $counsel->title }}
                                </h4>
                                @if ($counsel->price > 0)
                                    <div class="price">
                                        <span class="num">
                                            {{ number_format($counsel->price) }}
                                        </span>
                                        <span class="un">تومان</span>
                                    </div>
                                @endif

                                <div class="date-city">
                                    <div class="location">
                                        <span class="icon">
                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 13.4334L9.3 10.1334C9.9526 9.48078 10.397 8.64926 10.577 7.74403C10.7571 6.8388 10.6646 5.90051 10.3114 5.04781C9.95817 4.19512 9.36003 3.46632 8.59261 2.95356C7.82519 2.4408 6.92296 2.16711 6 2.16711C5.07704 2.16711 4.17481 2.4408 3.40739 2.95356C2.63997 3.46632 2.04183 4.19512 1.68861 5.04781C1.33539 5.90051 1.24294 6.8388 1.42297 7.74403C1.603 8.64926 2.04741 9.48078 2.7 10.1334L6 13.4334ZM6 15.3188L1.75734 11.0761C0.918228 10.237 0.346791 9.16789 0.115286 8.00401C-0.11622 6.84013 0.00260456 5.63373 0.456732 4.53738C0.91086 3.44103 1.6799 2.50396 2.66659 1.84467C3.65328 1.18539 4.81332 0.833496 6 0.833496C7.18669 0.833496 8.34672 1.18539 9.33342 1.84467C10.3201 2.50396 11.0891 3.44103 11.5433 4.53738C11.9974 5.63373 12.1162 6.84013 11.8847 8.00401C11.6532 9.16789 11.0818 10.237 10.2427 11.0761L6 15.3188ZM6 8.16678C6.35362 8.16678 6.69276 8.0263 6.94281 7.77625C7.19286 7.5262 7.33334 7.18707 7.33334 6.83344C7.33334 6.47982 7.19286 6.14068 6.94281 5.89064C6.69276 5.64059 6.35362 5.50011 6 5.50011C5.64638 5.50011 5.30724 5.64059 5.05719 5.89064C4.80715 6.14068 4.66667 6.47982 4.66667 6.83344C4.66667 7.18707 4.80715 7.5262 5.05719 7.77625C5.30724 8.0263 5.64638 8.16678 6 8.16678ZM6 9.50011C5.29276 9.50011 4.61448 9.21916 4.11438 8.71906C3.61429 8.21897 3.33334 7.54069 3.33334 6.83344C3.33334 6.1262 3.61429 5.44792 4.11438 4.94783C4.61448 4.44773 5.29276 4.16678 6 4.16678C6.70725 4.16678 7.38552 4.44773 7.88562 4.94783C8.38572 5.44792 8.66667 6.1262 8.66667 6.83344C8.66667 7.54069 8.38572 8.21897 7.88562 8.71906C7.38552 9.21916 6.70725 9.50011 6 9.50011Z"
                                                    fill="#828282"></path>
                                            </svg>
                                        </span>
                                        <span class="state">{{ __('arr.' . $counsel->reward) }}</span>
                                        <span class="state">{{ __('arr.' . $counsel->status) }}</span>
                                        <span>،</span>
                                        <span class="city"> {{ $counsel->Counselquestions()->count() }} سوال</span>
                                    </div>
                                    <div class="date">
                                        <span class="icon">
                                            <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.00016 14.1666C3.31816 14.1666 0.333496 11.1819 0.333496 7.49992C0.333496 3.81792 3.31816 0.833252 7.00016 0.833252C10.6822 0.833252 13.6668 3.81792 13.6668 7.49992C13.6668 11.1819 10.6822 14.1666 7.00016 14.1666ZM7.00016 12.8333C8.41465 12.8333 9.7712 12.2713 10.7714 11.2712C11.7716 10.271 12.3335 8.91441 12.3335 7.49992C12.3335 6.08543 11.7716 4.72888 10.7714 3.72868C9.7712 2.72849 8.41465 2.16659 7.00016 2.16659C5.58567 2.16659 4.22912 2.72849 3.22893 3.72868C2.22873 4.72888 1.66683 6.08543 1.66683 7.49992C1.66683 8.91441 2.22873 10.271 3.22893 11.2712C4.22912 12.2713 5.58567 12.8333 7.00016 12.8333ZM7.66683 7.49992H10.3335V8.83325H6.3335V4.16658H7.66683V7.49992Z"
                                                    fill="#828282"></path>
                                            </svg>
                                        </span>
                                        <span class="text">
                                            {{ Carbon\Carbon::parse($counsel->created_at)->ago() }}
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="left-sec">
                            <div>

                                <div class="accord-box  active">
                                    <div class="top nob">
                                        <div class="side-filter-title">
                                            <h4>
                                                <button class="back-filter">
                                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.98876 4.94467C5.98878 4.80743 5.96176 4.67154 5.90926 4.54474C5.85676 4.41794 5.77979 4.30271 5.68276 4.20566L1.78277 0.305664C1.5869 0.109802 1.32126 -0.000243733 1.04427 -0.000243708C0.767279 -0.000243684 0.501638 0.109802 0.305775 0.305665C0.109913 0.501527 -0.000132882 0.767169 -0.000132858 1.04416C-0.000132833 1.32115 0.109913 1.58679 0.305775 1.78265L2.70577 4.94666L0.305776 8.11066C0.109914 8.30652 -0.000132199 8.57216 -0.000132175 8.84915C-0.000132151 9.12614 0.109914 9.39182 0.305776 9.58768C0.501638 9.78354 0.76728 9.89356 1.04427 9.89356C1.32126 9.89356 1.5869 9.78354 1.78277 9.58768L5.68276 5.68765C5.78031 5.59016 5.85759 5.4743 5.91012 5.34677C5.96264 5.21924 5.98936 5.08259 5.98876 4.94467Z"
                                                            fill="#2A2A2A"></path>
                                                    </svg>

                                                </button>
                                                <span>مدیریت آگهی</span>
                                            </h4>


                                        </div>

                                    </div>


                                </div>

                                <div class="stat">
                                    <span class="tit">وضعیت : </span>
                                    <span class="stat-box {{ $counsel->status == 'show' ? 'green' : 'orange' }} ">
                                        {{ __('status.' . $counsel->status) }}</span>
                                </div>

                                <div class="actions">
                                    <ul>
                                        <li>
                                            @if ($counsel->check_for_active())
                                                <form class="inline-block "
                                                    action="{{ route('active.counsel', $counsel->id) }}" method="post"
                                                    data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                                    @csrf
                                                    @method('post')
                                                    <button class="inline-block no_border heart">

                                                        <span class="icon">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M4.02 5.97C2.75 7.65 2 9.74 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path
                                                                    d="M5 12C5 15.87 8.13 19 12 19C15.87 19 19 15.87 19 12C19 8.13 15.87 5 12 5"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path
                                                                    d="M12 16C14.21 16 16 14.21 16 12C16 9.79 14.21 8 12 8"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                        <span> منتظر انتشار</span>
                                                    </button>
                                                </form>
                                            @endif


                                        </li>



                                        <li>
                                            <form class="inline-block" action="{{ route('destroy.counsel', $counsel->id) }}"
                                                method="post" data-message="بعد از تایید خرد جمعی شما حذف  خواهد شد ">
                                                @csrf
                                                @method('post')
                                                <span class="action pointer submit_form">
                                                    <span class="icon">
                                                        <svg width="24" height="25" viewBox="0 0 24 25"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M20.9997 7.22998C20.9797 7.22998 20.9497 7.22998 20.9197 7.22998C15.6297 6.69998 10.3497 6.49998 5.11967 7.02998L3.07967 7.22998C2.65967 7.26998 2.28967 6.96998 2.24967 6.54998C2.20967 6.12998 2.50967 5.76998 2.91967 5.72998L4.95967 5.52998C10.2797 4.98998 15.6697 5.19998 21.0697 5.72998C21.4797 5.76998 21.7797 6.13998 21.7397 6.54998C21.7097 6.93998 21.3797 7.22998 20.9997 7.22998Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M8.50074 6.22C8.46074 6.22 8.42074 6.22 8.37074 6.21C7.97074 6.14 7.69074 5.75 7.76074 5.35L7.98074 4.04C8.14074 3.08 8.36074 1.75 10.6907 1.75H13.3107C15.6507 1.75 15.8707 3.13 16.0207 4.05L16.2407 5.35C16.3107 5.76 16.0307 6.15 15.6307 6.21C15.2207 6.28 14.8307 6 14.7707 5.6L14.5507 4.3C14.4107 3.43 14.3807 3.26 13.3207 3.26H10.7007C9.64074 3.26 9.62074 3.4 9.47074 4.29L9.24074 5.59C9.18074 5.96 8.86074 6.22 8.50074 6.22Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M15.2104 23.25H8.79039C5.30039 23.25 5.16039 21.32 5.05039 19.76L4.40039 9.68995C4.37039 9.27995 4.69039 8.91995 5.10039 8.88995C5.52039 8.86995 5.87039 9.17995 5.90039 9.58995L6.55039 19.66C6.66039 21.18 6.70039 21.75 8.79039 21.75H15.2104C17.3104 21.75 17.3504 21.18 17.4504 19.66L18.1004 9.58995C18.1304 9.17995 18.4904 8.86995 18.9004 8.88995C19.3104 8.91995 19.6304 9.26995 19.6004 9.68995L18.9504 19.76C18.8404 21.32 18.7004 23.25 15.2104 23.25Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M13.6581 17.75H10.3281C9.91813 17.75 9.57812 17.41 9.57812 17C9.57812 16.59 9.91813 16.25 10.3281 16.25H13.6581C14.0681 16.25 14.4081 16.59 14.4081 17C14.4081 17.41 14.0681 17.75 13.6581 17.75Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M14.5 13.75H9.5C9.09 13.75 8.75 13.41 8.75 13C8.75 12.59 9.09 12.25 9.5 12.25H14.5C14.91 12.25 15.25 12.59 15.25 13C15.25 13.41 14.91 13.75 14.5 13.75Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span>حذف</span>
                                                </span>
                                            </form>
                                        </li>

                                        <li>
                                            <a class="action inline-block"
                                                href="{{ route('counsel.perview', $counsel->id) }}">
                                                <span> </span>

                                                <span class="icon">
                                                    <svg width="22" height="19" viewBox="0 0 22 19"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 18.54H6C2.83 18.54 0.25 15.96 0.25 12.79V3.20998C0.25 1.90998 0.85 1.45998 1.21 1.30998C1.57 1.15998 2.31 1.04998 3.23 1.96998L5.82 4.55998C5.92 4.65998 6.08 4.65998 6.17 4.55998L9.76 0.969976C10.42 0.309976 11.58 0.309976 12.23 0.969976L15.82 4.55998C15.92 4.65998 16.08 4.65998 16.17 4.55998L18.76 1.96998C19.68 1.04998 20.42 1.16998 20.78 1.30998C21.14 1.45998 21.74 1.89998 21.74 3.20998V12.8C21.75 16.23 19.44 18.54 16 18.54ZM1.81 2.73998C1.78 2.81998 1.75 2.96998 1.75 3.20998V12.8C1.75 15.14 3.66 17.05 6 17.05H16C18.58 17.05 20.25 15.38 20.25 12.8V3.20998C20.25 2.96998 20.22 2.82998 20.19 2.74998C20.11 2.78998 19.99 2.86998 19.82 3.03998L17.23 5.62998C16.57 6.28998 15.41 6.28998 14.76 5.62998L11.17 2.03998C11.07 1.93998 10.91 1.93998 10.82 2.03998L7.24 5.61998C6.58 6.27998 5.42 6.27998 4.77 5.61998L2.18 3.02998C2.01 2.85998 1.88 2.77998 1.81 2.73998Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <span>پیش نمایش</span>
                                            </a>

                                        </li>

                                        @if ($counsel->viwecounsel_user()->count() == 0)
                                        <li>

                                            <a href="{{ route('edit.counsel', $counsel->id) }}" class="action">
                                                <span class="icon">
                                                    <svg width="24" height="25" viewBox="0 0 24 25"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15 23.25H9C3.57 23.25 1.25 20.93 1.25 15.5V9.5C1.25 4.07 3.57 1.75 9 1.75H11C11.41 1.75 11.75 2.09 11.75 2.5C11.75 2.91 11.41 3.25 11 3.25H9C4.39 3.25 2.75 4.89 2.75 9.5V15.5C2.75 20.11 4.39 21.75 9 21.75H15C19.61 21.75 21.25 20.11 21.25 15.5V13.5C21.25 13.09 21.59 12.75 22 12.75C22.41 12.75 22.75 13.09 22.75 13.5V15.5C22.75 20.93 20.43 23.25 15 23.25Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M8.49935 18.1901C7.88935 18.1901 7.32935 17.9701 6.91935 17.5701C6.42935 17.0801 6.21935 16.3701 6.32935 15.6201L6.75935 12.6101C6.83935 12.0301 7.21935 11.2801 7.62935 10.8701L15.5093 2.99006C17.4993 1.00006 19.5193 1.00006 21.5093 2.99006C22.5993 4.08006 23.0893 5.19006 22.9893 6.30006C22.8993 7.20006 22.4193 8.08006 21.5093 8.98006L13.6293 16.8601C13.2193 17.2701 12.4693 17.6501 11.8893 17.7301L8.87935 18.1601C8.74935 18.1901 8.61935 18.1901 8.49935 18.1901ZM16.5693 4.05006L8.68935 11.9301C8.49935 12.1201 8.27935 12.5601 8.23935 12.8201L7.80935 15.8301C7.76935 16.1201 7.82935 16.3601 7.97935 16.5101C8.12935 16.6601 8.36935 16.7201 8.65935 16.6801L11.6693 16.2501C11.9293 16.2101 12.3793 15.9901 12.5593 15.8001L20.4393 7.92006C21.0893 7.27006 21.4293 6.69006 21.4793 6.15006C21.5393 5.50006 21.1993 4.81006 20.4393 4.04006C18.8393 2.44006 17.7393 2.89006 16.5693 4.05006Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M19.8515 10.33C19.7815 10.33 19.7115 10.32 19.6515 10.3C17.0215 9.56003 14.9315 7.47003 14.1915 4.84003C14.0815 4.44003 14.3115 4.03003 14.7115 3.91003C15.1115 3.80003 15.5215 4.03003 15.6315 4.43003C16.2315 6.56003 17.9215 8.25003 20.0515 8.85003C20.4515 8.96003 20.6815 9.38003 20.5715 9.78003C20.4815 10.12 20.1815 10.33 19.8515 10.33Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <span>ویرایش</span>
                                            </a>
                                        </li>
                                        @endif


                                        <li>
                                            <a href="{{ route('panel.new.question', $counsel->id) }}" class="action">
                                                <span class="icon">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.5819 11.9999C15.5819 13.9799 13.9819 15.5799 12.0019 15.5799C10.0219 15.5799 8.42188 13.9799 8.42188 11.9999C8.42188 10.0199 10.0219 8.41992 12.0019 8.41992C13.9819 8.41992 15.5819 10.0199 15.5819 11.9999Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M11.9998 20.27C15.5298 20.27 18.8198 18.19 21.1098 14.59C22.0098 13.18 22.0098 10.81 21.1098 9.39997C18.8198 5.79997 15.5298 3.71997 11.9998 3.71997C8.46984 3.71997 5.17984 5.79997 2.88984 9.39997C1.98984 10.81 1.98984 13.18 2.88984 14.59C5.17984 18.19 8.46984 20.27 11.9998 20.27Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                                <span>سوالات</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('counsel.answers', $counsel->id) }}" class="action">
                                                <span class="icon">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.5819 11.9999C15.5819 13.9799 13.9819 15.5799 12.0019 15.5799C10.0219 15.5799 8.42188 13.9799 8.42188 11.9999C8.42188 10.0199 10.0219 8.41992 12.0019 8.41992C13.9819 8.41992 15.5819 10.0199 15.5819 11.9999Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M11.9998 20.27C15.5298 20.27 18.8198 18.19 21.1098 14.59C22.0098 13.18 22.0098 10.81 21.1098 9.39997C18.8198 5.79997 15.5298 3.71997 11.9998 3.71997C8.46984 3.71997 5.17984 5.79997 2.88984 9.39997C1.98984 10.81 1.98984 13.18 2.88984 14.59C5.17984 18.19 8.46984 20.27 11.9998 20.27Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                                <span>نتیجه</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

{{--
            <table>
                <thead>
                    <tr>
                        <th>
                            <span class="tit">شماره</span>


                        </th>
                        <th>
                            <span class="tit"> عنوان</span>


                        </th>
                        <th>
                            <span class="tit">مهارت</span>


                        </th>

                        <th> <span class="tit"> وضعیت </span></th>
                        <th> <span class="tit"> پاسخ دهندگان</span></th>
                        <th> <span class="tit"> پاداش</span></th>
                        <th> <span class="tit"> تعداد سوال</span></th>
                        <th> <span class="tit"> تاریخ ایجاد</span></th>
                        <th> <span class="tit"> تایید ادمین </span></th>
                        <th>
                            <span class="tit"> عملکرد</span>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($counsels as $counsel)
                        <tr>
                            <td><span>{{ $loop->iteration }}</span></td>
                            <td><span>{{ $counsel->title }}</span></td>
                            <td><span>{{ implode(' ',$counsel->skills()->pluck('name')->toArray()) }}</span></td>
                            <td><span>{{ __('arr.' . $counsel->status) }}</span></td>
                            <td><span>0 </span></td>
                            <td><span>{{ __('arr.' . $counsel->reward) }}</span></td>
                            <td><span>
                                    {{ $counsel->Counselquestions()->count() }}
                                </span></td>
                            <td><span>{{ Morilog\Jalali\Jalalian::forge($counsel->created_at)->format('Y-m-d') }}</span>
                            </td>

                            <td><span
                                    {{ $counsel->confirm ? '  orange ' : 'green   ' }}>{{ $counsel->confirm ? 'تایید شده ' : 'د رانتظار تایید ' }}</span>
                            </td>
                            <td>
                                @if ($counsel->check_for_active())
                                    <form class="inline-block " action="{{ route('active.counsel', $counsel->id) }}"
                                        method="post" data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                        @csrf
                                        @method('post')
                                        <button class="inline-block no_border heart">
                                            منتظر انتشار
                                        </button>
                                    </form>
                                @endif

                                @if (in_array($counsel->reward, ['select_the_best_answer', 'divide_reward']) && $counsel->pay != 1)
                                    <form class="inline-block" action="{{ route('send.bill',$counsel->id) }}" method="post"
                                        data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                        @csrf
                                        @method('post')
                                        <input type="text" value="{{ $counsel->id }}" hidden name="counsel_id">
                                        <input type="text" value="{{ $counsel->price }}" hidden name="amount">
                                        <input type="text" value="pay_counsel" name="type" hidden>
                                        <button class="inline-block stat-box green  no_border">
                                            پرداخت
                                        </button>
                                    </form>
                                @endif



                                <a class="action inline-block" href="">
                                    <span class="icon">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15 23.25H9C3.57 23.25 1.25 20.93 1.25 15.5V9.5C1.25 4.07 3.57 1.75 9 1.75H11C11.41 1.75 11.75 2.09 11.75 2.5C11.75 2.91 11.41 3.25 11 3.25H9C4.39 3.25 2.75 4.89 2.75 9.5V15.5C2.75 20.11 4.39 21.75 9 21.75H15C19.61 21.75 21.25 20.11 21.25 15.5V13.5C21.25 13.09 21.59 12.75 22 12.75C22.41 12.75 22.75 13.09 22.75 13.5V15.5C22.75 20.93 20.43 23.25 15 23.25Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M8.49935 18.1901C7.88935 18.1901 7.32935 17.9701 6.91935 17.5701C6.42935 17.0801 6.21935 16.3701 6.32935 15.6201L6.75935 12.6101C6.83935 12.0301 7.21935 11.2801 7.62935 10.8701L15.5093 2.99006C17.4993 1.00006 19.5193 1.00006 21.5093 2.99006C22.5993 4.08006 23.0893 5.19006 22.9893 6.30006C22.8993 7.20006 22.4193 8.08006 21.5093 8.98006L13.6293 16.8601C13.2193 17.2701 12.4693 17.6501 11.8893 17.7301L8.87935 18.1601C8.74935 18.1901 8.61935 18.1901 8.49935 18.1901ZM16.5693 4.05006L8.68935 11.9301C8.49935 12.1201 8.27935 12.5601 8.23935 12.8201L7.80935 15.8301C7.76935 16.1201 7.82935 16.3601 7.97935 16.5101C8.12935 16.6601 8.36935 16.7201 8.65935 16.6801L11.6693 16.2501C11.9293 16.2101 12.3793 15.9901 12.5593 15.8001L20.4393 7.92006C21.0893 7.27006 21.4293 6.69006 21.4793 6.15006C21.5393 5.50006 21.1993 4.81006 20.4393 4.04006C18.8393 2.44006 17.7393 2.89006 16.5693 4.05006Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M19.8515 10.33C19.7815 10.33 19.7115 10.32 19.6515 10.3C17.0215 9.56003 14.9315 7.47003 14.1915 4.84003C14.0815 4.44003 14.3115 4.03003 14.7115 3.91003C15.1115 3.80003 15.5215 4.03003 15.6315 4.43003C16.2315 6.56003 17.9215 8.25003 20.0515 8.85003C20.4515 8.96003 20.6815 9.38003 20.5715 9.78003C20.4815 10.12 20.1815 10.33 19.8515 10.33Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span> سوالات</span>
                                </a>


                                <a class="action inline-block" href="">
                                    <span> نتیجه</span>
                                </a>


                            </td>
                        </tr>
                    @endforeach





                </tbody>

            </table>  --}}
        </div>
    </div>
    {{--  <div id="register-stpes">
        <div class="dash-title">
            <h3>تعریف خرد جمعی </h3>
        </div>
        <div id="register">

            <div class="form">
                <form action="" id="counsel_form" method="post">
                    @csrf
                    @method('post')
                    <div class="input-label big">
                        <label for="title">
                            <span> عنوان </span>
                        </label>
                        <input type="text" name="title" id="title">
                    </div>

                    <div class="select-label">
                        <label for="gender"> جنسیت</label>
                        <select name="gender" id="gender" class="nice-select" data-place=" جنسیت">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            <option value="male">مرد</option>
                            <option value="female">زن</option>
                        </select>
                    </div>

                    <div class="select-label">
                        <label for="star"> حداقل  ستاره ویژه</label>
                        <select name="star" id="" class="nice-select" data-place="تعداد ستاره ویژه">
                            <option value="">یک گزینه را انتخاب کنید </option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                        </select>
                    </div>
                    <div class="input-label big postion_relative mb-0">
                        <label for="new_op">
                            <span> کلید وازه جدید </span>
                        </label>
                        <input type="text" name="new_op" id="new_op">
                        <span class=" pointer postion_absolute" id="new_tag" value=" ">
                            اضافه
                        </span>
                    </div>
                    <div>
                        <ul id="listq" class="tlist">

                        </ul>
                    </div>



                    <div class="select-label">
                        <label for="skill_id"> تخصص</label>
                        <select name="skill_id" id="skill_id" class="nice-select" data-place=" تخصص">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            @foreach (App\Models\Skill::where('parent_id', '!=', null)->get() as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-label">
                        <label for="degree">مدرک تحصیلی</label>
                        <select name="degree" id="" class="nice-select" data-place="مدرک تحصیلی">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            <option value="under_high_school">زیر دیپلم</option>
                            <option value="high_school"> دیپلم</option>
                            <option value="associate_degree">کاردانی </option>
                            <option value="master"> کارشناسی</option>
                            <option value="high_master">کارشناسی ارشد </option>
                            <option value="سphd"> phd</option>
                            <option value="high_school">دیپلم
                            </option>
                        </select>
                    </div>

                    <div class="select-label">
                        <label for="answers"> حداکثر پاسخ دهنده گان</label>
                        <select name="answers" id="answers" class="nice-select" data-place=" پاسخ دهنده گان   ">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            @for ($i = 5; $i < 50; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="select-label">
                        <label for="reward"> پاداش پرداختی </label>
                        <select name="reward" id="reward" class="nice-select" data-place="پاداش پرداختی">
                            <option value="no_reward"> بدون پاداش </option>
                            <option value="select_the_best_answer"> انتخاب پاسخ برتر </option>
                            <option value="divide_reward"> تقسیم بین همه </option>
                        </select>
                    </div>




                    <div class="input-label big" id="p_price" style="display:none">
                        <label for="">قیمت برای پاسخ </label>
                        <input type="number" name="price" id="price" class="rtl_dir number_format amount_zero" placeholder="" value="0">
                        <div class="un">
                            <span>تومان</span>
                        </div>
                    </div>
                    <div class="footer-section">
                        <div class="pair-button">


                            <div id="save__b" style="display:">

                            <span class="mid-button blue pointer" id="save_counsel" value=" ">
                                ذخیره
                            </span>
                        </div>
                           <div id="pay_b" style="display:none">

                                <button form="pay_d" style="background:#" class="mid-button blue pointer">
                                    پرداخت
                                </button>
                           </div>

                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>  --}}
@endsection
