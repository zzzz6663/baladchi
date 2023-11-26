
<div class="select-label">
    <label for="internal_memory">
        حافظهٔ داخلی
    </label>
    <select name="internal_memory" id="internal_memory" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="4gig"?"selected":"" }} value="4gig">4 گیگ </option>
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="8gig"?"selected":"" }} value="8gig">8 گیگ </option>
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="16gig"?"selected":"" }} value="16gig">16 گیگ </option>
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="32gig"?"selected":"" }} value="32gig">32 گیگ </option>
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="64gig"?"selected":"" }} value="64gig">64 گیگ </option>
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="128gig"?"selected":"" }} value="128gig">128 گیگ </option>
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="256gig"?"selected":"" }} value="256gig">256 گیگ </option>
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="512gig"?"selected":"" }} value="512gig">512 گیگ </option>
       <option   {{ $advertise && $advertise->show_option("internal_memory")=="1tr"?"selected":"" }} value="1tr">1 ترابایت  </option>
    </select>
</div>


