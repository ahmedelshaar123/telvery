@extends('layouts.admin.app',[
         'page_header'       => trans("admin.telvery"),
         'page_description'       => trans("admin.contacts")
                                ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            @if(count($contacts))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.name")}}</th>
                        <th class="text-center">{{trans("admin.phone")}}</th>
                        <th class="text-center">{{trans("admin.email")}}</th>
                        <th class="text-center">{{trans("admin.message")}}</th>
                        <th class="text-center">{{trans("admin.delete")}}</th>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr id="removable{{$contact->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$contact->first_name." ".$contact->last_name}}</td>
                                <td class="text-center">{{$contact->email}}</td>
                                <td class="text-center">{{$contact->phone}}</td>
                                <td class="text-center">{{$contact->message}}</td>
                                <td class="text-center">
                                    <button id="{{$contact->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{URL::route('contacts.destroy',$contact->id)}}"
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
