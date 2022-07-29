@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.add"),
                                ])
@inject('slider', 'App\Models\Slider')
@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($slider,[
                                'action'=>'App\Http\Controllers\Admin\SliderController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST',
                                'files'=>true
                                ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="title_ar">{{trans("admin.title_ar")}}</label>
                {!! Form::text('title_ar',null,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="title_en">{{trans("admin.title_en")}}</label>
                {!! Form::text('title_en',null,[
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
