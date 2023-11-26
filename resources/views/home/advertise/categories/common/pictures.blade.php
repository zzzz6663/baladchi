<h4>عکس آگهی</h4>
<p>آگهی‌های دارای عکس نسبت به اگهی های بدون عکس توجه بیشتری از کاربران جلب خواهد کرد.</p>
<span class="light">تعداد عکس‌های انتخاب شده نباید بیشتر از 6 باشد.</span>
</div>


<div class="upload-ad-pics">
    <ul id="img_list" >

        <li>
            <div class="upload-ad-pic">
                <input type="file" id="ad-upload" accept="image/*">
                <label for="ad-upload">
                    <div class="icon">
                        <svg width="36" height="30" viewBox="0 0 36 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.998 21L17.998 15L11.998 21" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M17.998 15V28.5" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M30.5832 24.585C32.0462 23.7874 33.202 22.5253 33.868 20.9979C34.5341 19.4705 34.6726 17.7648 34.2615 16.15C33.8505 14.5352 32.9135 13.1032 31.5982 12.0801C30.283 11.057 28.6645 10.5011 26.9982 10.5H25.1082C24.6542 8.74384 23.808 7.11348 22.6332 5.73147C21.4583 4.34945 19.9855 3.25175 18.3254 2.52089C16.6653 1.79002 14.8611 1.44501 13.0484 1.5118C11.2358 1.57858 9.46183 2.05543 7.86 2.90647C6.25816 3.75752 4.8701 4.96063 3.80016 6.42535C2.73023 7.89007 2.00627 9.57828 1.6827 11.3631C1.35914 13.1479 1.44439 14.9828 1.93205 16.7299C2.41971 18.477 3.29709 20.0908 4.49823 21.45" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M23.998 21L17.998 15L11.998 21" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span>
                        آپلود تصویر
                    </span>
                    <div class="upload-btn">
                        <span class="icon">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.6506 4.61968V0.775101C4.6506 0.347025 4.99763 0 5.4257 0C5.85378 0 6.2008 0.347024 6.2008 0.7751V4.61968H10.0815C10.5067 4.61968 10.8514 4.9644 10.8514 5.38963C10.8514 5.81486 10.5067 6.15957 10.0815 6.15957H6.2008V10.0042C6.2008 10.4322 5.85378 10.7793 5.4257 10.7793C4.99763 10.7793 4.6506 10.4322 4.6506 10.0042V6.15957H0.769947C0.344717 6.15957 0 5.81486 0 5.38963C0 4.9644 0.344717 4.61968 0.769947 4.61968H4.6506Z" fill="white" />
                            </svg>
                        </span>
                        <span>آپلود</span>
                    </div>
                </label>
            </div>
        </li>
        @if($advertise->id)
            @foreach ($advertise->images as $im )
            <li class="par img_list">
                <div class="img img_added">
                    <span class="delete_img" data-id="{{  $im->id }}">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <img src="{{  $im->ad_img() }}" alt="">
                    <input type="hidden" name="pictures[]" value="{{ $im->image }}"/>
                </div>
            </li>
            @endforeach

        @endif


    </ul>
</div>
