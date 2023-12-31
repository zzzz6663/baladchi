@extends('main.site')
@section('content')
<div class=" container d-flex">
<div class="row" style="margin-top: 100px">
    <div class="col-xl-2"></div>
    <div class="col-xl-8 col-md-12">
        {{--  <div class="bread-filter">
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">پشتیبانی</a></li>
                    <li class="sep">
                        <span>
                            <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.943369 4.94888C0.94335 5.08612 0.970364 5.22202 1.02287 5.34882C1.07537 5.47561 1.15234 5.59084 1.24937 5.6879L5.14936 9.58789C5.34523 9.78375 5.61087 9.8938 5.88786 9.8938C6.16485 9.8938 6.43049 9.78375 6.62635 9.58789C6.82222 9.39203 6.93226 9.12639 6.93226 8.8494C6.93226 8.5724 6.82222 8.30676 6.62635 8.1109L4.22636 4.9469L6.62635 1.7829C6.82222 1.58704 6.93226 1.32139 6.93226 1.0444C6.93226 0.767412 6.82222 0.50174 6.62635 0.305878C6.43049 0.110015 6.16485 2.14471e-08 5.88786 0C5.61087 -2.1447e-08 5.34523 0.110015 5.14936 0.305878L1.24937 4.2059C1.15181 4.3034 1.07453 4.41925 1.02201 4.54678C0.969491 4.67431 0.942768 4.81096 0.943369 4.94888Z" fill="#A6A5AA"></path>
                            </svg>

                        </span>
                    </li>
                    <li><span>راهنمای خرید امن</span></li>
                </ul>
            </div>
        </div>  --}}
        <div id="register">

            <div class="support">
                    <h2>راهنمای خرید امن</h2>
                    مهم‌ترین نکاتی که هنگام معامله، برای داشتن خرید و فروشی امن در نظر بگیرید عبارتند از:
                        زنگ خطر‌ها در معامله: زمانی که باید بیشتر دقت کنید
                        <ul>
                             <li>قیمت و شرایط ارائه شده بیش از حد عالی به نظر می رسد.</li>
                             <li>درخواست بیعانه قبل از دریافت کالا، به هر عنوانی توسط فروشنده پیشنهاد شود.</li>
                             <li>فروشنده اطلاعات شفاف و کاملی دربارهٔ کالا ارائه نمی‌کند.</li>
                             <li>در میانهٔ چت‌کردن در چت بلدچی، مخاطب درخواست می‌کند که مکالمه در سایر پیام‌رسان‌ها مانند تلگرام و واتس‌اپ و … ادامه پیدا کند.</li>
                             <li>طرف مقابل بدون دلیل منطقی درخواست معاملهٔ حضوری را رد کند.</li>
                             <li>طرف مقابل بدون دلیل منطقی اطلاعات شخصی یا حساب بانکی شما را می‌پرسد.</li>
                             <li>خریدار بخواهد بدون دیدن کالا، آن را با قیمت عالی بخرد.</li>
                             <li>آگهی‌دهنده خود را از فروشندگان معتبر و تأیید شده توسط سایت بلدچی معرفی می‌کند.</li>
                        </ul>
                        <h2>معاملهٔ حضوری: امن‌ترین راه معامله</h2>
                        معامله و پرداخت حضوری: امن‌ترین و بهترین راه خرید، معاملهٔ حضوری است. یعنی خریدار در ملاقات حضوری با فروشنده، کالا را ببیند، بررسی کند و همان زمان مبلغ را پرداخت نماید. هرگز بعد از تحویل کالا یا خدمات، پرداخت مبلغ را به زمان دیگری موکول نکنید.
                        <ul>
                             <li>مکان امن: برای معاملهٔ حضوری، مکان‌های عمومی و شلوغ مانند شعب بانک و کلانتری‌ها مناسب هستند.</li>
                             <li>شواهد معامله: بهتر است هنگام خرید کالا، رسید کتبی معتبر از فروشنده دریافت کنید.</li>
                        </ul>
                        نکات مهم در انتقال وجه
                        <ul>
                             <li>پرداخت اینترنتی و کارت به کارت: در صورت پرداخت اینترنتی یا کارت به کارت، به دیدن رسید پرداخت اکتفا نکنید. قبل از تحویل کالا، شخصاً از وارد شدن مبلغ به حسابتان مطمئن شوید.</li>
                             <li>چک و سفته: چک و سفته ممکن است نقد نشوند. برای کسب اطلاعات بیشتر، به قوانین رسمی چک رجوع کنید.</li>
                             <li>چک رمزدار بانکی: در صورت دریافت چک‌های رمزدار بانکی، با مراجعه به بانک مورد نظر، از اصالت آن مطمئن شوید.</li>
                        </ul>
                        نکات مهم پیش از معامله
                        <ul>
                             <li>بیعانه در بلدچی: بعضی از دسته‌های بلدچی امکان بیعانه دارند و می‌توانید از آن استفاده کنید. در صورتی که فروشنده درخواست کارت به کارت یا پرداخت مبلغ، بدون تحویل کالا یا خدمات کرد، آگهی را گزارش دهید.</li>
                             <li>ذخیرهٔ اطلاعات: اطلاعات فروشنده و آگهی را حتماً ذخیره کنید تا در صورت نیاز، دسترسی سریع داشته باشید.</li>
                             <li>امنیت در ملاقات: اگر می‌خواهید مبلغ قابل توجهی به کسی که نمی‌شناسید بپردازید یا کالای گران قیمتی را با خود حمل کنید، پیشنهاد می‌کنیم حتماً کسی همراه شما باشد. در غیر این صورت، فردی را در جریان جزئیات مکان و زمان ملاقات و مشخصات طرف مقابل بگذارید.</li>
                             <li>درخواست فاکتور خرید: در مورد برخی کالاها مثل طلا و جواهر، بهتر است از فروشنده بخواهید فاکتور خرید را به همراه داشته باشد.</li>
                             <li>درخواست بسته‌بندی اولیه: برای خرید وسایل الکترونیکی (مانند گوشی موبایل، تبلت، لپتاپ و …)، بهتر است از فروشنده بخواهید بسته‌بندی اولیه کالا را نیز ارائه کند.</li>
                             <li>مدارک مالکیت و شناسایی کالا: در معاملات خودرو، بررسی تمام مدارک مالکیت و شناسایی خودرو الزامی است. تجربه نشان داده است خودروهایی که با تفویض وکالت‌های مکرر مورد معامله قرار می گیرند، مشکوک هستند.</li>
                             <li>پرهیز از مزاحمت: دادن اطلاعات شخصی که نامربوط به معامله است، فقط احتمال مزاحمت را بالا می برد.</li>
                        </ul>
                        نکات مهم در معاملات غیر حضوری
                        <ul>
                             <li>اطمینان از کالا: قبل از دیدن کالا و بررسی مشخصات مورد نظرتان، پرداخت نکنید.</li>
                             <li>دریافت مبلغ: برای پیگیری واریز مبلغ، حتماً حساب خود را چک کنید و به تصویر فیش پرداختی و رسید پرداخت اینترنتی اعتماد نکنید.</li>
                             <li>تصاویر و اطلاعات کالا: از فروشنده بخواهید تصاویر واضح و اطلاعات کافی از کالا را در اختیار شما بگذارد. چت بلدچی، امکانات لازم برای دریافت عکس و اطلاعات را در اختیار شما قرار می‌دهد.</li>
                             <li>پرهیز از اعتماد بی‌جا: ارائه کردن اطلاعات شخصی مانند آدرس، شمارهٔ تلفن ثابت، اطلاعات حساب بانکی، شناسهٔ شبکه های اجتماعی و ... معیاری برای اعتماد کردن به طرف مقابل نیست. چون ممکن است از اطلاعات شخص دیگری سوء استفاده شده باشد.</li>
                             <li>خرید پستی: در خرید پستی، شما قبل از اطمینان از صحت کالا، هزینه را پرداخت می‌کنید. این روش بدون خطر نیست و بلدچی این روش را توصیه نمی‌کند.</li>
                             <li>مغایرت کالا با اطلاعات آگهی: در صورت مطابق‌ نبودن مشخصات کالا با مشخصات ذکر شده توسط فروشنده، کالا را بلافاصله برگشت دهید و نزد خود نگه ندارید.</li>
                        </ul>
                        نکات مهم در خرید خودرو‌های لیزینگ و اقساطی
                        <ul>
                             <li>درج آگهی فروش لیزینگ و اقساطی خودرو در بلدچی به معنی مجوزدار بودن شرکت ارائه‌دهنده خودرو نیست.</li>
                             <li>شرکت‌های لیزینگ و فروش اقساطی خودرو باید از بانک مرکزی جمهوری اسلامی ایران مجوز فعالیت داشته باشند. شما می‌توانید لیست شرکت‌های دارای مجوز بانک مرکزی را <a href="#">اینجا</a> ببینید.</li>
                             <li>داشتن «شماره ثبت» و «شناسه ملی» از اداره کل ثبت شرکت‌ها، به معنی مجوز برای فعالیت نیست. این موارد تنها مشخصات ثبتی شرکت‌ها هستند.</li>
                        </ul>

            </div>

        </div>
    </div>
</div>

</div>
@endsection
