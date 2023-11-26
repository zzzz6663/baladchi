
<div class="select-label">
    <label for="pc_os">
        سیستم عامل
    </label>
    <select name="pc_os" id="pc_os" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option {{ $advertise && $advertise->show_option("pc_os")=="winxp"?"selected":"" }} value="winxp">window xp  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="win7"?"selected":"" }} value="win7">window 7  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="win8"?"selected":"" }} value="win8">window 8  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="win10"?"selected":"" }} value="win10">window 10  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="win11"?"selected":"" }} value="win11">window 11  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="win11"?"selected":"" }} value="win11">window 11  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="macos"?"selected":"" }} value="macos">  macos  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="chrome"?"selected":"" }} value="chrome">google chrome  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="linux"?"selected":"" }} value="linux">linux  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="obuntu"?"selected":"" }} value="obuntu">سایر  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="dos"?"selected":"" }} value="dos">dos  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="without_os"?"selected":"" }} value="without_os">بدون سیستم عامل  </option>
       <option {{ $advertise && $advertise->show_option("pc_os")=="other"?"selected":"" }} value="other">سایر  </option>
    </select>
</div>


