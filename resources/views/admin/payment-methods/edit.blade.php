@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.edit"),
                                ])
@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($paymentMethod,[
                                'action'=>['App\Http\Controllers\Admin\PaymentMethodController@update', $paymentMethod->id],
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'PUT',
                                ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="name_ar">{{trans("admin.name_ar")}}</label>
                {!! Form::text("name_ar",$paymentMethod->name_ar,[
                    'class'=>'form-control',

                ]) !!}
            </div>
            <div class="form-group">
                <label for="name_en">{{trans("admin.name_en")}}</label>
                {!! Form::text("name_en",$paymentMethod->name_en,[
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
