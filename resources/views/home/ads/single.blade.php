@if ($advertise->vip)
    @auth
        @if ($user->balance < $advertise->show_option('least_price'))
            <a href="#" class="mony_less" data-ba="{{ $user->balance }}"
                data-mo="{{ $advertise->show_option('least_price') }}">
            @else
                <a href="{{ route('single.ad', $advertise->id) }}">
        @endif
        <span class="moving">{{ $user->ad_note($advertise) }}</span>
    @endauth
    @guest
        <a href="#" class="go_login">
        @endguest
    @else
        <a class="go_ad" href="{{ route('single.ad', $advertise->id) }}">
@endif






<div class="single-ads {{ $advertise->check_seen() ? 'seen' : '' }} single_gggg ">

    <div class="top">
        <div class="location">
            <span class="icon">
                <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 13.4334L9.3 10.1334C9.9526 9.48078 10.397 8.64926 10.577 7.74403C10.7571 6.8388 10.6646 5.90051 10.3114 5.04781C9.95817 4.19512 9.36003 3.46632 8.59261 2.95356C7.82519 2.4408 6.92296 2.16711 6 2.16711C5.07704 2.16711 4.17481 2.4408 3.40739 2.95356C2.63997 3.46632 2.04183 4.19512 1.68861 5.04781C1.33539 5.90051 1.24294 6.8388 1.42297 7.74403C1.603 8.64926 2.04741 9.48078 2.7 10.1334L6 13.4334ZM6 15.3188L1.75734 11.0761C0.918228 10.237 0.346791 9.16789 0.115286 8.00401C-0.11622 6.84013 0.00260456 5.63373 0.456732 4.53738C0.91086 3.44103 1.6799 2.50396 2.66659 1.84467C3.65328 1.18539 4.81332 0.833496 6 0.833496C7.18669 0.833496 8.34672 1.18539 9.33342 1.84467C10.3201 2.50396 11.0891 3.44103 11.5433 4.53738C11.9974 5.63373 12.1162 6.84013 11.8847 8.00401C11.6532 9.16789 11.0818 10.237 10.2427 11.0761L6 15.3188ZM6 8.16678C6.35362 8.16678 6.69276 8.0263 6.94281 7.77625C7.19286 7.5262 7.33334 7.18707 7.33334 6.83344C7.33334 6.47982 7.19286 6.14068 6.94281 5.89064C6.69276 5.64059 6.35362 5.50011 6 5.50011C5.64638 5.50011 5.30724 5.64059 5.05719 5.89064C4.80715 6.14068 4.66667 6.47982 4.66667 6.83344C4.66667 7.18707 4.80715 7.5262 5.05719 7.77625C5.30724 8.0263 5.64638 8.16678 6 8.16678ZM6 9.50011C5.29276 9.50011 4.61448 9.21916 4.11438 8.71906C3.61429 8.21897 3.33334 7.54069 3.33334 6.83344C3.33334 6.1262 3.61429 5.44792 4.11438 4.94783C4.61448 4.44773 5.29276 4.16678 6 4.16678C6.70725 4.16678 7.38552 4.44773 7.88562 4.94783C8.38572 5.44792 8.66667 6.1262 8.66667 6.83344C8.66667 7.54069 8.38572 8.21897 7.88562 8.71906C7.38552 9.21916 6.70725 9.50011 6 9.50011Z"
                        fill="#828282" />
                </svg>
            </span>

            <span class="state">
                @if ($advertise->city)
                    {{ $advertise->city->name }}
                @endif
            </span>
            @if ($advertise->region)
                <span>،</span>
                <span class="city"> {{ $advertise->region->name }}</span>
            @endif
        </div>
        <div class="date">
            <span class="icon">
                <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.00016 14.1666C3.31816 14.1666 0.333496 11.1819 0.333496 7.49992C0.333496 3.81792 3.31816 0.833252 7.00016 0.833252C10.6822 0.833252 13.6668 3.81792 13.6668 7.49992C13.6668 11.1819 10.6822 14.1666 7.00016 14.1666ZM7.00016 12.8333C8.41465 12.8333 9.7712 12.2713 10.7714 11.2712C11.7716 10.271 12.3335 8.91441 12.3335 7.49992C12.3335 6.08543 11.7716 4.72888 10.7714 3.72868C9.7712 2.72849 8.41465 2.16659 7.00016 2.16659C5.58567 2.16659 4.22912 2.72849 3.22893 3.72868C2.22873 4.72888 1.66683 6.08543 1.66683 7.49992C1.66683 8.91441 2.22873 10.271 3.22893 11.2712C4.22912 12.2713 5.58567 12.8333 7.00016 12.8333ZM7.66683 7.49992H10.3335V8.83325H6.3335V4.16658H7.66683V7.49992Z"
                        fill="#828282" />
                </svg>
            </span>
            <span class="text">
                {{ Carbon\Carbon::parse($advertise->created_at)->ago() }}
            </span>
        </div>
    </div>
    <div class="img ad_img">
        @if ($advertise->vip)
            <span class="label">VIP</span>
        @endif

        {{--  @if ($advertise->vip)
            @auth
                @if ($user->balance < $advertise->show_option('least_price'))
                    <a href="#" class="mony_less" data-ba="{{ $user->balance }}"
                        data-mo="{{ $advertise->show_option('least_price') }}"> <img src="{{ $advertise->first_image() }}"
                            alt=""></a>
                @else
                    <a href="{{ route('single.ad', $advertise->id) }}">
                        <img src="{{ $advertise->first_image() }}" alt="">
                    </a>
                @endif
                <span class="moving">{{ $user->ad_note($advertise) }}</span>
            @endauth
            @guest
                <a href="#">
                    <img src="{{ $advertise->first_image() }}" alt="">
                </a>

            @endguest
        @else
            <a href="{{ route('single.ad', $advertise->id) }}">
                <img src="{{ $advertise->first_image() }}" alt="">
            </a>
        @endif  --}}


        <img src="{{ $advertise->first_image() }}" alt="">

        <button class="like-btn fave_f check_fave {{ in_array($advertise->id, $user_fave) ? 'active' : '' }}"
            data-id="{{ $advertise->id }}">
            <svg class="fave_f" data-id="{{ $advertise->id }}" width="20" height="19" viewBox="0 0 20 19"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.5 0C17.538 0 20 2.5 20 6C20 13 12.5 17 10 18.5C7.5 17 0 13 0 6C0 2.5 2.5 0 5.5 0C7.36 0 9 1 10 2C11 1 12.64 0 14.5 0ZM10.934 15.604C11.815 15.048 12.61 14.495 13.354 13.903C16.335 11.533 18 8.943 18 6C18 3.64 16.463 2 14.5 2C13.424 2 12.26 2.57 11.414 3.414L10 4.828L8.586 3.414C7.74 2.57 6.576 2 5.5 2C3.56 2 2 3.656 2 6C2 8.944 3.666 11.533 6.645 13.903C7.39 14.495 8.185 15.048 9.066 15.603C9.365 15.792 9.661 15.973 10 16.175C10.339 15.973 10.635 15.792 10.934 15.604Z"
                    fill="currentColor" />
            </svg>

        </button>
        @auth
            <span class="moving">{{ $user->ad_note($advertise) }}</span>
        @endauth
    </div>
    <div class="title">
        <h4>

            {{ $advertise->title }}
            {{--  @if ($advertise->vip)
                @auth
                    @if ($user->balance < $advertise->show_option('least_price'))
                        <a href="#" class="mony_less" data-ba="{{ $user->balance }}"
                            data-mo="{{ $advertise->show_option('least_price') }}">{{ $advertise->title }}</a>
                    @else
                        <a href="{{ route('single.ad', $advertise->id) }}">{{ $advertise->title }}</a>
                    @endif
                    <span class="moving">{{ $user->ad_note($advertise) }}</span>
                @endauth
                @guest
                    <a href="#" class="go_login">{{ $advertise->title }}</a>
                @endguest
            @else
                <a href="{{ route('single.ad', $advertise->id) }}">{{ $advertise->title }}</a>
            @endif  --}}
        </h4>
    </div>
    <div class="price">
        @if ($advertise->subset_id == 1)
            <div>
                {{--  @if ($advertise->show_option('deposit'))
                    <span class="num">
                        ودیعه:
                        {{ number_format($advertise->show_option('deposit')) }}

                    </span>
                    <span class="un">تومان</span>
                @endif  --}}

                @if ($advertise->show_option('deposit')=="0" )
                رهن:
                رایگان
                @elseif(!$advertise->show_option('deposit'))
                رهن:
                توافقی
                @else
                <span class="num">
                    رهن:
                    {{ number_format($advertise->show_option('deposit')) }}
                </span>
                <span class="un">تومان</span>
                @endif

            </div>
            <div>
                @if ($advertise->show_option('monthly_rent')=="0" )
                اجاره:
                رایگان
                @elseif(!$advertise->show_option('monthly_rent'))
                اجاره:
                توافقی
                @else
                <span class="num">
                    اجاره:
                    {{ number_format($advertise->show_option('monthly_rent')) }}
                </span>
                <span class="un">تومان</span>
                @endif
            {{--  {{ $advertise->show_option('monthly_rent') }}  --}}

            </div>
        @endif
        @if ($advertise->show_option('price'))
            <span class="num">
                {{ number_format($advertise->show_option('price')) }}

            </span>
            <span class="un">تومان</span>
        @endif

        @if ($advertise->sort)
            <span class="num sort">
                تردبان شده
            </span>
        @endif

    </div>
</div>
</a>
