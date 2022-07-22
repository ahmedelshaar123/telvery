@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.add"),
                                ])
@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($subCategory,[
                                'action'=>'App\Http\Controllers\Admin\SubCategoryController@update',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'PUT',
                                'files'=>true
                                ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="name_ar">{{trans("admin.name_ar")}}</label>
                {!! Form::text('name_ar',$subCategory->name_ar,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="name_en">{{trans("admin.name_en")}}</label>
                {!! Form::text('name_en',$subCategory->name_en,[
                    'class'=>'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label for="id">{{trans("admin.choose_category")}}</label>
                <select name="id" class="form-control" required>
                    <option disabled value="">{{trans("admin.choose_category")}}</option>
                    @foreach($categories as $category)
                        <option {{$subCategory->parent_id == $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="path">{{trans("admin.image")}}</label>
                <input type="file" name="path" class="form-control">
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{trans("admin.save")}}</button>
        </div>
        {!! Form::close()!!}
    </div>
@stop
