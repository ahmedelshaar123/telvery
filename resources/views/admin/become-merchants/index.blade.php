@extends('layouts.admin.app',[
         'page_header'       => trans("admin.telvery"),
         'page_description'       => trans("admin.become_merchant")
                                ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            @if(count($becomeMerchants))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.email")}}</th>
                        <th class="text-center">{{trans("admin.phone")}}</th>
                        <th class="text-center">{{trans("admin.add_merchant")}}</th>
                        <th class="text-center">{{trans("admin.activation")}}</th>
                        </thead>
                        <tbody>
                        @foreach($becomeMerchants as $becomeMerchant)
                            <tr id="removable{{$becomeMerchant->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$becomeMerchant->email}}</td>
                                <td class="text-center">{{$becomeMerchant->phone}}</td>
                                <a href="users/{{$becomeMerchant->email}}/{{$becomeMerchant->phone}}/create" class="btn btn-info"><i class="fa fa-eye"></i>
                                        {{trans("admin.add_merchant")}} </a>

                                <td class="text-center">
                                    @if($becomeMerchant->is_active == 1)
                                        <a href="become-merchants/{{$becomeMerchant->id}}/deactivated" class="btn btn-danger"><i class="fa fa-close"></i> {{trans("admin.deactivated")}}</a>
                                    @else
                                        <a href="become-merchants/{{$becomeMerchant->id}}/activated" class="btn btn-success"><i class="fa fa-check"></i>{{trans("admin.activated")}}</a>
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
