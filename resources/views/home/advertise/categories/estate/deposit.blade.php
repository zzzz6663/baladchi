<div class="text-title">
    <h4>
        ودیعه و اجاره

    </h4>
    <p>
        در صورتی که مبلغ ودیعه یا اجاره را وارد نکنید، در آگهی شما «توافقی» و اگر آن را صفر وارد کنید، «رایگان» نمایش داده می‌شود.
    </p>
</div>
<div class="input-label big">
    <label for="deposit"> ودیعه </label>
    <input type="number"  class="persian" name="deposit" id="deposit" placeholder="مثلا 50.000.000"  value="{{ $advertise && $advertise->show_option("deposit")?$advertise->show_option("deposit"):"" }}">
</div>
