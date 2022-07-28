@extends('layouts.admin.app',[
        'page_header'       => "Telvery",
        'page_description'  => "تفاصيل الطلب"
  ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> تفاصيل طلب # {{$record->id}}
                            <small class="pull-left"><i class="fa fa-calendar-o"></i> {{$record->created_at->toFormattedDateString()}}
                            </small>
                        </h2>
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        طلب من
                        <address>
                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i> الاسم
                            : {{optional($record->client)->first_name . ' ' . optional($record->client)->last_name}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i> الهاتف
                            : {{optional($record->shipping)->phone}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i> البريد الإلكترونى
                            : {{optional($record->client)->email}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>  العنوان
                            : {{optional($record->shipping)->address.' '.optional($record->shipping->governorate)->name_ar}}
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>طريقه الدفع
                            : {{optional($record->PaymentMethod)->name_ar}}
                            <br>
                            @if(!is_null($record->transaction_id))
                                <i class="fa fa-angle-left" aria-hidden="true"></i>رقم العمليه التجاريه
                                : {{$record->transaction_id}}
                                <br>
                            @endif
                            @if(!is_null($record->coupon))
                                <i class="fa fa-angle-left" aria-hidden="true"></i>الكوبون
                                : {{optional($record->coupon)->code}}
                                <br>
                            @endif
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>سعر الشحن
                            : {{$record->delivery_cost}} جنيه
                            <br>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>السعر الكلي
                            : {{$record->total_price}} جنيه
                            <br>
                        </address>
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        @foreach($orderProducts as $orderProduct)
                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i>  رقم المنتج
                            :<strong> #{{$orderProduct->product_id}}</strong><br>

                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i>اسم المنتج
                            :<strong> {{optional($orderProduct->product)->name_ar}}</strong><br>

                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i>  السعر
                            :<strong> {{$orderProduct->price}} جنيه</strong><br>

                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i>الكميه
                            :<strong> {{$orderProduct->quantity}}</strong><br>

                            <i class="fa fa-angle-left"
                               aria-hidden="true"></i>اسم التاجر
                            :<strong> {{optional($orderProduct->product->user)->name}}</strong><br>
                            <br>
                        @endforeach
                    </div><!-- /.col -->
                    <address>
                        <i class="fa fa-angle-left" aria-hidden="true"></i><b> رقم الطلب: #{{$record->id}}</b><br>
                    </address>
                </div><!-- /.row -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <a href="" class="btn btn-default" id="print-all">
                            <i class="fa fa-print"></i> طباعة </a>
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
