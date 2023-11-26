@extends('main.manager')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light"></span>
            ثبت تایید برداشت از حساب
            <span class="alert alert-primary">
                {{ $bill->user->name }}
                {{ $bill->user->family }}
            </span>
            به مبلغ

            <span class="alert alert-primary">
                {{ number_format($bill->amount) }}
                تومان
            </span>


        </h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-body">
                        @include('main.error')
                        <form action="{{ route('bill.update', $bill->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">نام برند</label>
                                <div class="col-sm-10">
                                    <input type="text" name="transactionId" value="{{ old('transactionId', $bill->transactionId) }}"
                                        class="form-control" id="basic-default-name" placeholder="       اطلاعات پرداخت">


                                </div>
                            </div>




                            <div class="row justify-content-end">
                                <div class="col-sm-10">

                                        <a href="{{ route('bill.index') }}"
                                            class="btn btn-danger">برگشت </a>
                                    <button type="submit" class="btn btn-primary">ارسال</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
