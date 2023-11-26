@extends('main.panel')
@section('content')
<div class="dash-main-content">
    <div class="tra-table">

        <div id="exp">
            <h1>
                جمع کل شرکت کنندگان :
                {{ $counsel->answers_count() }}
                نفر
            </h1>
        </div>
    </div>
</div>
<div class="dash-main-content">
    <div class="tra-table">
        <h1>
            سوالات تشریحی
        </h1>
        <div id="exp">
            @foreach ($counsel->Counselquestions()->whereType('ex')->get() as $question)
            <h5 class="h5_m">
                {{ $question->question }}
            </h5>
            <ul>
                <h6>
                    پاسخ دهنده گان
                </h6>
                @foreach ($question->answers as $ans)
                <li>
                    {{--  {{ $ans->answer }}  --}}
                    <ul>

                        <li style="display">
                            ( {{$ans->user->name}}
                            {{$ans->user->family}})
                            {{  $ans->user->answers()->where('counsel_id',$counsel->id)->where('question_id', $question->id)->first()->answer }}***
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
            @endforeach
        </div>
    </div>
</div>
<div class="dash-main-content">
    <div class="tra-table">
        <h1>
            سوالات  چند گزینه ای
        </h1>
        <div id="result_counsel">

            <ul>
                @foreach ($counsel->Counselquestions()->whereType('multi')->get() as $question)
                <li style="border-bottom:1px solid red ">
                    <h5 class="h5_m">
                        {{ $question->question }}
                    </h5>
                    @if ($question->type == 'multi')
                    @for ($i = 1; $i <= $question->options(); $i++)
                        @php
                        $one = $counsel
                        ->answers()
                        ->where('question_id', $question->id)
                        ->where('answer', 'a' . $i)
                        ->count();
                        $all = $counsel
                        ->answers()
                        ->whereType('multi')
                        ->where('question_id', $question->id)
                        ->count();
                        @endphp
                        {{-- $all= $counsel->answers()->whereType('multi')->count(); --}}
                        {{-- {{ $question->answers()->where("answer","a.$i")->count() }} --}}
                        {{-- {{ $question->answers()->pluck('id') }} --}}
                        <span class="ans" style="">
                            گزینه {{ $i }} :
                            @if( $one>0)

                            ({{ ($one * 100) / $all }})
                            @endif

                            %
                        </span>

                        <ul style="margin-bottom:10px">
                            <h5 class="h5_m">
                                پاسخ دهنده گان
                            </h5>
                            @foreach ($counsel->answers()->where("question_id",$question->id)->where('answer', 'a' .
                            $i)->get() as $ua )
                            <li style="display:inline-block">
                                ( {{$ua->user->name}}
                                {{$ua->user->family}})
                            </li>
                            @endforeach
                        </ul>


                        @endfor

                        {{-- ---- {{ $question->answers()->whereAnswer("$question->answer")->count() }} s---- --}}
                        @endif

                        {{-- {{ $question->options() }} --}}
                </li>
                @endforeach
            </ul>
        </div>


    </div>
</div>

<div class="dash-main-content">
    <div class="tra-table">
        <div id="result_counsel">
            <h5 class="h5_m">
                افراد شرکت کننده
            </h5>
            <ul>
                @foreach ( $counsel->answers()->select('user_id')->distinct()->get(); as $in)
                @php
                $us= App\Models\User::find($in->user_id);
                @endphp
                <li style="display:inline-block">
                    {{ $us->name }}
                    {{ $us->family }} -

                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>

@include("main.error")


<div class="dash-main-content">
    <div class="tra-table">
        @if($counsel->status=="show"  )

        <div id="result_counsel">
            <h5 class="h5_m">
                انتخاب بهترین پاسخ دهنده
            </h5>
            <br>
            <form action="{{ route('finish.counsel' ,$counsel->id) }}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    @if($counsel->reward=="select_the_best_answer")

                    <div class="col-lg-8 col-md-12">
                       <div>
                        <div class="select-label">
                            <label for="">شرکت کننده گان </label>
                            <select name="select_id" id="" class="nice-select" data-place="انتخاب ">
                                @foreach ($counsel->answers()->select('user_id')->distinct()->get() as $in )
                                @php
                                $inv=App\Models\User::find( $in->user_id);
                                @endphp
                                <option value="{{ $inv->id }}">
                                    {{ $inv->name }}
                                    {{ $inv->family }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                       </div>
                    </div>
                    @endif

                    <div class="col-lg-4 col-md-12">
                        <div>
                            <button class="icon-button green">
                                <span> پایان خرد جمعی</span>
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

@endif



    </div>
</div>

@endsection
