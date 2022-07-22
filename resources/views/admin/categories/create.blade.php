@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.add"),
                                ])
@inject('category', 'App\Models\Category')
@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($category,[
                                'action'=>'App\Http\Controllers\Admin\CategoryController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST',
                                ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="name_ar">{{trans("admin.name_ar")}}</label>
                {!! Form::text("name_ar",null,[
                    'class'=>'form-control',

                ]) !!}
            </div>
            <div class="form-group">
                <label for="name_en">{{trans("admin.name_en")}}</label>
                {!! Form::text("name_en",null,[
                    'class'=>'form-control',

                ]) !!}
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{trans("admin.save")}}</button>
        </div>
        {!! Form::close()!!}
    </div>
@stop
