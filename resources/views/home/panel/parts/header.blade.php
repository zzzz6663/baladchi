<div id="dashbaord-header">
    <div class="dash-profile">
        <div class="icon">
            <img src="{{ $user->avatar() }}" alt="">
        </div>
        <div class="inf">
            <h4>
              <a href="{{ route('single.user',$user->id) }}">
                {{ $user->name }}
                {{ $user->family }}
              </a>
            </h4>
            <div class="phone">
                <span>تلفن</span>
                <span>   {{ $user->mobile }}</span>
            </div>
        </div>
    </div>
    {{--  sss  --}}
    <div class="left-sec">
        <div class="iconmenus">
            <ul>
                <li>
                    <a class="iconmenu" href="{{ route("panel.wallet")}}">
                        <span class="icon">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 4H19C19.2652 4 19.5196 4.10536 19.7071 4.29289C19.8946 4.48043 20 4.73478 20 5V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H16V4ZM2 6V16H18V6H2ZM2 2V4H14V2H2ZM13 10H16V12H13V10Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        @if($cou=auth()->user()->bill_not_seen()->count() )
                        <span class="num">
                            {{ $cou }}
                        </span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="iconmenu" href="{{ route("panel.faves") }}">
                        <span class="icon">
                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5 0C17.538 0 20 2.5 20 6C20 13 12.5 17 10 18.5C7.5 17 0 13 0 6C0 2.5 2.5 0 5.5 0C7.36 0 9 1 10 2C11 1 12.64 0 14.5 0ZM10.934 15.604C11.815 15.048 12.61 14.495 13.354 13.903C16.335 11.533 18 8.943 18 6C18 3.64 16.463 2 14.5 2C13.424 2 12.26 2.57 11.414 3.414L10 4.828L8.586 3.414C7.74 2.57 6.576 2 5.5 2C3.56 2 2 3.656 2 6C2 8.944 3.666 11.533 6.645 13.903C7.39 14.495 8.185 15.048 9.066 15.603C9.365 15.792 9.661 15.973 10 16.175C10.339 15.973 10.635 15.792 10.934 15.604Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        @if(auth()->user()->fave_memos())
                        <span class="num">
                            {{ auth()->user()->fave_memos() }}
                        </span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="iconmenu" href="#">
                        <span class="icon">
                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 16H16V9.031C16 5.148 12.866 2 9 2C5.134 2 2 5.148 2 9.031V16ZM9 0C13.97 0 18 4.043 18 9.031V18H0V9.031C0 4.043 4.03 0 9 0ZM6.5 19H11.5C11.5 19.663 11.2366 20.2989 10.7678 20.7678C10.2989 21.2366 9.66304 21.5 9 21.5C8.33696 21.5 7.70107 21.2366 7.23223 20.7678C6.76339 20.2989 6.5 19.663 6.5 19Z" fill="currentColor"></path>
                            </svg>
                        </span>

                    </a>

                </li>
            </ul>
        </div>
        <div class="exit">
            <a href="{{ route('logout') }}" class="logout">
                <span>خروج از حساب</span>
                <span class="icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.89844 7.55999C9.20844 3.95999 11.0584 2.48999 15.1084 2.48999H15.2384C19.7084 2.48999 21.4984 4.27999 21.4984 8.74999V15.27C21.4984 19.74 19.7084 21.53 15.2384 21.53H15.1084C11.0884 21.53 9.23844 20.08 8.90844 16.54" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15.0011 12H3.62109" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M5.85 8.65002L2.5 12L5.85 15.35" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</div>
