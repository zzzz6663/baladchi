
<div class="input-label big">
    <label for="monthly_rent"> اجارهٔ ماهانه
    </label>
    <input type="number" class="persian" name="monthly_rent" id="monthly_rent" placeholder="مثلا 1.000.000" value="{{ $advertise && $advertise->show_option("monthly_rent")?$advertise->show_option("monthly_rent"):"" }}">
</div>
