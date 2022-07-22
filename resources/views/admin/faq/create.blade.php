@extends('layouts.admin.app',[
            'page_header'       => "Telvery",
            'page_description'       => "اضافة سؤال",
                                ])
@inject('faq', 'App\Models\Question')
@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($faq,[
                                'action'=>'App\Http\Controllers\Admin\FAQController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST',
                                ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="question_ar">السؤال بالعربية</label>
                {!! Form::text("question_ar",null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="answer_ar">الاجابة بالعربية</label>
                {!! Form::textarea("answer_ar",null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="question_en">السؤال بالانجليزية</label>
                {!! Form::text("question_en",null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="answer_en">الاجابة بالانجليزية</label>
                {!! Form::textarea("answer_en",null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
        {!! Form::close() !!}
    </div>
@stop
