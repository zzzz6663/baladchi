@if ($skills->count())

    @if ($balad)

        <ul class="sub-list grandchild_father">
            <li>
                <ul id="grandchild">
                    @foreach ($skills as $n_child)
                    <li>

                        <a href="#" data-id="{{ $n_child->id }}"
                            class=" {{ request('skill_id') == $n_child->id ? 'active_ch_child' : '' }}  sub-list-list-item final_res select_kill_id">
                            {{ $n_child->name }}
                        </a>
                    </li>
                @endforeach
                </ul>
            </li>
        </ul>
    @else

    <div class="sub" style="display: block">
        <div class="clear_search">
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="18"
                    height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#2c3e50" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="5" y1="12" x2="19" y2="12">
                    </line>
                    <line x1="13" y1="18" x2="19" y2="12">
                    </line>
                    <line x1="13" y1="6" x2="19" y2="12">
                    </line>
                </svg>
            </span>
            <span>حذف جستجو</span>
        </div>
        <ul>
            @foreach ($skills as $n_child)
                <li>
                    <div class="sub-slid-end sub_sk animate__animated" data-id="{{ $n_child->id }}"
                        id="sub_sk{{ $n_child->id }}" data-name="{{ $n_child->name }}">
                        <span>{{ $n_child->name }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endif



@else
    <div>
        موردی پیدا نشد
    </div>
@endif
