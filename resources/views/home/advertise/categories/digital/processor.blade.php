
<div class="select-label">
    <label for="processor">
          پردازنده
    </label>
    <select name="processor" id="" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("processor")=="corei3"?"selected":"" }} value="corei3">  core i3  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="corei5"?"selected":"" }} value="corei5">  core i5  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="corei7"?"selected":"" }} value="corei7">  core i7  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="corei9"?"selected":"" }} value="corei9">  core i9  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="corei9"?"selected":"" }} value="corei9">  core i9  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="core2due"?"selected":"" }} value="core2due">    core 2 due  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="pentium"?"selected":"" }} value="pentium">pentium  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="celeron"?"selected":"" }} value="celeron">celeron  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="atom"?"selected":"" }} value="atom">atom  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="reyzen3"?"selected":"" }} value="reyzen3">reyzen 3  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="reyzen5"?"selected":"" }} value="reyzen5">reyzen 5  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="reyzen7"?"selected":"" }} value="reyzen7">reyzen 7  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="applem1"?"selected":"" }} value="applem1">apple m1  </option>
       <option  {{ $advertise && $advertise->show_option("processor")=="other"?"selected":"" }} value="other">سایر  </option>
    </select>
</div>


