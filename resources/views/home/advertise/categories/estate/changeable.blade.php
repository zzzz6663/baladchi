<div class="input-toggle text red">
    <input type="checkbox" id="changeable" name="changeable" {{ $advertise &&  $advertise->show_option("changeable")?"checked":"" }}
    >
    <label for="changeable">
        <div class="right-sec">
            <h4>        قابل تبدیل
            </h4>
            <p class="light">
                نرخ رایج مبنا برای تبدیل به ازای هر ۱ میلیون تومان ودیعه، ۳۰ هزار تومان اجاره است.
            </p>
        </div>
        <div class="togg">
            <span></span>
        </div>
    </label>
</div>
