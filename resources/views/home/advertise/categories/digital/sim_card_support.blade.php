<div class="input-toggle text red">
    <input type="checkbox" hidden value="0" name="sim_card_support" >

    <input type="checkbox" id="sim_card_support" value="1" name="sim_card_support"  {{ $advertise &&  $advertise->show_option("sim_card_support")?"checked":"" }}>
    <label for="sim_card_support">
        <div class="right-sec">
            <h4>
                <span class="icon">

                </span>
                پشتیبانی از سیم‌کارت
            </h4>
        </div>
        <div class="togg">
            <span></span>
        </div>
    </label>
</div>
