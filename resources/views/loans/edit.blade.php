@extends('layouts.main')
@section('title', 'شغل')
@section('content')

    <!-- /.row -->
    <div class="row">
        <section class="col-lg-8 col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-th"></i>
                    <h3 class="box-title"> ویرایش شغل {{ $job->id }} </h3>

                    <hr>
                    {{--List--}}
                    <div class="form-group">
                        <a href="{{ route('jobs.index') }}" class="btn btn-success btn-xs">
                            <i class="fa fa-list"></i>
                            لیست مشاغل
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

                    <form action="{{ route('jobs.update', ['job' => $job->id]) }}" method="post">
                        @csrf

                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="job_id" value="{{ $job->id }}">

                        {{--Title--}}
                        @component('components.input')
                            @slot('name', 'title')
                            @slot('type', 'text')
                            @slot('id', 'title')
                            @slot('label', 'عنوان')
                            @slot('value', $job->title)
                            @slot('classWrapper', 'col-md-4')
                            @slot('required', 'required')
                        @endcomponent

                        <div class="clearfix"></div>

                        {{--SubmitButton--}}
                        @component('components.submit-button')
                            @slot('name', 'update_job')
                            @slot('classWrapper', 'col-md-4')
                            @slot('value', 'ثبت')
                        @endcomponent

                    </form>

                </div>
            </div>
        </section>
    </div>

@endsection