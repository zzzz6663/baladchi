<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="26px" height="26px" viewBox="0 0 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>آیکن</title>
                    <defs>
                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%"
                            id="linearGradient-1">
                            <stop stop-color="#5A8DEE" offset="0%"></stop>
                            <stop stop-color="#699AF9" offset="100%"></stop>
                        </linearGradient>
                        <linearGradient x1="0%" y1="0%" x2="100%" y2="100%"
                            id="linearGradient-2">
                            <stop stop-color="#FDAC41" offset="0%"></stop>
                            <stop stop-color="#E38100" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <g id="Pages" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Login---V2" transform="translate(-667.000000, -290.000000)">
                            <g id="Login" transform="translate(519.000000, 244.000000)">
                                <g id="Logo" transform="translate(148.000000, 42.000000)">
                                    <g id="icon" transform="translate(0.000000, 4.000000)">
                                        <path
                                            d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5423509 4.74623858,13.2027679 4.78318172,12.8686032 L8.54810407,12.8689442 C8.48567157,13.19852 8.45300462,13.5386269 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.5386269,8.45300462 13.19852,8.48567157 12.8689442,8.54810407 L12.8686032,4.78318172 C13.2027679,4.74623858 13.5423509,4.72727273 13.8863636,4.72727273 Z"
                                            id="Combined-Shape" fill="#4880EA"></path>
                                        <path
                                            d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z"
                                            id="Combined-Shape2" fill="url(#linearGradient-1)"></path>
                                        <rect id="Rectangle" fill="url(#linearGradient-2)" x="0" y="0"
                                            width="7.68181818" height="7.68181818"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">فرست</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps ps__rtl ps--active-y">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('user.index') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}"
                class="menu-link {{ Request::url() == route('user.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>کاربران</div>
            </a>
        </li> <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('advertise.index') ? 'active' : '' }}">
            <a href="{{ route('advertise.index') }}"
                class="menu-link  {{ Request::url() == route('advertise.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>آگهی ها </div>
                @if($ad=App\Models\Advertise::whereConfirm(null)->count())
                <span class="red_cir2">
                    {{ $ad }}
                </span>
                @endif
            </a>
        </li>
        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('category.index') ? 'active' : '' }}">
            <a href="{{ route('category.index') }}"
                class="menu-link {{ Request::url() == route('category.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>دسته بندی اصلی </div>
            </a>
        </li>
        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('subset.index') ? 'active' : '' }}">
            <a href="{{ route('subset.index') }}"
                class="menu-link {{ Request::url() == route('subset.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div> زیر دسته ها میانی </div>
            </a>
        </li>


        <!-- Dashboardss -->
        <li class="menu-item {{ Request::url() == route('telic.index') ? 'active' : '' }}">
            <a href="{{ route('telic.index') }}"
                class="menu-link {{ Request::url() == route('telic.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div> زیر دسته ها نهایی </div>
            </a>
        </li>
        <!-- Dashbosards -->
        <li class="menu-item {{ Request::url() == route('question.index') ? 'active' : '' }}">
            <a href="{{ route('question.index') }}"
                class="menu-link {{ Request::url() == route('question.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div> سوالات </div>
            </a>
        </li>

        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('region.index') ? 'active' : '' }}">
            <a href="{{ route('region.index') }}"
                class="menu-link {{ Request::url() == route('region.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div> مناطق </div>
            </a>
        </li>

        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('filter.index') ? 'active' : '' }}">
            <a href="{{ route('filter.index') }}"
                class="menu-link {{ Request::url() == route('filter.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div> فیلتر </div>
            </a>
        </li>
        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('province.index') ? 'active' : '' }}">
            <a href="{{ route('province.index') }}"
                class="menu-link {{ Request::url() == route('province.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div> استان ها </div>
            </a>
        </li>
        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('city.index') ? 'active' : '' }}">
            <a href="{{ route('city.index') }}"
                class="menu-link {{ Request::url() == route('city.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div> شهر ها </div>
            </a>
        </li>

        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('report.index') ? 'active' : '' }}">
            <a href="{{ route('report.index') }}"
                class="menu-link {{ Request::url() == route('report.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>   گزارشات آگهی  </div>
            </a>
        </li>
        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('bill.index') ? 'active' : '' }}">
            <a href="{{ route('bill.index') }}"
                class="menu-link {{ Request::url() == route('bill.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>    تراکنش ها   </div>
            </a>
        </li>



        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('skill.index') ? 'active' : '' }}">
            <a href="{{ route('skill.index') }}"
                class="menu-link {{ Request::url() == route('skill.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>    مهارت ها   </div>
            </a>
        </li>

        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('comment.index') ? 'active' : '' }}">
            <a href="{{ route('comment.index') }}"
                class="menu-link {{ Request::url() == route('comment.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>      نظرات   </div>
                @if($cm=App\Models\comment::whereConfirm(null)->count())
                <span class="red_cir2">
                    {{ $cm }}
                </span>
                @endif

            </a>
        </li>

        <!-- Dashboards -->
        <li class="menu-item {{ Request::url() == route('deposit.index') ? 'active' : '' }}">
            <a href="{{ route('deposit.index') }}"
                class="menu-link {{ Request::url() == route('deposit.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>  بیعانه ها   </div>
            </a>
        </li>


        <li class="menu-item {{ Request::url() == route('counsel.index') ? 'active' : '' }}">
            <a href="{{ route('counsel.index') }}"
                class="menu-link {{ Request::url() == route('counsel.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>    خرد جمعی ها   </div>
                @if($co=App\Models\Counsel::whereConfirm(null)->count())
                <span class="red_cir2">
                    {{ $co }}
                </span>
                @endif

            </a>
        </li>

        <li class="menu-item {{ Request::url() == route('allresumes.index') ? 'active' : '' }}">
            <a href="{{ route('allresumes.index') }}"
                class="menu-link {{ Request::url() == route('allresumes.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>    رزومه ها   </div>
                @if($re=App\Models\Counsel::whereConfirm(null)->count())
                <span class="red_cir2">
                    {{ $re }}
                </span>
                @endif
            </a>
        </li>


        <li class="menu-item {{ Request::url() == route('talk.index') ? 'active' : '' }}">
            <a href="{{ route('talk.index') }}"
                class="menu-link {{ Request::url() == route('talk.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>    مشاوره ها   </div>
            </a>
        </li>
        <li class="menu-item {{ Request::url() == route('setting.index') ? 'active' : '' }}">
            <a href="{{ route('setting.index') }}"
                class="menu-link {{ Request::url() == route('setting.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>    تنظیمات    </div>
            </a>
        </li>
        <li class="menu-item {{ Request::url() == route('support.index') ? 'active' : '' }}">
            <a href="{{ route('support.index') }}"
                class="menu-link {{ Request::url() == route('support.index') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-users"></i>
                <div>    پشتیبانی    </div>

                @if(auth()->user()->unread_message())
                <span class="num red_cir2">{{ auth()->user()->unread_message() }}</span>
                @endif
            </a>

        </li>
        <li class="menu-item">
            <a href="{{ route('logout') }}" class="menu-link {{ Request::url() == route('logout') ? 'active' : '' }}">
                <i class="menu-icon  fa-solid fa-right-from-bracket"></i>
                <div>خروج</div>
            </a>
        </li>

</aside>
