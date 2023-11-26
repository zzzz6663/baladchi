
<div class="select-label">
    <label for="type_of_clothing">
        نوع لباس
    </label>
    <select name="type_of_clothing" id="type_of_clothing" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="manto"?"selected":"" }} value="manto">مانتو</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="scarf"?"selected":"" }} value="scarf"> شال و روسری</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="t_shirt"?"selected":"" }} value="t_shirt"> تیشرت</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="blouse"?"selected":"" }} value="blouse"> بلوز و شومیز</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="pants"?"selected":"" }} value="pants"> شلوار</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="jackets"?"selected":"" }} value="jackets"> ژاکت و پلیور</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="formal_clothes"?"selected":"" }} value="formal_clothes"> لباس مجلسی</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="Wedding_dress"?"selected":"" }} value="Wedding_dress"> لباس عروسی</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="suit"?"selected":"" }} value="suit"> کت و شلوار</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="under_wear"?"selected":"" }} value="under_wear"> لباس زیر</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="jacket_overcoat_raincoat"?"selected":"" }} value="jacket_overcoat_raincoat"> کاپشن ، پالتو ، بارانی </option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="jogging_suit"?"selected":"" }} value="jogging_suit"> لباس ورزشی</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="gloves"?"selected":"" }} value="gloves"> جوراب ، ساق ، دستکش</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="hat"?"selected":"" }} value="hat"> کلاه</option>
       <option  {{ $advertise && $advertise->show_option("type_of_clothing")=="other"?"selected":"" }} value="other"> سایر</option>
    </select>
</div>


