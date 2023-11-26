
<div class="input-label big">
    <label for="daily_rent"> اجاره روزانه	 </label>
    <input type="number"  class="persian"  name="daily_rent" id="daily_rent" placeholder="مثلا 50.000.000" value="{{ $advertise && $advertise->show_option("daily_rent")?$advertise->show_option("daily_rent"):"" }}">
</div>
