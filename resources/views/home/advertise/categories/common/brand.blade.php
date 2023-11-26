


@if($telic && $telic->brands()->where('parent_id','!=',null)->count()!=0)
<div class="input-label big">
    <label for="brand">
        برند و  تیپ
    </label>

    {{--  <select readonly name="brand" id="brand" class="select_normal" data-place="  انتخاب کنید">
    </select>  --}}
    <input type="text" class=""  id="brand" placeholder="" value="{{ $advertise->id &&  $advertise->telic->show_brand($advertise->show_option("brand")) &&  $advertise->telic->show_brand($advertise->show_option("brand"))->name }}">
    <input type="text" class="" hidden name="brand" id="brand_id"   value="{{( $advertise->id &&  $advertise->show_option("brand"))? $advertise->show_option("brand"):"" }}">
</div>


<div class="modal fade new_brand" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title right" id="exampleModalLongTitle">  انتخاب برند</h5>
                <button type="button" class="close close_pops" data-dismiss="modal" aria-label="Close">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                            fill="currentColor"></path>
                    </svg>

                </button>
            </div>
            <div class="modal-body">
                <div class="pur-search-form">
                    <form action="">
                        <input type="text" class="text" id="search_brand" placeholder="جست وجوی   برند ">
                        {{-- <button class="search-button">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.58341 17.5C13.9557 17.5 17.5001 13.9555 17.5001 9.58329C17.5001 5.21104 13.9557 1.66663 9.58341 1.66663C5.21116 1.66663 1.66675 5.21104 1.66675 9.58329C1.66675 13.9555 5.21116 17.5 9.58341 17.5Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path opacity="0.4" d="M18.3334 18.3333L16.6667 16.6666" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                        </button> --}}
                    </form>
                </div>

                <div class="sliding-menu" id="search_parent">
                    <ul id="main_list">
                        @foreach ($categories=App\Models\Brand::where('parent_id',null)->where("telic_id",$telic->id)->get() as $brand )
                        <li>
                            <div class="top">
                                <span class="cat-item">
                                    <span class="icon">
                                     <img src="{{  $brand->icon() }}" alt="">
                                     {{--  {!! $brand->icon !!}  --}}
                                    </span>
                                    <span class="text">{{ $brand->name }}</span>
                                </span>
                                <span class="toggle">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>

                            </div>

                            <div class="sub">
                                <div class="back">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrow-right" width="18"
                                            height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#2c3e50"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="5" y1="12" x2="19" y2="12">
                                            </line>
                                            <line x1="13" y1="18" x2="19" y2="12">
                                            </line>
                                            <line x1="13" y1="6" x2="19" y2="12">
                                            </line>
                                        </svg>
                                    </span>
                                    <span>بازگشت به همهٔ دسته‌ها</span>
                                </div>
                                <ul>
                                    @foreach ($brand->childs() as $child )
                                    <li>
                                        <div class="sub-slid  {{ $child->childs()->count()>0?"":"no_subs" }}"  data-id="{{ $child->id }}"  data-name="{{ $child->name }}" data-type="child">
                                            <span>  {{  $child->name }}</span>
                                            <span class="icon  {{ $child->childs()->count()>0?"":"dis_none" }}" >
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-chevron-left" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="15 6 9 12 15 18"></polyline>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="sub">
                                            <div class="back">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-arrow-right"
                                                        width="18" height="18" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="#2c3e50" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="5" y1="12" x2="19"
                                                            y2="12"></line>
                                                        <line x1="13" y1="18" x2="19"
                                                            y2="12"></line>
                                                        <line x1="13" y1="6" x2="19"
                                                            y2="12"></line>
                                                    </svg>
                                                </span>
                                                <span>بازگشت به همهٔ
                                                    {{ $brand->name }}

                                                </span>
                                            </div>
                                            @if($child->childs()->count()>0)
                                            <ul>
                                                @foreach ($child->childs() as $chi )
                                                <li>
                                                    <div data-id="{{ $chi->id }}" data-name="{{ $chi->name }}" data-type="chi" class="sub-slid-end no_subs">
                                                        <span>{{ $chi->name }}  </span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif

                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- <div class="pair-button">
                    <span class="mid-button" >
                        انصراف
                    </span>
                    <span class="mid-button orange2 new_bra" >
                        تایید
                    </span>
                </div> --}}
            </div>

        </div>
    </div>
</div>
@else
<div class="select-label">
    <label for="brand">
        برند
    </label>
    <select name="brand"  class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">یک مورد را انتخاب کنید </option> --}}

        @foreach ($telic->brands as $brand )
        <option value="{{  $brand->id }}">{{  $brand->name }}</option>
        @endforeach
    </select>
</div>
@endif


