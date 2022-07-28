@extends('layouts.admin.app',[
        'page_header'       => trans("admin.telvery"),
        'page_description'  => trans("admin.clients")
  ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            @if(count($clients))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.image")}}</th>
                        <th class="text-center">{{trans("admin.name")}}</th>
                        <th class="text-center">{{trans("admin.email")}}</th>
                        <th class="text-center">{{trans("admin.shippings")}}</th>
                        <th class="text-center">{{trans("admin.activation")}}</th>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr id="removable{{$client->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">
                                    <a href="{{asset(optional($client->photo)->path)}}"
                                       data-lightbox="{{$client->id}}">
                                        <img src="{{asset(optional($client->photo)->path)}}"
                                              alt="" style="height: 50px;">
                                    </a>
                                </td>
                                <td class="text-center">{{$client->first_name .' '. $client->last_name}}</td>
                                <td class="text-center">{{$client->email}}</td>
                                <td class="text-center"><a href="{{route('clients.show',$client->id)}}" class="btn btn-info"><i class="fa fa-eye"></i>{{trans("admin.shippings")}}</a></td>
                                <td class="text-center">
                                    @if($client->is_active)
                                        <a href="clients/{{$client->id}}/deactivated" class="btn btn-danger"><i class="fa fa-close"></i>{{trans("admin.deactivated")}}</a>
                                    @else
                                        <a href="clients/{{$client->id}}/activated" class="btn btn-success"><i class="fa fa-check"></i>{{trans("admin.activated")}}</a>
                                    @endif
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
@stop
