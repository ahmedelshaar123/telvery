@extends('layouts.admin.app',[
        'page_header'       => trans("admin.telvery"),
        'page_description'  => trans("admin.order_details")
  ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> {{trans("admin.order_details")}} # {{$order->id}}
                            <small class="pull-left"><i class="fa fa-calendar-o"></i> {{$order->created_at->toFormattedDateString()}}
                            </small>
                        </h2>
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        {{trans("admin.order_from")}}
                        <address>
                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i> {{trans("admin.name")}}
                            : {{optional($order->client)->first_name . ' ' . optional($order->client)->last_name}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i> {{trans("admin.phone")}}
                            : {{optional($order->shipping)->phone}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>{{trans("admin.email")}}
                            : {{optional($order->client)->email}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>  {{trans("admin.address")}}
                            : {{optional($order->shipping)->address.', '.optional($order->shipping->governorate)->$name}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>{{trans("admin.payment_method")}}
                            : {{optional($order->PaymentMethod)->$name}}
                            <br>
                            @if(!is_null($order->transaction_id))
                                <i class="fa fa-angle-left" aria-hidden="true"></i>{{trans("admin.transaction_id")}}
                                : {{$order->transaction_id}}
                                <br>
                            @endif
                            @if(!is_null($order->coupon))
                                <i class="fa fa-angle-left" aria-hidden="true"></i>{{trans("admin.coupon")}}
                                : {{optional($order->coupon)->code}}
                                <br>
                            @endif
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>{{trans("admin.delivery_cost")}}
                            : {{$order->delivery_cost}} {{trans("admin.pound")}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>{{trans("admin.total_price")}}
                            : {{$order->total_price}} {{trans("admin.pound")}}
                            <br>
                        </address>
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        @foreach($orderProducts as $orderProduct)
                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i>{{trans("admin.product_name")}}
                            :<strong> {{optional($orderProduct->product)->$name}}</strong><br>

                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i>  {{trans("admin.price")}}
                            :<strong> {{$orderProduct->price}}  {{trans("admin.pound")}}</strong><br>

                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i>{{trans("admin.quantity")}}
                            :<strong> {{$orderProduct->quantity}}</strong><br>
                            @if($order->user()->hasRole("admin"))
                                <i class="fa fa-angle-left"
                                   aria-hidden="true"></i>{{trans("admin.merchant")}}
                                :<strong> {{optional($orderProduct->product->user)->name}}</strong><br>
                                <br>
                            @endif
                        @endforeach
                    </div><!-- /.col -->
                    <address>
                        <i class="fa fa-angle-left" aria-hidden="true"></i><b> {{trans("admin.order_id")}}: #{{$order->id}}</b><br>
                    </address>
                </div><!-- /.row -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <a href="" class="btn btn-default" id="print-all">
                            <i class="fa fa-print"></i> {{trans("admin.print")}} </a>
                    </div>
                </div>
            </section><!-- /.content -->
            <div class="clearfix"></div>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            $("#print-all").click(function () {
                window.print();
            });
        </script>
    @endpush
@endsection
