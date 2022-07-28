@extends('layouts.admin.app',[
        'page_header'       => trans("Admin.telvery"),
        'page_description'  => trans("admin.shippings")
  ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            @if(count($shippings))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.address")}}</th>
                        <th class="text-center">{{trans("admin.governorate")}}</th>
                        <th class="text-center">{{trans("admin.phone")}}</th>
                        <th class="text-center">{{trans("admin.zip_code")}}</th>
                        </thead>
                        <tbody>
                        @foreach($shippings as $shipping)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$shipping->address}}</td>
                                <td class="text-center">{{optional($shipping->governorate)->$name}}</td>
                                <td class="text-center">{{$shipping->phone}}</td>
                                <td class="text-center">{{$shipping->zip_code}}</td>
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
