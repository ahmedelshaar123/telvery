@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.payment_methods"),
                                ])
@section('content')
    <div class="ibox-content">
        <div @if(app()->getLocale() == 'ar')  class="pull-right" @else class="pull-left" @endif>
            <a href="{{route('payment-methods.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i>{{trans('admin.add')}}
            </a>
        </div>
        <hr>
        <div class="box-body">
            @if(count($paymentMethods))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans('admin.name')}}</th>
                        <th class="text-center">{{trans('admin.edit')}}</th>
                        <th class="text-center">{{trans('admin.delete')}}</th>
                        </thead>
                        <tbody>
                        @foreach($paymentMethods as $paymentMethod)
                            <tr id="removable{{$paymentMethod->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$paymentMethod->$name}}</td>
                                <td class="text-center"><a href="{{route('payment-methods.edit', $paymentMethod->id)}}"
                                                           class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <button data-token="{{ csrf_token() }}"
                                            data-route="{{URL::route('payment-methods.destroy',$paymentMethod->id)}}"
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
