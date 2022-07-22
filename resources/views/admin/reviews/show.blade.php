@extends('layouts.admin.app',[
         'page_header'       => trans("admin.telvery"),
         'page_description'       => trans("admin.replies")
                                ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            @if(count($replies))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.client")}}</th>
                        <th class="text-center">{{trans("admin.reply")}}</th>
                        <th class="text-center">{{trans("admin.delete")}}</th>
                        </thead>
                        <tbody>
                        @foreach($replies as $reply)
                            <tr id="removable{{$reply->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{optional($reply->client)->first_name . ' ' . optional($reply->client)->last_name}}</td>
                                <td class="text-center">{{$reply->reply}}</td>
                                <td class="text-center">
                                    <button id="{{$reply->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{route('replies.destroy',$reply->id)}}"
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
@stop
