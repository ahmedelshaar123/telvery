@extends('layouts.admin.app',[
         'page_header'       => trans("admin.telvery"),
         'page_description'       => trans("admin.subscriptions")
                                ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            @if(count($subscriptions))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.email")}}</th>
                        <th class="text-center">{{trans("admin.delete")}}</th>
                        </thead>
                        <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr id="removable{{$contact->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$subscription->email}}</td>
                                <td class="text-center">
                                    <button id="{{$subscription->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{URL::route('$subscriptions.destroy',$subscription->id)}}"
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
