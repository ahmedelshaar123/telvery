@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.add"),
                                ])
@inject('team', 'App\Models\Team')
@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($team,[
                                'action'=>'App\Http\Controllers\Admin\TeamController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST',
                                'files'=>true
                                ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="name_ar">{{trans("admin.name_ar")}}</label>
                {!! Form::text('name_ar',null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="name_en">{{trans("admin.name_en")}}</label>
                {!! Form::text('name_en',null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="job_ar">{{trans("admin.job_ar")}}</label>
                {!! Form::text('job_ar',null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="job_en">{{trans("admin.job_en")}}</label>
                {!! Form::text('job_en',null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="desc_ar">{{trans("admin.desc_ar")}}</label>
                <textarea class="form-control myTextArea" name="desc_ar">
                </textarea>
            </div>
            <div class="form-group">
                <label for="desc_en">{{trans("admin.desc_en")}}</label>
                <textarea class="form-control myTextArea" name="desc_en">
                </textarea>
            </div>
            <div class="form-group">
                <label for="path">{{trans("admin.image")}}</label>
                <input type="file" name="path" class="form-control image">
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{trans("admin.save")}}</button>
        </div>
        {!! Form::close() !!}
    </div>
@stop
