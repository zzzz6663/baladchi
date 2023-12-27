<div id="sidebar">
    <div id="filters">

        <div class="accord-box active">
            {{--  <div class="top">
                <h4>دستهs بندی ها</h4>
                <span class="toggle">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"/>
                    </svg>
                </span>

            </div>  --}}
            <form action="" id="serach_form">
                <input type="text" name="type" id="type" hidden value="">
                <input type="text" name="category_id" id="category_id" hidden value="">
                <input type="text" name="subset_id" id="subset_id" hidden value="">
                <input type="text" name="telic_id" id="telic_id" hidden value="">
                <div class="accord-box  pointer  ">
                    <div class="top nob  pointer ">
                        <span class="backpage pointer ">
                            <span class="pointer all_cat_show">

                                <span class="icon">
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.99999 4.9924C6.00001 4.85516 5.973 4.71927 5.92049 4.59247C5.86799 4.46567 5.79102 4.35044 5.69399 4.25339L1.794 0.353394C1.59813 0.157531 1.33249 0.0474858 1.0555 0.0474858C0.778509 0.0474858 0.512868 0.157531 0.317006 0.353394C0.121143 0.549257 0.0110976 0.814898 0.0110976 1.09189C0.0110976 1.36888 0.121144 1.63452 0.317006 1.83038L2.717 4.99439L0.317006 8.15839C0.121144 8.35425 0.0110983 8.61989 0.0110983 8.89688C0.0110983 9.17387 0.121144 9.43954 0.317007 9.63541C0.512869 9.83127 0.77851 9.94128 1.0555 9.94128C1.33249 9.94128 1.59813 9.83127 1.794 9.63541L5.69399 5.73538C5.79154 5.63789 5.86882 5.52203 5.92135 5.3945C5.97387 5.26697 6.00059 5.13032 5.99999 4.9924Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span>همه آگهی ها </span>
                            </span>

                            <span class="close close_side">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </span>
                        </span>

                    </div>
                </div>

                @foreach ($categories as $category)

                    <div class="accord-box side_cat">
                        <div class="top nob  ">
                            <a href="#" class="cat-item toggle_ad" data-id="{{ $category->id }}"
                                data-type="category">
                                <span class="icon">
                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17 16H3V17C3 17.2652 2.89464 17.5196 2.70711 17.7071C2.51957 17.8946 2.26522 18 2 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V7L2.48 1.212C2.63432 0.852001 2.89096 0.545239 3.21805 0.32978C3.54515 0.114322 3.92832 -0.000347568 4.32 7.91365e-07H15.68C16.0713 4.4012e-05 16.4541 0.114897 16.7808 0.330331C17.1075 0.545765 17.3638 0.852314 17.518 1.212L20 7V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H18C17.7348 18 17.4804 17.8946 17.2929 17.7071C17.1054 17.5196 17 17.2652 17 17V16ZM18 9H2V14H18V9ZM2.176 7H17.824L15.681 2H4.32L2.177 7H2.176ZM4.5 13C4.10218 13 3.72064 12.842 3.43934 12.5607C3.15804 12.2794 3 11.8978 3 11.5C3 11.1022 3.15804 10.7206 3.43934 10.4393C3.72064 10.158 4.10218 10 4.5 10C4.89782 10 5.27936 10.158 5.56066 10.4393C5.84196 10.7206 6 11.1022 6 11.5C6 11.8978 5.84196 12.2794 5.56066 12.5607C5.27936 12.842 4.89782 13 4.5 13ZM15.5 13C15.1022 13 14.7206 12.842 14.4393 12.5607C14.158 12.2794 14 11.8978 14 11.5C14 11.1022 14.158 10.7206 14.4393 10.4393C14.7206 10.158 15.1022 10 15.5 10C15.8978 10 16.2794 10.158 16.5607 10.4393C16.842 10.7206 17 11.1022 17 11.5C17 11.8978 16.842 12.2794 16.5607 12.5607C16.2794 12.842 15.8978 13 15.5 13Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="text"> {{ $category->name }}</span>
                            </a>
                            {{--  <input type="text" hidden name="category_id" value="{{ $category->id }}">  --}}
                            <span class="toggle toggle_ad">
                                {!! $category->icon !!}
                            </span>
                        </div>
                        <div class="accord-content ">
                            <div>
                                <ul class="sub-list">
                                    @foreach ($category->subsets_cash() as $subset)
                                        <li class="par_sub">
                                            {{--  <input type="text" hidden name="subset_id" value="{{ $subset->id }}">  --}}
                                            <a href="#" data-type="subset" data-id="{{ $subset->id }}"
                                                class="sub-list-item pointer subset_side {{ $subset->telics_cash()->count() ? ' ' : 'final_res' }}">{{ $subset->name }}
                                            </a>
                                            @if ($subset->telics_cash()->count() > 0)
                                                {{--  sub-list-list  --}}
                                                <ul class="telic-list-item dis_none ">
                                                    @foreach ($subset->telics_cash() as $telic)
                                                        <li>
                                                            {{--  <input type="text" hidden name="telic_id" value="{{ $telic->id }}">  --}}
                                                            <a href="#" data-type="telic"
                                                                data-id="{{ $telic->id }}"
                                                                class="sub-list-list-item final_res">
                                                                {{ $telic->name }} </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div id="filters_all">

                </div>
            </form>


        </div>


    </div>
</div>
