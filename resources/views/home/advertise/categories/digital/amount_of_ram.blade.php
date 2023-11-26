
<div class="select-label">
    <label for="amount_of_ram">
        مقدار رم
    </label>
    <select name="amount_of_ram" id="amount_of_ram" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="not_relevant"?"selected":"" }} value="not_relevant">مطرح نیست    </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="768mb"?"selected":"" }} value="768mb">768 مگابایت  </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="1gig"?"selected":"" }} value="1gig">1 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="1_5gig"?"selected":"" }} value="1_5gig">1.5 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="2gig"?"selected":"" }} value="2gig">2 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="3gig"?"selected":"" }} value="3gig">3 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="4gig"?"selected":"" }} value="4gig">4 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="6gig"?"selected":"" }} value="6gig">6 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="8gig"?"selected":"" }} value="8gig">8 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="10gig"?"selected":"" }} value="10gig">10 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="12gig"?"selected":"" }} value="12gig">12 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="16gig"?"selected":"" }} value="16gig">16 گیگ </option>
       <option  {{ $advertise && $advertise->show_option("amount_of_ram")=="18gig"?"selected":"" }} value="18gig">18 گیگ </option>
    </select>
</div>


