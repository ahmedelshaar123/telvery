@extends('layouts.admin.app',[
                                'page_header'       => trans("admin.telvery"),
                                'page_description'  => trans("admin.add")
                                ])
@inject('coupon', 'App\Models\Coupon')
@section('content')
    <div class="ibox-content">
        <!-- form start -->
        {!! Form::model($coupon,[
                                'action'=>'App\Http\Controllers\Admin\CouponController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST'
                                ])!!}
        <div class="box-body">
            @include('layouts.partials.validation-errors')
            <div class="form-group">
                <label for="code">{{trans("admin.code")}}</label>
                {!! Form::text('code',null,[
                    'class' => 'form-control'
                ]) !!}
            </div>
            <div class="form-group">
                <label for="discount">{{trans("admin.discount")}}</label>
                {!! Form::number('discount',null,[
                    'class' => 'form-control',
                    'step'=>'any'
                ]) !!}
            </div>
            <div class="form-group">
                <label for="num_users">{{trans("admin.num_users")}}</label>
                {!! Form::number('num_users',null,[
                    'class' => 'form-control'
                ]) !!}
            </div>
            <div class="form-group">
                <label for="expiry_date">{{trans("admin.expiry_date")}}</label>
                {!! Form::date('expiry_date',null,[
                    'class' => 'form-control'
                ]) !!}
            </div>
            <div class="form-group">
                <label for="id">{{trans("admin.choose_brand")}}</label>
                <select name="brand_id" class="form-control" required>
                    <option disabled selected value="">{{trans("admin.choose_brand")}}</option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->$name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{trans("admin.save")}}</button>
        </div>
        {!! Form::close()!!}
    </div>
@stop
