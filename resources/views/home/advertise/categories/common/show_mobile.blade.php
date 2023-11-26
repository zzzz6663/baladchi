<h4>اطلاعات حساب کاربری</h4>
<div class="input-toggle text red">
    <input type="checkbox" id="show_mobile" name="show_mobile"  {{ $advertise &&  $advertise->show_option("show_mobile")?"checked":"" }}
    >
    <label for="show_mobile">
        <div class="right-sec">
            <h4>        شمارهٔ موبایل نمایش داده نشود.	</h4>
         <p class="light">
            اگر مایل به انتشار شماره موبایلشماره موبایل خود نیستید، می توانید انتخاب کنید شماره شما نمایش داده نشود.
            <br>
این آگهی با چت فعال ثبت می‌شود.
         </p>
        </div>
        <div class="togg">
            <span></span>
        </div>
    </label>
</div>
