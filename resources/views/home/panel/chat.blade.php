@extends('main.panel')
@section('content')
    <div id="chat-boxes">
        <div class="backhome">
            <a href="{{route("login")}}" class="back-home-btn">
                <span class="icon">
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.98827 4.94467C5.98829 4.80743 5.96128 4.67154 5.90877 4.54474C5.85627 4.41794 5.7793 4.30271 5.68227 4.20566L1.78228 0.305664C1.58641 0.109802 1.32077 -0.000243733 1.04378 -0.000243708C0.76679 -0.000243684 0.501149 0.109802 0.305287 0.305665C0.109425 0.501527 -0.000621163 0.767169 -0.000621139 1.04416C-0.000621115 1.32115 0.109425 1.58679 0.305287 1.78265L2.70528 4.94666L0.305288 8.11066C0.109425 8.30652 -0.000620481 8.57216 -0.000620456 8.84915C-0.000620432 9.12614 0.109426 9.39182 0.305288 9.58768C0.50115 9.78354 0.766791 9.89356 1.04378 9.89356C1.32077 9.89356 1.58642 9.78354 1.78228 9.58768L5.68227 5.68765C5.77983 5.59016 5.85711 5.4743 5.90963 5.34677C5.96215 5.21924 5.98887 5.08259 5.98827 4.94467Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <span>بازگشت به خانه</span>
            </a>
        </div>

        <div class="chat-boxes">
            <div class="user-list">

                <div class="top">
                    <h4>لیست مخاطبان</h4>
                    <button class="user-search-toggle">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.0271 12.8476L17.5963 16.4159L16.4171 17.5951L12.8488 14.0259C11.5211 15.0903 9.86964 15.6692 8.16797 15.6667C4.02797 15.6667 0.667969 12.3067 0.667969 8.16675C0.667969 4.02675 4.02797 0.666748 8.16797 0.666748C12.308 0.666748 15.668 4.02675 15.668 8.16675C15.6704 9.86842 15.0915 11.5199 14.0271 12.8476ZM12.3555 12.2292C13.4131 11.1417 14.0037 9.68377 14.0013 8.16675C14.0013 4.94341 11.3905 2.33341 8.16797 2.33341C4.94464 2.33341 2.33464 4.94341 2.33464 8.16675C2.33464 11.3892 4.94464 14.0001 8.16797 14.0001C9.68499 14.0025 11.1429 13.4118 12.2305 12.3542L12.3555 12.2292Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                    <div class="user-search">
                        <div class="close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="18"
                                height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </div>
                        <input type="text">
                        <button>
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.0271 12.8476L17.5963 16.4159L16.4171 17.5951L12.8488 14.0259C11.5211 15.0903 9.86964 15.6692 8.16797 15.6667C4.02797 15.6667 0.667969 12.3067 0.667969 8.16675C0.667969 4.02675 4.02797 0.666748 8.16797 0.666748C12.308 0.666748 15.668 4.02675 15.668 8.16675C15.6704 9.86842 15.0915 11.5199 14.0271 12.8476ZM12.3555 12.2292C13.4131 11.1417 14.0037 9.68377 14.0013 8.16675C14.0013 4.94341 11.3905 2.33341 8.16797 2.33341C4.94464 2.33341 2.33464 4.94341 2.33464 8.16675C2.33464 11.3892 4.94464 14.0001 8.16797 14.0001C9.68499 14.0025 11.1429 13.4118 12.2305 12.3542L12.3555 12.2292Z"
                                    fill="currentColor" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="tab-nav">
                    <ul>
                        <li><span>آگهی</span></li>
                        <li class="active"><span>مستقیم</span></li>
                        {{--  <li><span>عمومی</span></li>
                    <li><span>بلدچی</span></li>  --}}
                    </ul>
                </div>
                <div class="tab-container">
                    <ul>
                        <li>
                            @foreach ($all_chats as $s_chat)
                                {{--  @dd( $s_chat)  --}}
                                <div class="chat-user-list get_chat pointer" data-uni="{{ $s_chat->uni }}"
                                    data-current="{{ auth()->user()->id }}" data-id="{{ $s_chat->uni }}"
                                    data-visitor="{{ $s_chat->advertise->visitor($s_chat->uni)->id }}"
                                    data-user="{{ $s_chat->advertise->user->id }}">
                                    <div class="chat-user active">
                                        <div class="img">
                                            <img src="{{ asset($s_chat->advertise->first_image()) }}" alt="">
                                        </div>
                                        <div class="inf">
                                            <h4> {{ $s_chat->advertise->title }} </h4>
                                            @if ($user->id == $s_chat->advertise->user->id)
                                                <span id="user_{{ $s_chat->advertise->visitor($s_chat->uni)->id }}"
                                                    class=" ">
                                                    {{ $s_chat->advertise->visitor($s_chat->uni)->name }}
                                                    {{ $s_chat->advertise->visitor($s_chat->uni)->family }} </span>
                                            @else
                                                <span id="user_{{ $s_chat->advertise->user->id }}" class=" ">
                                                    {{ $s_chat->advertise->user->name }}
                                                    {{ $s_chat->advertise->user->family }} </span>
                                            @endif

                                        </div>
                                        {{--  <div id="type_{{ $user->id == $s_chat->advertise->user->id?$s_chat->advertise->visitor($s_chat->uni)->id:$s_chat->advertise->user->id }}" class="typing" style=""> </div>  --}}
                                        <div id="type_{{ $s_chat->uni }}" class="typing" style=""> </div>

                                    </div>

                                </div>
                            @endforeach
                            <span href="#" class="back-home-btn back_get_chat pointer" style="display: none">
                                <span class="icon">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.98827 4.94467C5.98829 4.80743 5.96128 4.67154 5.90877 4.54474C5.85627 4.41794 5.7793 4.30271 5.68227 4.20566L1.78228 0.305664C1.58641 0.109802 1.32077 -0.000243733 1.04378 -0.000243708C0.76679 -0.000243684 0.501149 0.109802 0.305287 0.305665C0.109425 0.501527 -0.000621163 0.767169 -0.000621139 1.04416C-0.000621115 1.32115 0.109425 1.58679 0.305287 1.78265L2.70528 4.94666L0.305288 8.11066C0.109425 8.30652 -0.000620481 8.57216 -0.000620456 8.84915C-0.000620432 9.12614 0.109426 9.39182 0.305288 9.58768C0.50115 9.78354 0.766791 9.89356 1.04378 9.89356C1.32077 9.89356 1.58642 9.78354 1.78228 9.58768L5.68227 5.68765C5.77983 5.59016 5.85711 5.4743 5.90963 5.34677C5.96215 5.21924 5.98887 5.08259 5.98827 4.94467Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span>همه </span>
                            </span>
                        </li>
                        <li class="active ">
                            @foreach ($direct_chats as $direct_chat)
                                <div class="chat-user-list get_direct pointer" data-current="{{ auth()->user()->id }}"
                                    data-user="{{ auth()->user()->id }}" data-uni="{{ $direct_chat->uni }}"
                                    data-to="{{ $user->id == $direct_chat->user_id ? $direct_chat->to_id : $direct_chat->user_id }}">
                                    <div class="chat-user active">
                                        <div class="img">
                                            <img src="{{ asset($direct_chat->to->avatar()) }}" alt="">
                                        </div>
                                        <div class="inf">
                                            @if ($user->id == $direct_chat->user_id)
                                                <span id="user_d_{{ $direct_chat->to->id }}" class=" ">
                                                    {{ $direct_chat->to->name }} {{ $direct_chat->to->family }}
                                                </span>
                                            @else
                                                <span id="user_d_{{ $direct_chat->user->id }}" class=" ">
                                                    {{ $direct_chat->user->name }} {{ $direct_chat->user->family }}
                                                </span>
                                            @endif
                                            @if ($user->unread_message($direct_chat->uni))
                                                <span class="red_cir">
                                                    {{ $user->unread_message($direct_chat->uni) }}</span>
                                            @endif
                                        </div>
                                        <div id="direct_{{ $direct_chat->uni }}" class="typing" style=""> </div>
                                    </div>
                                </div>
                            @endforeach
                            <span href="#" class="back-home-btn back_direct_chat pointer" style="display: none">
                                <span class="icon">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.98827 4.94467C5.98829 4.80743 5.96128 4.67154 5.90877 4.54474C5.85627 4.41794 5.7793 4.30271 5.68227 4.20566L1.78228 0.305664C1.58641 0.109802 1.32077 -0.000243733 1.04378 -0.000243708C0.76679 -0.000243684 0.501149 0.109802 0.305287 0.305665C0.109425 0.501527 -0.000621163 0.767169 -0.000621139 1.04416C-0.000621115 1.32115 0.109425 1.58679 0.305287 1.78265L2.70528 4.94666L0.305288 8.11066C0.109425 8.30652 -0.000620481 8.57216 -0.000620456 8.84915C-0.000620432 9.12614 0.109426 9.39182 0.305288 9.58768C0.50115 9.78354 0.766791 9.89356 1.04378 9.89356C1.32077 9.89356 1.58642 9.78354 1.78228 9.58768L5.68227 5.68765C5.77983 5.59016 5.85711 5.4743 5.90963 5.34677C5.96215 5.21924 5.98887 5.08259 5.98827 4.94467Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span>همه </span>
                            </span>
                        </li>
                        {{--  <li>
                        <div class="chat-user-list">
                            <div class="chat-user active">
                                <div class="img">
                                    <img src="images/user1.jpg" alt="">
                                </div>
                                <div class="inf">
                                    <h4>عرفان آماده </h4>
                                    <span>بلدچی طراحی سایت، برنامه نویسی</span>
                                </div>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div class="chat-user-list">
                            <div class="chat-user active">
                                <div class="img">
                                    <img src="images/user1.jpg" alt="">
                                </div>
                                <div class="inf">
                                    <h4>عرفان آماده </h4>
                                    <span>بلدچی طراحی سایت، برنامه نویسی</span>
                                </div>
                            </div>

                        </div>
                    </li>  --}}
                    </ul>
                </div>
            </div>
            <div class="chat-room" id="chat_box">

            </div>


        </div>

    </div>
@endsection
@section('script')
    @if (request('support'))
        <script>
            if (window.jQuery) {

                setTimeout(() => {
                    console.log(655544444)
                    let el = $('[data-uni="1_{{ $user->id }}"]');
                    let el2 = $('[data-uni="{{ $user->id }}_1"]');
                    console.log(el)
                    console.log(el2)
                    if (el) {
                        console.log(41)

                        el.trigger('click');
                    }
                    if (el2) {
                        console.log(42)
                        el2.trigger('click');
                    }
                }, 1000);



            }
        </script>
    @endif
@endsection
