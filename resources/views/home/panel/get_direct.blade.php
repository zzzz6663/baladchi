<div class="top">
    <div class="single-contact">

        <div class="img">
            @if ($user->id == $to->id)
                <img src="{{ $user->avatar() }}" alt="">
            @else
                <img src="{{ $to->avatar() }}" alt="">
            @endif

        </div>
        <div class="info">
            @if ($user->id == $to->id)
                <h4> {{ $user->name() }}</h4>
            @else
                <h4> {{ $to->name() }}</h4>
            @endif
        </div>
        {{--  <div class="img">
            @if ($user->id == $chat->user->id)
            <img src="{{ $chat->user->avatar() }}" alt="">

            @else
            <img src="{{ $chat->to->avatar() }}" alt="">

            @endif

        </div>
        <div class="info">
            @if ($user->id == $chat->user->id)
            <h4> {{ $chat->user->name }} {{ $chat->user->family }} </h4>

            @else
            <h4> {{ $chat->to->name }} {{ $chat->to->family }} </h4>

            @endif
            <span class="job">

                @if ($user->id == $chat->user->id)
                    @foreach ($chat->to->experts as $expert)
                        {{ $expert->name }}
                    @endforeach
                @else
                    @foreach ($chat->user->experts as $expert)
                        {{ $expert->name }}
                    @endforeach
                @endif
            </span>


        </div>  --}}
    </div>
    <div class="left-sec">

        <div class="search-user">
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
        <span class="info ">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM9 5H11V7H9V5ZM9 9H11V15H9V9Z"
                    fill="#A6A5AA" />
            </svg>

        </span>

    </div>
</div>

<div class="room">
    {{--  <div class="date"><span>۱۴۰۰/۱۱/۱۹</span></div>  --}}

    @foreach ($chats as $chat)
        <div class="chat-boxe {{ $chat->user_id == $user->id ? 'right' : 'left' }}">
            <div class="img">
                <img src="{{ $chat->user->avatar() }}" alt="">

            </div>
            <div class="chat">
                <div class="text" id="chat_cl_{{ $chat->id }}">
                    {{ $chat->chat }}
                    @if ($user->id == $chat->user->id)
                        @if ($chat->seen)
                            <span class="material-icons">
                                done_all
                            </span>
                        @else
                            <span class="material-icons">
                                done
                            </span>
                        @endif
                    @endif
                </div>
                <span
                    class="time">{{ Morilog\Jalali\Jalalian::forge($chat->created_at)->format('Y-m-d H:i:s') }}</span>

            </div>
        </div>
    @endforeach

</div>

<div class="chat-writing">
    <form action="">
        <div class="toolbar">

        </div>
        <textarea name="" data-name="{{ auth()->user()->name }} {{ auth()->user()->family }}"
            data-id="{{ $user->id }}" data-uni="{{ $uni }}" id="send_direct" cols="30" rows="10"
            placeholder="پیام خود را بنویسید ..."></textarea>
        <span class="send send_direct pointer " data-to="{{ $to->id }}" data-uni="{{ $uni }}">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.8902 1.49C17.7002 0.220002 19.7702 2.3 18.5102 6.11L15.6802 14.6C13.7802 20.31 10.6602 20.31 8.76018 14.6L7.92018 12.08L5.40018 11.24C-0.309824 9.34 -0.309824 6.23 5.40018 4.32L10.0002 2.79"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </form>
</div>
