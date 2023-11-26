<div class="select-label">
    <label for="game_console_product_type">
        نوع کالا
    </label>
    <select name="game_console_product_type" id="game_console_product_type" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("game_console_product_type")=="console"?"selected":"" }} value="console">کنسول</option>
        <option  {{ $advertise && $advertise->show_option("game_console_product_type")=="game_pad"?"selected":"" }} value="game_pad">دسته بازی</option>
        <option  {{ $advertise && $advertise->show_option("game_console_product_type")=="account_game"?"selected":"" }} value="account_game">اکانت </option>
        <option  {{ $advertise && $advertise->show_option("game_console_product_type")=="game"?"selected":"" }} value="game">بازی</option>
    </select>
</div>
