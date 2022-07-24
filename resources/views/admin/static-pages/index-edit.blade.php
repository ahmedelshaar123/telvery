@extends('layouts.admin.app',[
                                'page_header'       => trans('admin.telvery'),
                                'page_description'  => trans('admin.static_pages')
                                ])
@inject('static', 'App\Models\StaticPage')

@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
        <!-- form start -->
        {!! Form::model($static,[
                                'action'=>'App\Http\Controllers\Admin\StaticPageController@update',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'PUT',
                                ])!!}

        <div class="box-body">
            @foreach($staticPages as $staticPage)
                <div class="form-body">
                    <div class="form-group">
                        @if($staticPage->type == 'textarea')
                            <label for="{{$staticPage->key}}">{{$staticPage->$name}}</label>
                            <textarea name="{{$staticPage->key}}">
                                {{$staticPage->$value}}
                            </textarea>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{trans('admin.save')}}</button>
            </div>
        </div>
        <br>
        {!! Form::close()!!}
    </div><!-- /.box -->

@endsection


