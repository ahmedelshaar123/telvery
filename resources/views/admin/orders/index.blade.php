@extends('layouts.admin.app',[
                                'page_header'       => trans("admin.telvery"),
                                'page_description'  => trans("admin.orders")
                          ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            {!! Form::open([
                       'method' => 'get'
                       ]) !!}
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        {!! Form::text('order_id',request()->input('order_id'),[
                            'class' => 'form-control',
                            'placeholder' => trans("admin.order_id")
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {!! Form::select('status',
                            [
                                'pending' => trans("admin.pending"),
                                'shipped' => trans("admin.shipped"),
                                'cancelled' => trans("admin.cancelled"),
                                'delivered' => trans("admin.delivered"),
                            ],\Request::input('status'),[
                                'class' => 'form-control',
                                'placeholder' => trans("admin.status")
                        ]) !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::date('from',request()->input('from'),[
                            'class' => 'form-control datepicker',
                            'placeholder' => trans("admin.from")
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::date('to',\Request::input('to'),[
                            'class' => 'form-control datepicker',
                            'placeholder' => trans("admin.to")
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-flat btn-block btn-primary">{{trans("admin.search")}}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            @if(count($orders))
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.client")}}</th>
                        <th class="text-center">{{trans("admin.shipping")}}</th>
                        <th class="text-center">{{trans("admin.phone")}}</th>
                        <th class="text-center">{{trans("admin.total_price")}}</th>
                        <th class="text-center">{{trans("admin.date")}}</th>
                        <th class="text-center">{{trans("admin.order_details")}}</th>
                        <th class="text-center">{{trans("admin.order_status")}}</th>
                        <th class="text-center">{{trans("admin.update_status")}}</th>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center"><a href="{{route('orders.show',$order->id)}}"># {{$order->id}}</a></td>
                                <td class="text-center">{{optional($order->client)->first_name . ' ' . optional($order->client)->last_name}}</td>
                                <td class="text-center">{{optional($order->shipping)->address}}</td>
                                <td class="text-center">{{optional($order->shipping)->phone}}</td>
                                <td class="text-center">{{$order->total_price}} {{trans("admin.pound")}}</td>
                                <td class="text-center">{{$order->created_at->toFormattedDateString()}}</td>
                                <td class="text-center"><a href="{{url(route('orders.show',$order->id))}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
                                <form method="post" action="{{route('order-status', $order->id)}}">
                                    {{method_field('put')}} {{csrf_field()}}
                                    <td>
                                        <select  class="form-control" name ="status" required>
                                            <option disabled selected value="">{{trans("admin.order_status")}}</option>
                                            <option  {{$order->status == 'pending' ? 'selected' : ''}}  value="pending">{{trans("admin.pending")}}</option>
                                            <option {{$order->status == 'shipped' ? 'selected' : ''}}  value="shipped">{{trans("admin.shipped")}}</option>
                                            <option {{$order->status == 'delivered' ? 'selected' : ''}}  value="delivered">{{trans("admin.delivered")}}</option>
                                            <option {{$order->status == 'cancelled' ? 'selected' : ''}} value="cancelled">{{trans("admin.cancelled")}}</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="center-block blue-bg" type="submit"><i class="fa fa-edit"></i></button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$orders->appends(request()->query())->links()}}
                </div>
            @else
                <div class="col-md-4 col-md-offset-4">
                    <div class="alert alert-info md-blue text-center">{{trans("admin.no_data")}}</div>
                </div>
            @endif
        </div>
@endsection
