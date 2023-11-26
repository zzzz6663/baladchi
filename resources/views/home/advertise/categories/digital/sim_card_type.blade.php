
<div class="select-label">
    <label for="sim_card_type">
        نوع سیم‌کارت

    </label>
    <select name="sim_card_type" id="sim_card_type" class="nice-select" data-place="  انتخاب کنید" {{ $advertise &&  $advertise->show_option("sim_card_type")?"checked":"" }}>
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option value="haval">  همراه اول
    </option>
       <option value="irancell">
        ایرانسل
          </option>
       <option value="rightel">
        رایتل   </option>
    </select>
</div>


