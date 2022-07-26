@extends('layouts.admin.app',[
                                'page_header'       => trans("admin.telvery"),
                                'page_description'       => trans("admin.coupons"),
                                ])
@section('content')
    <div class="ibox-content">
        <div @if(app()->getLocale() == 'ar') class="pull-right" @else class="pull-left" @endif>
            <a href="{{route('coupons.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i> {{trans("admin.add")}}
            </a>
        </div>
        <hr>
        <div class="box-body">
            @if(count($coupons))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.code")}}</th>
                        <th class="text-center">{{trans("admin.type")}}</th>
                        <th class="text-center">{{trans("admin.discount")}}</th>
                        <th class="text-center">{{trans("admin.num_users")}}</th>
                        <th class="text-center">{{trans("admin.expiry_date")}}</th>
                        @if(auth()->user()->hasRole('admin'))
                            <th class="text-center">{{trans("admin.merchant")}}</th>
                        @endif
                        <th class="text-center">{{trans("admin.delete")}}</th>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr id="removable{{$coupon->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$coupon->code}}</td>
                                @if($coupon->brand_id == null)
                                    <td class="text-center">{{trans("admin.products")}}</td>
                                @else
                                    <td class="text-center">{{optional($coupon->brand)->$name}}</td>
                                @endif
                                <td class="text-center">{{$coupon->discount * 100}} %</td>
                                <td class="text-center">{{$coupon->num_users}}</td>
                                <td class="text-center">
                                    {{ date("d M Y", strtotime($coupon->expiry_date)) }}
                                </td>
                                @if(auth()->user()->hasRole('admin'))
                                    <td class="text-center">{{optional($coupon->user)->name}}</td>
                                @endif
                                <td class="text-center">
                                    <button id="{{$coupon->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{URL::route('coupons.destroy',$coupon->id)}}"
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
