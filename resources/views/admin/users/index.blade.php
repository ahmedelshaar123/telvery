@extends('layouts.admin.app',[
                                'page_header'       => 'telvery',
                                'page_description'  => 'المستخدمين'
                                ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            <div class="pull-right">
                <a href="{{route('users.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> اضافه مستخدم جديد
                </a>
            </div>
            <div class="clearfix"></div>
            <br>
            @if(count($users))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">الصوره</th>
                        <th class="text-center">الصور</th>
                        <th class="text-center">الاسم</th>
                        <th class="text-center">البريد الالكتروني</th>
                        <th class="text-center">الهاتف</th>
                        @if(auth()->user()->hasRole('admin'))
                            <th class="text-center">العنوان</th>
                            <th class="text-center">الوصف</th>
                            <th class="text-center">القسم الرئيسي</th>
                            <th class="text-center">اسم الشركه</th>
                            <th class="text-center">عمر الشركه</th>
                            <th class="text-center">روابط التواصل الاجتماعي</th>
                            <th class="text-center">التاجر الرئيسي</th>
                        @endif
                        <th class="text-center">التفعيل</th>
                        <th class="text-center">تعديل</th>
                        <th class="text-center">حذف</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr id="removable{{$user->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td style="width: 30rem;">
                                    <a href="{{asset(optional($user->photo)->path)}}"
                                       data-lightbox="{{$user->id}}"
                                    ><img src="{{asset(optional($user->photo)->path)}}"
                                          alt="image" class="img-circle" width="50" height="50"></a>
                                </td>
                                <td style="width: 30rem;">
                                    <?php
                                    $images=$user->photos()->where('type','images')->get();
                                    ?>
                                    @foreach($images as $image)
                                        <a href="{{asset($image->path)}}" data-lightbox="{{$image->id}}">
                                            <img src="{{asset($image->path)}}" alt="image"
                                                 class="img-circle" width="50" height="50">
                                        </a>
                                    @endforeach
                                </td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">{{$user->phone}}</td>
                                @if(auth()->user()->hasRole('admin'))
                                    <td class="text-center">{{$user->address}}</td>
                                    <td class="text-center">{{$user->desc_ar}}</td>
                                    <td class="text-center">{{optional($user->category)->name_ar}}</td>
                                    <td class="text-center">{{$user->company_name}}</td>
                                    <td class="text-center">{{$user->company_age}}</td>
                                    <td class="text-center">{{$user->facebook_url}}<br>{{$user->google_url}}<br>{{$user->instagram_url}}<br>{{$user->twitter_url}}</td>
                                    <td class="text-center">
                                        @if(!is_null($user->user))
                                            {{optional($user->user)->name}}
                                        @else
                                            لا يوجد
                                        @endif
                                    </td>
                                @endif
                                <td class="text-center">
                                    @if($user->is_active)
                                        <a href="users/{{$user->id}}/deactivated" class="btn btn-danger"><i class="fa fa-close"></i> غير مفعل</a>
                                    @else
                                        <a href="users/{{$user->id}}/activated" class="btn btn-success"><i class="fa fa-check"></i>مفعل </a>
                                    @endif
                                </td>
                                <td class="text-center"><a href="users/{{$user->id}}/edit"
                                                           class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-md-4 col-md-offset-4">
                    <div class="alert alert-info md-blue text-center">لا يوجد بيانات</div>
                </div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
@stop
