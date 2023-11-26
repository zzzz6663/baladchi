
<div class="select-label">
    <label for="number_of_sim_cards">
        سیمکارت
    </label>
    <select name="number_of_sim_cards" id="number_of_sim_cards" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option {{ $advertise && $advertise->show_option("number_of_sim_cards")=="1"?"selected":"" }} value="1">1</option>
       <option {{ $advertise && $advertise->show_option("number_of_sim_cards")=="2"?"selected":"" }} value="2">2</option>
       <option {{ $advertise && $advertise->show_option("number_of_sim_cards")=="more_3"?"selected":"" }} value="more_3">سه و بیشتر</option>
    </select>
</div>


