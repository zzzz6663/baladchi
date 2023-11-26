@extends('main.panel')
@section('content')
    <div id="x">

        <div id="register-stpes">
            <div class="dash-title">
                <h3>بخش سوالات
                    خرد جمعی
                    {{ $counsel->title }}
                </h3>
            </div>
            <div id="register">

                <div class="stepes">
                    <ul>
                        {{-- <li class="step step1 active">
                        <span class="num">.۱</span>
                        <h4>اطلاعات کاربری</h4>
                    </li> --}}
                        <li class="step step2 ">
                            <span class="num">.1</span>
                            <h4> تعریف خرد جمعی</h4>
                        <li class="step step3 ">
                            <span class="num">.2</span>
                            <h4>پرداخت </h4>
                        </li>
                        </li>
                        <li class="step step4 active ">
                            <span class="num">.3</span>
                            <h4> سوالات </h4>
                        </li>
                    </ul>
                </div>
                <div class="dash-main-content">
                    <div class="tra-table">

                        <h4 class="dash-in-title"> سوالات</h4>

                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <span class="tit">شماره</span>


                                    </th>
                                    <th>
                                        <span class="tit"> عنوان</span>


                                    </th>

                                    <th> <span class="tit"> گزینه یک </span></th>
                                    <th> <span class="tit"> گزینه دو </span></th>
                                    <th> <span class="tit"> گزینه سه </span></th>
                                    <th> <span class="tit"> گزینه چهار </span></th>
                                    <th> <span class="tit"> گزینه پنج </span></th>

                                    <th>
                                        <span class="tit"> عملکرد</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($counsel->counselquestions as $counselquestion)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $counselquestion->question }}</td>
                                        <td>{{ $counselquestion->a1 }}</td>
                                        <td>{{ $counselquestion->a2 }}</td>
                                        <td>{{ $counselquestion->a3 }}</td>
                                        <td>{{ $counselquestion->a4 }}</td>
                                        <td>{{ $counselquestion->a5 }}</td>
                                        <td style="text-align:right">
                                            {{--  @if (!$counsel->active)  --}}
                                            <form action="{{ route('counselquestion.destrory', $counselquestion->id) }}"
                                                method="post">
                                                @csrf
                                                @method('post')

                                                <button class="no_border">
                                                    <span class="icon">
                                                        <svg width="24" height="25" viewBox="0 0 24 25"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M20.9997 7.22998C20.9797 7.22998 20.9497 7.22998 20.9197 7.22998C15.6297 6.69998 10.3497 6.49998 5.11967 7.02998L3.07967 7.22998C2.65967 7.26998 2.28967 6.96998 2.24967 6.54998C2.20967 6.12998 2.50967 5.76998 2.91967 5.72998L4.95967 5.52998C10.2797 4.98998 15.6697 5.19998 21.0697 5.72998C21.4797 5.76998 21.7797 6.13998 21.7397 6.54998C21.7097 6.93998 21.3797 7.22998 20.9997 7.22998Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M8.50074 6.22C8.46074 6.22 8.42074 6.22 8.37074 6.21C7.97074 6.14 7.69074 5.75 7.76074 5.35L7.98074 4.04C8.14074 3.08 8.36074 1.75 10.6907 1.75H13.3107C15.6507 1.75 15.8707 3.13 16.0207 4.05L16.2407 5.35C16.3107 5.76 16.0307 6.15 15.6307 6.21C15.2207 6.28 14.8307 6 14.7707 5.6L14.5507 4.3C14.4107 3.43 14.3807 3.26 13.3207 3.26H10.7007C9.64074 3.26 9.62074 3.4 9.47074 4.29L9.24074 5.59C9.18074 5.96 8.86074 6.22 8.50074 6.22Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M15.2104 23.25H8.79039C5.30039 23.25 5.16039 21.32 5.05039 19.76L4.40039 9.68995C4.37039 9.27995 4.69039 8.91995 5.10039 8.88995C5.52039 8.86995 5.87039 9.17995 5.90039 9.58995L6.55039 19.66C6.66039 21.18 6.70039 21.75 8.79039 21.75H15.2104C17.3104 21.75 17.3504 21.18 17.4504 19.66L18.1004 9.58995C18.1304 9.17995 18.4904 8.86995 18.9004 8.88995C19.3104 8.91995 19.6304 9.26995 19.6004 9.68995L18.9504 19.76C18.8404 21.32 18.7004 23.25 15.2104 23.25Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M13.6581 17.75H10.3281C9.91813 17.75 9.57812 17.41 9.57812 17C9.57812 16.59 9.91813 16.25 10.3281 16.25H13.6581C14.0681 16.25 14.4081 16.59 14.4081 17C14.4081 17.41 14.0681 17.75 13.6581 17.75Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M14.5 13.75H9.5C9.09 13.75 8.75 13.41 8.75 13C8.75 12.59 9.09 12.25 9.5 12.25H14.5C14.91 12.25 15.25 12.59 15.25 13C15.25 13.41 14.91 13.75 14.5 13.75Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </button>

                                            </form>
                                            {{--  @endif  --}}
                                        </td>
                                    </tr>
                                @endforeach






                            </tbody>

                        </table>
                    </div>
                </div>
                {{--  @if (!$counsel->active)  --}}

                <div id="register-stpes">
                    <div class="dash-title">
                        <h3>تعریف سوال

                            جدید


                        </h3>


                    </div>
                    @include('main.error')

                    <div id="register">

                        <div class="form">
                            <form action="{{ route('panel.new.counsel3', $counsel->id) }}" id="qu_foem" method="post" class="ess">
                                @csrf
                                @method('post')
                                <div class="input-label big">
                                    <label for="question">
                                        <span> عنوان </span>
                                    </label>
                                    <input type="text" name="question" id="question">
                                </div>

                                <div class="input-label big postion_relative">
                                    <label for="new_op">
                                        <span> گزینه جدید </span>
                                    </label>
                                    <input type="text" name="new_op" id="new_op">
                                    <span class=" pointer postion_absolute" id="new_option" value=" ">
                                        اضافه
                                    </span>
                                </div>
                                <div class=" ">
                                    <ul id="listq">
                                        @foreach (old('options', []) as $option)
                                            <li class="parent_li">
                                                <input type="text" name="options[]" value="{{ $option }}">
                                                <span class="remove_pa">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

                                {{--  @if ($counsel->counselquestions()->count() < 10)  --}}

                                {{--  @else
                                شما
                                @endif  --}}


                            </form>


                            <div class="footer-section inline-block ess" style="justify-content:space-around">
                                <div class="pair-button">
                                    <button form="qu_foem" class="mid-button blue pointer" value=" ">
                                        ذخیره سوال
                                    </button>
                                </div>
                            </div>
                            @if ($counsel->check_for_active())
                                <form class="inline-block ess" action="{{ route('active.counsel', $counsel->id) }}"
                                    method="post" data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                    @csrf
                                    @method('post')
                                    <button class="mid-button blue pointer ">
                                        تایید وانتشار
                                    </button>
                                </form>
                            @else
                                <a class="mid-button" href="{{route('panel.counsel')}}">برگشت </a>
                            @endif


                        </div>


                    </div>
                </div>
                {{--  @endif  --}}




            </div>
        </div>
    </div>
@endsection
