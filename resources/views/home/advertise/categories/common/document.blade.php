<div class="input-toggle text red">
    <input type="text" name="document" value="off" hidden  >

    <input type="checkbox" value="on" id="document"   name="document"   {{ $advertise &&  $advertise->show_option("document")?"checked":"" }}>
    <label for="document">
        <div class="right-sec">
            <h4>
                <span class="icon">

                </span>

سند دارد
            </h4>
        </div>
        <div class="togg">
            <span></span>
        </div>
    </label>
</div>
{{--  dddd  --}}


