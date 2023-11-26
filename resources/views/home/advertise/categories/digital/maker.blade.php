
<div class="select-label">
    <label for="maker">
  سازنده
    </label>
    <select name="maker" id="maker" class="nice-select select2" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("maker")=="apple"?"selected":"" }} value="apple"> apple      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="samsung"?"selected":"" }} value="samsung"> samsung      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="htc"?"selected":"" }} value="htc"> htc      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="sonyerisson"?"selected":"" }} value="sonyerisson"> sonyerisson      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="nokia"?"selected":"" }} value="nokia"> nokia      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="sony"?"selected":"" }} value="sony"> sony      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="lg"?"selected":"" }} value="lg"> lg      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="motorola"?"selected":"" }} value="motorola"> motorola      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="huawei"?"selected":"" }} value="huawei"> huawei      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="blackberry"?"selected":"" }} value="blackberry"> blackberry      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="acer"?"selected":"" }} value="acer"> acer      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="asus"?"selected":"" }} value="asus"> asus      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="dell"?"selected":"" }} value="dell"> dell      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="lenovo"?"selected":"" }} value="lenovo"> lenovo      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="amazon"?"selected":"" }} value="amazon"> amazon      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="farassoo"?"selected":"" }} value="farassoo"> farassoo      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="zte"?"selected":"" }} value="zte"> zte      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="veiwsonic"?"selected":"" }} value="veiwsonic"> veiwsonic      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="zte"?"selected":"" }} value="zte"> zte      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="msi"?"selected":"" }} value="msi"> msi      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="honor"?"selected":"" }} value="honor"> honor      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="smart"?"selected":"" }} value="smart"> smart      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="glx"?"selected":"" }} value="glx"> glx      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="gplus"?"selected":"" }} value="gplus"> gplus      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="xiaomi"?"selected":"" }} value="xiaomi"> xiaomi      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="google"?"selected":"" }} value="google"> google      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="microsoft"?"selected":"" }} value="microsoft"> microsoft      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="nartab"?"selected":"" }} value="nartab"> nartab      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="marshal"?"selected":"" }} value="marshal"> marshal      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="hyundai"?"selected":"" }} value="hyundai"> hyundai      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="oneplus"?"selected":"" }} value="oneplus"> oneplus      </option>
       <option  {{ $advertise && $advertise->show_option("maker")=="other"?"selected":"" }} value="other"> سایر     </option>
    </select>
</div>


