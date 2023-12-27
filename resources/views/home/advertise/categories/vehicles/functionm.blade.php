<div class="input-label big">
    <label for="functionm">  کارکرد
    </label>
    <input type="number" class="persian" name="functionm" id="functionm" placeholder="مثلا 1.000.000" value="{{ $advertise->id && $advertise->show_option("funtion")?$advertise->show_option("funtion"):"" }}">
</div>
