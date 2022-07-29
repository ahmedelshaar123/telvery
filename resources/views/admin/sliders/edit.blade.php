@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.edit"),
                                ])
@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($slider,[
                                'action'=>['App\Http\Controllers\Admin\SliderController@update', $slider->id],
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'PUT',
                                'files'=>true
                                ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="title_ar">{{trans("admin.title_ar")}}</label>
                {!! Form::text('title_ar',$slider->title_ar,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="title_en">{{trans("admin.title_en")}}</label>
                {!! Form::text('title_en',$slider->title_en,[
                    'class'=>'form-control',
                ]) !!}
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
