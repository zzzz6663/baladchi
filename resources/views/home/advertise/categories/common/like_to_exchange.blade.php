<div class="input-toggle text red">
    <input type="text" name="like_to_exchange" value="off" hidden  >

    <input type="checkbox" value="on" id="like_to_exchange"   name="like_to_exchange"   {{ $advertise &&  $advertise->show_option("like_to_exchange")?"checked":"" }}>
    <label for="like_to_exchange">
        <div class="right-sec">
            <h4>
                <span class="icon">

                </span>

مایلم معاوضه کنم
            </h4>
        </div>
        <div class="togg">
            <span></span>
        </div>
    </label>
</div>
{{--  dddd  --}}


