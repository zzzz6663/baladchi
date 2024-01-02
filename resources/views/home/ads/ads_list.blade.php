<div class="row">
    @if ($advertises->count())

        @foreach ($advertises as $advertise)
            @if ($advertise->show_option('active_release') && !$advertise->auto_release)
                @continue
            @endif

            <div class="col-xxl-3 col-lg-4 col-md-6">

                @include('home.ads.single')
            </div>
        @endforeach
    @else
        <h1 style="text-align: center">
            هیچ آگهی یافت نشد
            <span class="icon-button red all_cat_show pointer" id="no_ad_exist">
                <span>سایر آگهی ها </span>
            </span>

        </h1>
    @endif

</div>
<div class="row" id="page_ad">
    <div class="col-lg-12">
        <div id="la_pa">
            {{ $advertises->appends(Request::all())->links('home.parts.pagination') }}

        </div>
    </div>
</div>
<script></script>
<form action="" id="req_form">
    {{-- ss @if (!isset($all_req[s'page']))
        <script>
            @if (isset($all_req['remove']))
                localStorage.clear();
                localStorage.removeItem("remove");
                localStorage.removeItem("search");
            @endif
            let back = localStorage.getItem("back");
            if (!back) {
                localStorage.setItem("page", "1");
            }
            localStorage.removeItem("back");
        </script>
    @endif
    @foreach ($all_req as $req => $val)
        @if (is_array($val))
            @continue
        @endif
        @if($val)
        <input hidden type="text" name="{{ $req }}" value="{{ $val }}">
        @endif
        <script>
            localStorage.setItem("{{ $req }}", "{{ $val }}");
        </script>
    @endforeach  --}}
</form>
