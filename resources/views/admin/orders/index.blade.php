@extends('layouts.admin.app',[
                                'page_header'       => "Telvery",
                                'page_description'  => "الطلبات"
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
                            'placeholder' =>'رقم الطلب'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {!! Form::select('status',
                            [
                                'pending' => 'معلق',
                                'shipped' => 'تم الشحن',
                                'canceled' => 'تم الالغاء',
                                'deliverd' => 'تم التوصيل',
                            ],\Request::input('status'),[
                                'class' => 'form-control',
                                'placeholder' => 'الحاله'
                        ]) !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::date('from',request()->input('from'),[
                            'class' => 'form-control datepicker',
                            'placeholder' => 'من'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::date('to',\Request::input('to'),[
                            'class' => 'form-control datepicker',
                            'placeholder' => 'الى'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-flat btn-block btn-primary">بحث</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            @if(count($records))
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">العميل</th>
                        <th class="text-center">عنوان الشحن</th>
                        <th class="text-center">الجوال</th>
                        <th class="text-center">السعر الكلي</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center">تفاصيل الطلب</th>
                        <th class="text-center">حالة الطلب</th>
                        <th class="text-center">تعديل الحاله</th>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td class="text-center"><a href="{{url(route('orders.show',$record->id))}}"># {{$record->id}}</a></td>
                                <td class="text-center">{{optional($record->client)->first_name . ' ' . optional($record->client)->last_name}}</td>
                                <td class="text-center">{{optional($record->shipping)->address}}</td>
                                <td class="text-center">{{optional($record->shipping)->phone}}</td>
                                <td class="text-center">{{$record->total_price}} جنيه</td>
                                <td class="text-center">{{$record->created_at->toFormattedDateString()}}</td>
                                @if(auth()->user()->hasPermission('show_orders'))
                                    <td class="text-center"><a href="{{url(route('orders.show',$record->id))}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
                                @else
                                    <td class="text-center"><a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-eye"></i></a></td>
                                @endif
                                <form method="post" action="{{route('order-status', $record->id)}}">
                                    {{method_field('put')}} {{csrf_field()}}
                                    <td>
                                        <select  class="form-control" name ="status" required>
                                            <option disabled selected value="">حالة الطلب</option>
                                            <option  {{$record->status == 'pending' ? 'selected' : ''}}  value="pending">معلق</option>
                                            <option {{$record->status == 'shipped' ? 'selected' : ''}}  value="shipped">تم الشحن</option>
                                            <option {{$record->status == 'deliverd' ? 'selected' : ''}}  value="deliverd">تم التوصيل</option>
                                            <option {{$record->status == 'canceled' ? 'selected' : ''}} value="canceled">تم الالغاء</option>
                                        </select>
                                    </td>
                                    <td>
                                        @if(auth()->user()->hasPermission('update_orders'))
                                            <button class="center-block blue-bg" type="submit"><i class="fa fa-edit"></i></button>
                                        @else
                                            <button class="center-block blue-bg disabled" type="submit"><i class="fa fa-edit"></i></button>
                                        @endif
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$records->appends(request()->query())->links()}}
                </div>
            @else
                <div class="col-md-4 col-md-offset-4">
                    <div class="alert alert-info md-blue text-center">لا توجد بيانات</div>
                </div>
            @endif
        </div>
@endsection
