@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light"></span>
            اضافه و حذف سوال برای
            دسته بندی:
            {{ $telic->name }}
        </h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-body">
                        @include('main.error')
                        <form action="{{ route('add.question.to.telic', $telic->id) }}" method="POST">
                            @csrf
                            @method('post')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name"> انتخاب سوالات</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="questions[]" multiple="multiple"
                                        id="cat_id">
                                        <option value="">یک مورد را انتخاب کنید </option>
                                        @foreach (App\Models\Question::all() as $question)
                                            <option
                                                {{ in_array($question->id,old('questions',$telic->questions()->pluck('id')->toArray()))? 'selected': '' }}
                                                value="{{ $question->id }}">{{ $question->fa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                    <a class="btn btn-warning" href="{{ route('telic.index') }}">برگشت</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive text-nowrap">
                    <table class="table ">
                        <thead class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>نام </th>
                                <th>عمل‌ها</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($telic->questions as $question)
                                <tr>
                                    <td>{{ $loop->iteration }} </td>

                                    <td> <strong> {{ $question->fa }}</strong></td>
                                    <td>
                                        <span data-id="{{ $telic->id }}" data-question="{{ $question->id }}"
                                            class="alert pointer change_telic_required alert-solid-{{ $question->pivot->required ? 'success' : 'danger' }}">
                                            {{ $question->pivot->required ? 'ضروری' : 'غیر ضرروی' }}
                                        </span>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
