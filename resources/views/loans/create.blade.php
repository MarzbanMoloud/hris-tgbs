@extends('layouts.main')
@section('title', 'وام')
@section('content')

    {{--InjectServices - start--}}
    @inject('personnelService', '\App\Services\Personnel\PersonnelService')
    {{--InjectServices - end--}}

    <!-- /.row -->
    <div class="row">
        <section class="col-lg-8 col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-th"></i>
                    <h3 class="box-title"> ایجاد وام </h3>

                    <hr>
                    {{--List--}}
                    <div class="form-group">
                        <a href="#" class="btn btn-success btn-xs">
                            <i class="fa fa-list"></i>
                             لیست وام ها
                        </a>
                    </div>
                    <hr>

                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">

                    @include('common.validation')

                    <form action="#" method="post">
                        @csrf

                        {{--Personnel--}}
                        @component('components.select-option')
                            @slot('name', 'personnel')
                            @slot('id', 'personnel')
                            @slot('label', 'پرسنل')
                            @foreach($personnelService->all() as $key => $personnel)
                                <option value="{{ $personnel->id }}"> {{ $personnel->full_name }} </option>
                            @endforeach
                        @endcomponent

                        {{--Amount--}}
                        @component('components.input')
                            @slot('type', 'text')
                            @slot('name', 'amount')
                            @slot('id', 'amount')
                            @slot('label', 'مبلغ')
                            @slot('classWrapper', 'col-md-4')
                            @slot('required', 'required')
                        @endcomponent

                        {{--ReceiveDate--}}
                        @component('components.input')
                            @slot('type', 'text')
                            @slot('name', 'receive_date')
                            @slot('id', 'receive_date')
                            @slot('label', 'تاریخ دریافت')
                            @slot('classWrapper', 'col-md-4')
                            @slot('required', 'required')
                        @endcomponent

                        {{--Status--}}
                        @component('components.input')
                            @slot('type', 'checkbox')
                            @slot('name', 'status')
                            @slot('id', 'status')
                            @slot('label', 'وضعیت')
                            @slot('classWrapper', 'col-md-4')
                        @endcomponent

                        <div class="clearfix"></div>

                        {{--SubmitButton--}}
                        @component('components.submit-button')
                            @slot('name', 'create_loan')
                            @slot('classWrapper', 'col-md-4')
                            @slot('value', 'ثبت')
                        @endcomponent

                    </form>

                </div>
            </div>
        </section>
    </div>

@endsection