@extends('main.site')
@section('content')
    <div id="qu">
        <div class="" id="quest-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content" style="border:none">
                    <div class="balad-box">
                        <div class="balad-pic">
                            <div class="head"><img src="{{ $counsel->img() }}" alt=""></div>
                        </div>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title right" id="exampleModalLongTitle">
                            {{ $counsel->title }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                    fill="currentColor" />
                            </svg>

                        </button>
                        <div class="prog-bar">
                            <span class="tit">
                                {{ $persent }}
                                %
                                را پاسخ داده اید</span>
                            <div class="bar">
                                <span style="width: {{ $persent }}%;"></span>
                            </div>
                        </div>
                    </div>
                    @foreach ($questions as $question)
                        <div class="modal-body">
                            <h3>
                                {{ $question->question }}
                            </h3>

                            @if ($question->type == 'multi')
                                <ul class="q-list">
                                    @if ($question->a1)
                                        <li>
                                            <div class="quest-input">
                                                <input form="qns" type="radio" name="quest"
                                                    {{ $answer && $answer->answer == 'a1' ? 'checked' : '' }} value="a1"
                                                    id="questa1">
                                                <label for="questa1">
                                                    <div class="quest">
                                                        <span class="num">1</span>
                                                        <span>
                                                            {{ $question->a1 }}
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                    @endif

                                    @if ($question->a2)
                                        <li>
                                            <div class="quest-input">
                                                <input form="qns" type="radio" name="quest"
                                                    {{ $answer && $answer->answer == 'a2' ? 'checked' : '' }} value="a2"
                                                    id="questa2">
                                                <label for="questa2">
                                                    <div class="quest">
                                                        <span class="num">2</span>
                                                        <span>
                                                            {{ $question->a2 }}
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                    @endif

                                    @if ($question->a3)
                                        <li>
                                            <div class="quest-input">
                                                <input form="qns" type="radio" name="quest"
                                                    {{ $answer && $answer->answer == 'a3' ? 'checked' : '' }} value="a3"
                                                    id="questa3">
                                                <label for="questa3">
                                                    <div class="quest">
                                                        <span class="num">3</span>
                                                        <span>
                                                            {{ $question->a3 }}
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                    @endif

                                    @if ($question->a4)
                                        <li>
                                            <div class="quest-input">
                                                <input form="qns" type="radio" name="quest"
                                                    {{ $answer && $answer->answer == 'a4' ? 'checked' : '' }} value="a4"
                                                    id="questa4">
                                                <label for="questa4">
                                                    <div class="quest">
                                                        <span class="num">4</span>
                                                        <span>
                                                            {{ $question->a4 }}
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                    @endif


                                    @if ($question->a5)
                                        <li>
                                            <div class="quest-input">
                                                <input form="qns" type="radio" name="quest"
                                                    {{ $answer && $answer->answer == 'a5' ? 'checked' : '' }} value="a5"
                                                    id="questa5">
                                                <label for="questa5">
                                                    <div class="quest">
                                                        <span class="num">5</span>
                                                        <span>
                                                            {{ $question->a5 }}
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                    @endif


                                </ul>
                            @else
                                <div class="input-label big textarea">
                                    <label for="">توضیحات</label>
                                    <textarea name="quest" id="" form="qns" cols="30" rows="10"
                                        placeholder="توضیحات مناسبی برای سوال  تایپ کنید">
                                    @if ($answer)
                                    {{ $answer->answer }}
                                    @endif
                                    </textarea>
                                </div>
                            @endif

                        </div>
                    @endforeach

                    <div class="modal-footer">


                        <div class="search-footer">

                            <div class="right-sec">
                                <div class="top-pag">

                                    @if (request('page') == $questions->total() || $questions->total() == 1)
                                        <form id="qns"
                                            action="{{ route('counsel.answer', $counsel->id) }}"method="post">
                                            @csrf
                                            @method('post')


                                            </button>
                                            <input type="text" name="finish" value="1" hidden>
                                            <input type="text" name="page" value="{{ request('page') }}" hidden>
                                            <input type="text" name="question" value="{{ $question->id }}" hidden>
                                            <button class="but down" style="color:#Fff">
                                                پایان
                                            </button>
                                        </form>
                                    @endif
                                    @if (request('page') < $questions->total() && $questions->total() != 1)
                                        <form id="qns"
                                            action="{{ route('counsel.answer', $counsel->id) }}"method="post">
                                            @csrf
                                            @method('post')



                                            </button>
                                            <input type="text" name="page" value="{{ request('page') }}" hidden>
                                            <input type="text" name="question" value="{{ $question->id }}" hidden>
                                            <button class="but down">
                                                <svg width="19" height="11" viewBox="0 0 19 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.50381 11C9.76736 11 10.0283 10.9504 10.2718 10.854C10.5153 10.7575 10.7366 10.6162 10.923 10.4379L18.4125 3.2747C18.7887 2.91496 19 2.42705 19 1.91829C19 1.40953 18.7887 0.921618 18.4125 0.561871C18.0364 0.202125 17.5263 2.08999e-07 16.9943 2.02655e-07C16.4624 1.96312e-07 15.9523 0.202125 15.5761 0.561871L9.5 4.97001L3.42387 0.561871C3.04773 0.202125 2.5376 3.02606e-08 2.00567 2.39173e-08C1.47373 1.75741e-08 0.963539 0.202125 0.587406 0.561871C0.211273 0.921618 1.55552e-07 1.40953 1.08298e-07 1.91829C6.10447e-08 2.42704 0.211273 2.91496 0.587406 3.2747L8.07699 10.4379C8.26422 10.6171 8.48671 10.7591 8.73162 10.8555C8.97652 10.952 9.23895 11.0011 9.50381 11Z"
                                                        fill="#FFF4F2" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                    @if (request('page') && request('page') > 1)
                                        <form action="{{ route('counsel.quiz', $counsel->id) }}" method="get">
                                            @csrf
                                            @method('get')
                                            <input type="text" name="page" value="{{ request('page') - 1 }}" hidden>
                                            <input type="text" name="question" value="{{ $question->id }}" hidden>
                                            <button class="but up">
                                                <svg width="18" height="11" viewBox="0 0 18 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.99639 1.73341e-05C8.74671 -1.81071e-05 8.49947 0.049599 8.26879 0.146034C8.0381 0.242469 7.82846 0.383834 7.65189 0.562056L0.556546 7.7253C0.20021 8.08504 1.05565e-06 8.57295 1.0051e-06 9.08171C9.54558e-07 9.59047 0.20021 10.0784 0.556546 10.4381C0.912883 10.7979 1.39617 11 1.90011 11C2.40404 11 2.88733 10.7979 3.24367 10.4381L9 6.02999L14.7563 10.4381C15.1127 10.7979 15.596 11 16.0999 11C16.6038 11 17.0872 10.7979 17.4435 10.4381C17.7998 10.0784 18 9.59047 18 9.08171C18 8.57296 17.7998 8.08504 17.4435 7.7253L10.3481 0.562057C10.1707 0.382875 9.95996 0.240933 9.72794 0.144465C9.49592 0.0479964 9.24731 -0.00108697 8.99639 1.73341e-05Z"
                                                        fill="#FFF4F2" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif


                                </div>
                                <div class="pagination">
                                    {{--  <ul>
                              <li><a class="pagin" href="#">1</a></li>
                              <li class="active"><a class="pagin" href="#">2</a></li>
                              <li><a class="pagin" href="#">3</a></li>
                              <li><span class="dot3">...</span></li>
                              <li><a class="pagin" href="#">5</a></li>
                          </ul>  --}}
                                </div>
                            </div>

                            <div class="pair-button">
                                <a href="{{ route('single.counsel', $counsel->id) }}" class="mid-button">
                                    انصراف
                                </a>


                                {{--  @if (request('page') == $questions->total())

                                <form  action="{{ route('counsel.answer',$counsel->id) }}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="text" name="page" value="{{ request('page')-1 }}" hidden>
                                    <input type="text" name="question" value="{{ $question->id }}" hidden>
                                    <button class="but up">
                                        <svg width="18" height="11" viewBox="0 0 18 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.99639 1.73341e-05C8.74671 -1.81071e-05 8.49947 0.049599 8.26879 0.146034C8.0381 0.242469 7.82846 0.383834 7.65189 0.562056L0.556546 7.7253C0.20021 8.08504 1.05565e-06 8.57295 1.0051e-06 9.08171C9.54558e-07 9.59047 0.20021 10.0784 0.556546 10.4381C0.912883 10.7979 1.39617 11 1.90011 11C2.40404 11 2.88733 10.7979 3.24367 10.4381L9 6.02999L14.7563 10.4381C15.1127 10.7979 15.596 11 16.0999 11C16.6038 11 17.0872 10.7979 17.4435 10.4381C17.7998 10.0784 18 9.59047 18 9.08171C18 8.57296 17.7998 8.08504 17.4435 7.7253L10.3481 0.562057C10.1707 0.382875 9.95996 0.240933 9.72794 0.144465C9.49592 0.0479964 9.24731 -0.00108697 8.99639 1.73341e-05Z"
                                                fill="#FFF4F2" />
                                        </svg>
                                    </button>
                                    <input name="finish" type="submit" value="پایان" form="qns" class="mid-button orange2">

                                </form>
                                @endif  --}}

                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
@endsection
