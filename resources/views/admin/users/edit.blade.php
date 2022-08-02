@extends('layouts.admin.app',[
                                'page_header'       => 'telvery',
                                'page_description'  => 'تعديل مستخدم'
                                ])

@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($record,[
                                'action'=>['App\Http\Controllers\Admin\UserController@update',$record->id],
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'PUT',
                                'files'=>'true'
                                ])!!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        {!! Form::text('name',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">العنوان</label>
                        {!! Form::text('address',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">البريد الالكترةني</label>
                        {!! Form::email('email',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">الهاتف</label>
                        {!! Form::text('phone',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                </div>
            </div>
            @if(auth()->user()->hasRole('admin'))
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="company_name">اسم الشركة</label>
                            {!! Form::text('company_name',null,[
                                'class'=>'form-control',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="company_age">عمر الشركة</label>
                            {!! Form::date('company_age',null,[
                                'class'=>'form-control',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category_id">اختر القسم </label>
                            <select name="category_id" class="form-control" required>
                                <option disabled value="">اختر القسم</option>
                                @foreach($categories as $category)
                                    <option {{$record->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label for="paths[]">الصور</label>
                <div class="input-group control-group img_div form-group">
                    <input type="file" name="paths[]" class="form-control image2" multiple>
                    <div class="input-group-btn">
                        <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i> اضافه</button>
                    </div>
                </div>
            </div>
            <div class="clone hide" style="display: none;">
                <div class="control-group input-group form-group" style="margin-top:10px">
                    <input type="file" name="paths[]" class="form-control" multiple>
                    <div class="input-group-btn">
                        <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> حذف</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="path">الصوره</label>
                <input type="file" name="path" class="form-control image">
            </div>
            <div class="form-group">
                <img src="{{asset(optional($record->photo)->path)}}" class="img-thumbnail image-preview" style="height: 120px">
            </div>
            @if(auth()->user()->hasRole('admin'))
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desc_ar">الوصف بالعربية</label>
                            {!! Form::textarea("desc_ar",null,[
                                'class'=>'form-control',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desc_en">الوصف بالانجليزيه</label>
                            {!! Form::textarea("desc_en",null,[
                                'class'=>'form-control',
                            ]) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebook_url">رابط الفيسبوك</label>
                    {!! Form::url("facebook_url",null,[
                        'class'=>'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    <label for="twitter_url">رابط التويتر</label>
                    {!! Form::url("twitter_url",null,[
                        'class'=>'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    <label for="instagram_url">رابط الانستجرام</label>
                    {!! Form::url("instagram_url",null,[
                        'class'=>'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    <label for="google_url">رابط الجوجل</label>
                    {!! Form::url("google_url",null,[
                        'class'=>'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    <label for="permissions">الصلاحيات</label>
                    <div class="nav-tabs-custom">
                        @php
                            //$models = ['colors','become_users','subscriptions', 'contacts','faqs','governorates','coupons','sliders', 'payment_methods', 'brands','categories','sub-categories','products','bought-togethers','color-togethers','clients', 'reviews', 'replies','teams','orders','users','settings'];
                            //$maps = ['create', 'read', 'update', 'delete', 'show', 'activated', 'deactivated'];
                            $models1 = ['questions'];
                            $maps1 = ['create', 'read','update', 'delete'];
                            $models2 = ['governorates'];
                            $maps2 = ['create', 'read','update', 'delete'];
                            $models3 = ['sliders'];
                            $maps3 = ['create', 'read','update', 'delete'];
                            $models4 = ['payment_methods'];
                            $maps4 = ['create', 'read','update', 'delete'];
                            $models5 = ['brands'];
                            $maps5 = ['create', 'read','update', 'delete'];
                            $models6 = ['categories'];
                            $maps6 = ['create', 'read','update', 'delete'];
                            $models7 = ['sub_categories'];
                            $maps7 = ['create', 'read','update', 'delete'];
                            $models8 = ['teams'];
                            $maps8 = ['create', 'read','update', 'delete'];
                            $models9 = ['subscriptions'];
                            $maps9 = ['read', 'delete'];
                            $models10 = ['contacts'];
                            $maps10 = ['read', 'delete'];
                            $models11 = ['reviews'];
                            $maps11 = ['read', 'delete'];
                            $models12 = ['coupons'];
                            $maps12 = ['create', 'read', 'delete'];
                            $models13 = ['settings'];
                            $maps13 = ['read', 'update'];
                            $models14 = ['orders'];
                            $maps14 = ['read', 'show', 'update'];
                            $models15 = ['products'];
                            $maps15 = ['read', 'create', 'update', 'show', 'delete'];
                            $models16 = ['replies'];
                            $maps16 = ['show', 'delete'];
                            $models17 = ['become_merchants'];
                            $maps17 = ['read', 'activated', 'deactivated'];
                            $models18 = ['users'];
                            $maps18 = [ 'create','read','update','delete','activated','deactivated'];
                            $models19 = ['clients'];
                            $maps19 = ['read', 'activated','deactivated','show'];
                            $models20 = ['static_pages'];
                            $maps20 = ['read', 'update'];
                            $models = [$models1,$models2,$models3,$models4,$models5,$models6,$models7,$models8,$models9,$models10,
                                    $models11,$models12,$models13,$models14,$models15,$models16,$models17,$models18,$models19,$models20];
                            $maps = [$maps1,$maps2,$maps3,$maps4,$maps5,$maps6,$maps7,$maps8,$maps9,$maps10,$maps11,$maps12,$maps13,
                                    $maps14,$maps15,$maps16,$maps17,$maps18,$maps19,$maps20];

                        @endphp
                        <ul class="nav nav-tabs">
                            @for($x=0;$x<20;$x++)
                                @foreach($models[$x] as $model)
                                    <li class="{{ $x == 0 ? 'active' : '' }}"><a href="#{{$model}}" data-toggle="tab">@lang('messages.'. $model)</a></li>
                                @endforeach
                            @endfor
                        </ul>
                        <div class="tab-content">
                            @for($x=0;$x<20;$x++)
                                @foreach($models[$x] as $model)
                                    <div class="tab-pane {{ $x == 0 ? 'active' : '' }}" id="{{$model}}">
                                        @foreach($maps[$x] as $map)
                                            <label><input type="checkbox" name="permissions[]" value="{{$map.'_'.$model}}" {{ $record->hasPermission($map.'_'.$model) ? 'checked' : '' }}> @lang('messages.'.$map)</label>&nbsp;
                                        @endforeach
                                    </div>
                                @endforeach
                            @endfor
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
        {!! Form::close()!!}
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $(".btn-add-more").click(function(){
                    var html = $(".clone").html();
                    $(".img_div").after(html);
                });
                $("body").on("click",".btn-remove",function(){
                    $(this).parents(".control-group").remove();
                });
            });
        </script>
    @endpush
@stop
