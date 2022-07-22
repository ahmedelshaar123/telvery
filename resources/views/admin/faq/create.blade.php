@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.add"),
                                ])
@inject('fa', 'App\Models\Question')
@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($fa,[
                                'action'=>'App\Http\Controllers\Admin\FAQController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST',
                                ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="question_ar">{{trans("admin.question_ar")}}</label>
                {!! Form::text("question_ar",null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="answer_ar">{{trans("admin.answer_ar")}}</label>
                {!! Form::textarea("answer_ar",null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="question_en">{{trans("admin.question_en")}}</label>
                {!! Form::text("question_en",null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="answer_en">{{trans("admin.answer_en")}}</label>
                {!! Form::textarea("answer_en",null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{trans("admin.save")}}</button>
        </div>
        {!! Form::close() !!}
    </div>
@stop
