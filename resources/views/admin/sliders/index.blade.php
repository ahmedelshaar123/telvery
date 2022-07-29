@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.sliders"),
                                ])
@section('content')
    <div class="ibox-content">
        <div class="pull-right">
            <a href="{{url('admin/sliders/create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i> {{trans("admin.add")}}
            </a>
        </div>
        <hr>
        <div class="box-body">
            @if(count($sliders))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.image")}}</th>
                        <th class="text-center">{{trans("admin.title")}}</th>
                        <th class="text-center">{{trans("admin.edit")}}</th>
                        <th class="text-center">{{trans("admin.delete")}}</th>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr id="removable{{$slider->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">
                                    <a href="{{asset(optional($slider->photo)->path)}}"
                                       data-lightbox="{{$slider->id}}"
                                    ><img src="{{asset(optional($slider->photo)->path)}}"
                                          alt="" style="height: 50px;"></a>
                                </td>
                                <td class="text-center">{{$slider->$title}}</td>
                                <td class="text-center">
                                    <a href="sliders/{{$slider->id}}/edit"
                                       class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <button id="{{$slider->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{URL::route('sliders.destroy',$slider->id)}}"
                                            type="button" class="destroy btn btn-danger btn-xs"><i
                                            class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        @else
            <div class="col-md-4 col-md-offset-4">
                <div class="alert alert-info md-blue text-center">{{trans("admin.no_data")}}</div>
            </div>
        @endif
    </div>
@endsection
