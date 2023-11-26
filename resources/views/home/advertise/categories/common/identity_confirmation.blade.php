<div class="text-title">
    <h4>
        تأیید هویت
    </h4>
    <p>
        برای جلوگیری از ورود شمارهٔ موبایل متخلف و افزایش سلامت تعاملات، تأیید هویت در بلدچی انجام می‌شود.
        <br>
حساب شما در بلدچی با شمارهٔ
{{ auth()->user()->mobile }}
فعال است.

    </p>
</div>

<div class="select-label">
    <label for="identity_confirmation">ملیت</label>
    <select name="identity_confirmation" id="identity_confirmation" class="nice-select     " data-place="انتخاب شهر">
        {{-- <option value="">لطفا یک مورد را انتخاب کنید </option> --}}
        <option  {{ $advertise && $advertise->show_option("identity_confirmation")=="iran"?"selected":"" }} value="iran">ایرانی </option>
        <option  {{ $advertise && $advertise->show_option("identity_confirmation")=="other_region"?"selected":"" }} value="other_region">اتباع خارجی</option>
    </select>
</div>
