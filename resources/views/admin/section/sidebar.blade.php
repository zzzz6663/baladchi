<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="app-brand demo">

            <img class="logo_l" src="/icon/logo.png" alt="">


    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps ps__rtl ps--active-y">
        <!-- Dashboaxxxxssssrds -->
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
        <!-- Dashboardssss -->
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
                @if($cm=App\Models\Comment::whereConfirm(null)->count())
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
                @if($re=App\Models\Resume::whereConfirm(null)->count())
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
