@extends('layouts.admin.app',[
                                'page_header'       => trans('admin.site'),
                                'page_description'  => trans('admin.settings')
                                ])
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
@endpush
@inject('setting', 'App\Models\Setting')

@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
        <!-- form start -->
        {!! Form::model($setting,[
                                'action'=>['App\Http\Controllers\Admin\SettingController@update',$setting->id],
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'PUT',
                                ])!!}

        <div class="box-body">
            @include('layouts.partials.validation-errors')

            @foreach($settings as $setting)
                <div class="form-body">
                    <div class="form-group">
                        @if($setting->type == 'url')
                            <label for="{{$setting->key}}">{{$setting->$name}}</label>
                            {!! Form::url($setting->key,$setting->$value,[
                                'class'=>'form-control',
                            ]) !!}
                            <br>
                        @elseif($setting->type == 'email')
                            <label for="{{$setting->key}}">{{$setting->$name}}</label>
                            {!! Form::email($setting->key,$setting->$value,[
                                'class'=>'form-control',
                            ]) !!}
                            <br>
                        @elseif($setting->type == 'number')
                            <label for="{{$setting->key}}">{{$setting->$name}}</label>
                            {!! Form::number($setting->key,$setting->$value,[
                                'class'=>'form-control',
                            ]) !!}
                            <br>
                        @elseif($setting->type == 'text')
                            <label for="{{$setting->key}}">{{$setting->$name}}</label>
                            {!! Form::text($setting->key,$setting->$value,[
                                'class'=>'form-control',
                            ]) !!}
                            <br>
                        @endif
                    </div>
                </div>
            @endforeach
            <div id="map" style="height: 350px;"></div>
            <input type="hidden" name="{{$lat->key}}" value="{{$lat->$value}}" id="lat">
            <input type="hidden" name="{{$lng->key}}" value="{{$lng->$value}}" id="lng">
            <br>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{trans('admin.save')}}</button>
            </div>

        </div>
        {!! Form::close()!!}



    </div><!-- /.box -->

@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin="">

    </script>

    <script>
        var map = L.map('map').setView([{{$lat->$value}}, {{$lng->$value}}], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([{{$lat->$value}}, {{$lng->$value}}],{
            draggable: true

        }).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();

        marker.on('dragend', function () {
            var lat = marker.getLatLng().lat;
            var lng = marker.getLatLng().lng;
            $('#lat').val(lat);
            $('#lng').val(lng);
        });

    </script>
@endpush
