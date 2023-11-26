
{{-- <div class="sliding-menu">

</div> --}}
<div class="sub lock">
    <ul >
        @foreach ($brands as $chi )
        <li>
            <div data-id="{{ $chi->id }}" data-type="chi" class="sub-slid-end no_subs sub-slid">
                <span>{{ $chi->name }}  </span>
            </div>
        </li>
        @endforeach
    </ul>
</div>

