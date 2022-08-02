@extends('layouts.admin.app',[
                                'page_header'       => 'telvery',
                                'page_description'  => 'تعديل الملف الشخصي'
                                ])

@section('content')
    <div class="ibox-content">
    @include('layouts.partials.validation-errors')
    <!-- form start -->
        {!! Form::model($user,[
                                'action'=>['App\Http\Controllers\Admin\UserController@update_profile',$user->id],
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
                        <label for="email">البريد الالكتروني</label>
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
                                <option {{$model->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="paths[]">الصور</label>
                <div class="input-group control-group img_div form-group">
                    <input type="file" name="paths[]" class="form-control image2" multiple>
                </div>
            </div>
            <div class="form-group">
                <label for="path">الصوره</label>
                <input type="file" name="path" class="form-control image">
            </div>
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
                <label for="password">الرقم السري</label>
                {!! Form::password('password',[
                    'class'=>'password1 form-control',
                ]) !!}
                <i class="show-pass1 fa fa-eye fa-1x"></i>
            </div>
            <div class="form-group">
                <label for="password_confirmation">تاكيد الرقم السري</label>
                {!! Form::password('password_confirmation',[
                    'class'=>'password2 form-control',
                ]) !!}
                <i class="show-pass2 fa fa-eye fa-1x" id=""></i>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
        {!! Form::close()!!}
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $(".show-pass1").hover(function(){
                    $('.password1').attr('type','text');
                },function(){
                    $('.password1').attr('type','password');
                });
                $(".show-pass2").hover(function(){
                    $('.password2').attr('type','text');
                },function(){
                    $('.password2').attr('type','password');
                });
            });
        </script>
    @endpush
@stop
