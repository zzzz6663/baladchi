<div class="input-label big">
    <label for="funtion">  کارکرد
    </label>
    <input type="number" class="persian" name="funtion" id="funtion" placeholder="مثلا 1.000.000" value="{{ $advertise->id && $advertise->show_option("funtion")?$advertise->show_option("funtion"):"" }}">
</div>
