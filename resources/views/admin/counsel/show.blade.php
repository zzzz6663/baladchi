@extends('main.manager')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet   ">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-frane"></i>
                            جزئیات
                            خردجمعی
                            {{ $counsel->title }}

                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">

                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-5 col-md-5">
                            <!-- About User -->
                            <!-- Profile Overview -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            {{-- <small class="text-muted text-uppercase">نمای کلی</small> --}}
                                            <ul class="list-unstyled mt-3 mb-0">
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> سازنده :</span>
                                                    <span>
                                                        {{ $counsel->user->name }}
                                                        {{ $counsel->user->family }} -


                                                    </span>

                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> نوع :</span>
                                                    <span>
                                                        {{ __('arr.' . $counsel->reward) }}

                                                    </span>

                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <ul class="list-unstyled mt-3 mb-0">
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> تعداد شرکت کننده :</span>
                                                    <span>
                                                        {{ $counsel->answers_count() }}

                                                    </span>

                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> بهترین جواب دهنده :</span>
                                                    <span>
                                                        @if ($counsel->select_id)
                                                            @php
                                                                $inv = User::find($counsel->select_id);
                                                            @endphp
                                                            {{ $inv->name }}
                                                            {{ $inv->family }}
                                                        @endif

                                                    </span>

                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body">

                                            <h5>
                                                توضیحات:
                                            </h5>

                                            {{ $counsel->info }}

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5>صدا</h5>
                                    <audio controls>
                                        <source src="{{ $counsel->sound_clip() }}" type="audio/mpeg">
                                        مرورگر شما از پخش صوت پشتیبانی نمی‌کند.
                                    </audio>
                                    <video width="600" height="200" controls>
                                        <source src="{{ $counsel->video_clip() }}" type="video/mp4">
                                        مرورگر شما از پخش ویدئو پشتیبانی نمی‌کند.
                                    </video>
                                </div>
                                <div class="col-lg-6">
                                    <h5>ویئو</h5>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="portlet   ">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-frane"></i>
                            سوالات
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">

                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-5 col-md-5">
                            <!-- About User -->
                            <!-- Profile Overview -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-body">
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
                                                                    ({{ $ans->user->name }}
                                                                    {{ $ans->user->family }})
                                                                    {{ $ans->user->answers()->where('counsel_id', $counsel->id)->where('question_id', $question->id)->first()->answer }}***
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-body">

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
                                                                    @if ($one > 0)
                                                                        ({{ ($one * 100) / $all }})
                                                                    @endif
                                                                    %
                                                                </span>
                                                                <ul style="margin-bottom:10px">
                                                                    <h5 class="h5_m">
                                                                        پاسخ دهنده گان
                                                                    </h5>
                                                                    @foreach ($counsel->answers()->where('question_id', $question->id)->where('answer', 'a' . $i)->get() as $ua)
                                                                        <li style="display:inline-block">
                                                                            ({{ $ua->user->name }}
                                                                            {{ $ua->user->family }})
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

                            </div>


                        </div>

                    </div>

                </div><!-- /.portlet-body -->

                <div class="portlet-body">
                    <div class="row">
                        <h1>
                            اضافه کردن صوت و کلیپ به جواب ها
                        </h1>
                        <div class="col-xl-12 col-lg-5 col-md-5">
                            @include('main.error')
                            <form action="{{ route('insert.attach.answer') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="answer_id">انتخاب جواب </label>

                                        <select name="answer_id"  class="form-control" id="answer_id">
                                            <option value="">انتخاب کنید </option>
                                            @foreach ($counsel->answers()->get() as $ans)
                                            <option value="{{$ans->id}}">
                                                {{mb_substr($ans->answer, 0, 30, "UTF-8")}}  ....
                                        {{--  {{$ans->answer}}  --}}
                                                از
                                                {{$ans->user->name}}
                                                {{$ans->user->family}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="sound">اضافه کردن صوت </label>
                                        <input type="file" id="sound" name="sound" placeholder="" accept="audio/*"
                                            class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="video">اضافه کردن ویدئو </label>
                                        <input type="file" id="video" name="video" placeholder="" accept="video/*"
                                            class="form-control">
                                    </div>
                                </div>

                                <br>
                                <input type="submit" name="" value="ذخیره " id="" class="btn btn-info">
                                <br>
                                <br>
                                <br>

                            </form>
                        </div>
                    </div>
                </div>


                <div class="portlet-body">
                    <div class="row">

                        @foreach ($counsel->answers()->get() as $ans)
                        @if($ans->sound_clip())
                        <div class="user-messg-keuwords">
                            <div class="rights">
                                <h4> صوت :</h4>
                                <p>
                                    {{mb_substr($ans->answer, 0, 30, "UTF-8")}}  ....

                                </p>
                            </div>


                            <div>
                                <audio class="sound_c" controls>
                                    <source src="{{ $ans->sound_clip() }}"
                                        type="audio/mpeg">
                                    مرورگر شما از پخش صوت پشتیبانی نمی‌کند.
                                </audio>

                            </div>
                            <div class="rights">
                                <a href="{{route("counsel.show",[$counsel->id,"type"=>"sound",'id'=>$ans->id])}}" class="btn btn-danger">حذف صدا</a>
                             </div>
                        </div>
                        @endif
                        @if ($ans->video_clip())
                        <div class="user-messg-keuwords">
                            <div class="rights">
                                <h4> کلیپ :</h4>
                            </div>
                            <div>
                                <video class="video_c" width="600" height="200"
                                    controls>
                                    <source src="{{ $ans->video_clip() }}"
                                        type="video/mp4">
                                    مرورگر شما از پخش ویدئو پشتیبانی نمی‌کند.
                                </video>
                            </div>
                            <div class="rights">
                                <a href="{{route("counsel.show",[$counsel->id,"type"=>"video",'id'=>$ans->id])}}" class="btn btn-danger">حذف کلیپ</a>
                             </div>
                        </div>
                    @endif

                        @endforeach
                    </div>

                </div>
            </div><!-- /.portlet -->
        </div>
    </div>





    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <a href="{{ route('counsel.index') }}" class="btn btn-danger">برگشت</a>
        </ul>

    </div><!-- /.breadcrumb-left -->
    </div>
@endsection
