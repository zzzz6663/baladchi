@extends('main.manager')
@section('content')
    <div class="app-chat card overflow-hidden">
        <div class="row g-0">
            <!-- Sidebar Left -->
            <div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
                <div
                    class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                    <div class="avatar avatar-xl avatar-online">
                        <img src="../../assets/img/avatars/1.png" alt="آواتار" class="rounded-circle">
                    </div>
                    <h5 class="mt-2 mb-0">جان اسنو</h5>
                    <small>مدیر</small>
                    <i class="bx bx-x bx-sm cursor-pointer close-sidebar" data-bs-toggle="sidebar" data-overlay=""
                        data-target="#app-chat-sidebar-left"></i>
                </div>
                <div class="sidebar-body px-4 pb-4 ps ps__rtl ps--active-y">
                    <div class="my-4">
                        <p class="text-muted text-uppercase">درباره</p>
                        <textarea id="chat-sidebar-left-user-about" class="form-control chat-sidebar-left-user-about mt-3" rows="4"
                            maxlength="120">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه</textarea>
                    </div>
                    <div class="my-4">
                        <p class="text-muted text-uppercase">وضعیت</p>
                        <div class="d-grid gap-1">
                            <div class="form-check form-check-success">
                                <input name="chat-user-status" class="form-check-input" type="radio" value="active"
                                    id="user-active" checked="">
                                <label class="form-check-label" for="user-active">فعال</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input name="chat-user-status" class="form-check-input" type="radio" value="busy"
                                    id="user-busy">
                                <label class="form-check-label" for="user-busy">مشغول</label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input name="chat-user-status" class="form-check-input" type="radio" value="away"
                                    id="user-away">
                                <label class="form-check-label" for="user-away">دور</label>
                            </div>
                            <div class="form-check form-check-secondary">
                                <input name="chat-user-status" class="form-check-input" type="radio" value="offline"
                                    id="user-offline">
                                <label class="form-check-label" for="user-offline">آفلاین</label>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <p class="text-muted text-uppercase">تنظیمات</p>
                        <ul class="list-unstyled d-grid gap-3 me-3">
                            <li class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bx bx-message-square-detail me-1"></i>
                                    <span class="align-middle">اعتبارسنجی دو مرحله‌ای</span>
                                </div>
                                <label class="switch switch-primary me-4">
                                    <input type="checkbox" class="switch-input" checked="">
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                </label>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bx bx-bell me-1"></i>
                                    <span class="align-middle">اعلان</span>
                                </div>
                                <label class="switch switch-primary me-4">
                                    <input type="checkbox" class="switch-input">
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <i class="bx bx-user me-1"></i>
                                <span class="align-middle">دعوت دوستان</span>
                            </li>
                            <li>
                                <i class="bx bx-trash me-1"></i>
                                <span class="align-middle">حذف حساب</span>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex mt-4">
                        <button class="btn btn-primary" data-bs-toggle="sidebar" data-overlay=""
                            data-target="#app-chat-sidebar-left">
                            خروج
                        </button>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 516px; right: 323px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 370px;"></div>
                    </div>
                </div>
            </div>
            <!-- /Sidebar Left-->

            <!-- Chat & Contacts -->
            <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end" id="app-chat-contacts">
                <div class="sidebar-header py-3 px-4 border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar avatar-online me-3" data-bs-toggle="sidebar"
                            data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
                            <img class="user-avatar rounded-circle cursor-pointer" src="../../assets/img/avatars/1.png"
                                alt="آواتار">
                        </div>
                        <div class="flex-grow-1 input-group input-group-merge rounded-pill">
                            <span class="input-group-text" id="basic-addon-search31"><i
                                    class="bx bx-search fs-4"></i></span>
                            <input type="text" class="form-control chat-search-input" placeholder="جستجو ..."
                                aria-label="Search..." aria-describedby="basic-addon-search31">
                        </div>
                    </div>
                    <i class="bx bx-x cursor-pointer position-absolute top-0 end-0 mt-2 me-1 fs-4 d-lg-none d-block"
                        data-overlay="" data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                </div>
                <div class="sidebar-body ps ps__rtl ps--active-y">
                    <!-- Chats -->
                    <ul class="list-unstyled chat-contact-list" id="chat-list">
                        <li class="chat-contact-list-item chat-contact-list-item-title">
                            <h5 class="text-primary mb-0 secondary-font">گفتگوها</h5>
                        </li>

                        {{--  <div class="chat-user-list  pointer">
                                <div class="chat-user active">
                                    <div class="img">
                                        <img src="{{ asset($direct_chat->to->avatar()) }}" alt="">
                                    </div>
                                    <div class="inf">

                                    </div>
                                    <div style=""> ssssss</div>
                                </div>
                            </div>  --}}

                        @foreach ($direct_chats as $direct_chat)
                            <li class="chat-contact-list-item get_direct" data-current="{{ auth()->user()->id }}"
                                data-user="{{ auth()->user()->id }}" data-uni="{{ $direct_chat->uni }}"
                                data-to="{{ $user->id == $direct_chat->user_id ? $direct_chat->to_id : $direct_chat->user_id }}">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar avatar-online">
                                        <img src="{{ asset($direct_chat->to->avatar()) }}" alt="آواتار"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate m-0">

                                            @if ($user->id == $direct_chat->user_id)
                                                <span id="user_d_{{ $direct_chat->to->id }}" class=" ">
                                                    {{ $direct_chat->to->name }} {{ $direct_chat->to->family }}
                                                </span>
                                            @else
                                                <span id="user_d_{{ $direct_chat->user->id }}" class=" ">
                                                    {{ $direct_chat->user->name }} {{ $direct_chat->user->family }}
                                                </span>
                                            @endif
                                        </h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">

                                            @if ($user->unread_message($direct_chat->uni))
                                                <span class="red_cir">
                                                    {{ $user->unread_message($direct_chat->uni) }}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <small id="direct_{{ $direct_chat->uni }}"class="typing text-muted mb-auto">
                                    </small>
                                </a>
                            </li>
                        @endforeach


                    </ul>

                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 610px; right: 322px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 318px;"></div>
                    </div>
                </div>
            </div>
            <!-- /Chat contacts -->

            <!-- Chat History -->

            <div class="col app-chat-history bg-body">
                <div class="chat-history-wrapper">

                    <div id="chat-boxes">
                        <div class="chat-boxes">
                            <div class=" chat-room" id="chat_box">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Chat History -->

            {{--  <!-- Sidebar Right -->
            <div class="col app-chat-sidebar-right app-sidebar overflow-hidden" id="app-chat-sidebar-right">
                <div
                    class="sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                    <div class="avatar avatar-xl avatar-online">
                        <img src="../../assets/img/avatars/2.png" alt="آواتار" class="rounded-circle">
                    </div>
                    <h6 class="mt-2 mb-0">دیوید بکهام</h6>
                    <span>توسعه دهنده NextJS</span>
                    <i class="bx bx-x bx-sm cursor-pointer close-sidebar d-block" data-bs-toggle="sidebar"
                        data-overlay="" data-target="#app-chat-sidebar-right"></i>
                </div>
                <div class="sidebar-body px-4 pb-4 ps ps__rtl ps--active-y">
                    <div class="my-4">
                        <p class="text-muted text-uppercase">درباره</p>
                        <p class="mb-0 mt-3">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و
                        </p>
                    </div>
                    <div class="my-4">
                        <p class="text-muted text-uppercase">اطلاعات شخصی</p>
                        <ul class="list-unstyled d-grid gap-2 mt-3">
                            <li class="d-flex align-items-center">
                                <i class="bx bx-envelope"></i>
                                <span class="align-middle ms-2">لورم ایپسوم متن ساختگی</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bx bx-phone-call"></i>
                                <span class="align-middle ms-2">+1(123) 456 - 7890</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bx bx-time-five"></i>
                                <span class="align-middle ms-2">شنبه الی پنجشنبه - 10صبح الی 8 شب</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <p class="text-muted text-uppercase">گزینه‌ها</p>
                        <ul class="list-unstyled d-grid gap-2 mt-3">
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class="bx bx-tag"></i>
                                <span class="align-middle ms-2">افزودن برچسب</span>
                            </li>
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class="bx bx-star"></i>
                                <span class="align-middle ms-2">درون‌ریزی مخاطب</span>
                            </li>
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class="bx bx-image"></i>
                                <span class="align-middle ms-2">به اشتراک گذاری رسانه</span>
                            </li>
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class="bx bx-trash"></i>
                                <span class="align-middle ms-2">حذف مخاطب</span>
                            </li>
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class="bx bx-block"></i>
                                <span class="align-middle ms-2">مسدود کردن مخاطب</span>
                            </li>
                        </ul>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 514px; right: 323px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 468px;"></div>
                    </div>
                </div>
            </div>
            <!-- /Sidebar Right -->  --}}

            <div class="app-overlay"></div>
        </div>
    </div>
@endsection
