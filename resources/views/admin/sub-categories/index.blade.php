@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.sub_categories"),
                                ])
@section('content')
    <div class="ibox-content">
        <div @if(app()->getLocale() == 'ar')  class="pull-right" @else class="pull-left" @endif>
            <a href="{{url('admin/sub-categories/create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i>{{trans("admin.add")}}
            </a>
        </div>
        <hr>
        <div class="box-body">
            @if(count($subCategories))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.image")}}</th>
                        <th class="text-center">{{trans("admin.name")}}</th>
                        <th class="text-center">{{trans("admin.under_category")}}</th>
                        <th class="text-center">{{trans("admin.edit")}}</th>
                        <th class="text-center">{{trans("admin.delete")}}</th>
                        </thead>
                        <tbody>
                        @foreach($subCategories as $subCategory)
                            <tr id="removable{{$subCategory->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">
                                    <a href="{{asset(optional($subCategory->photo)->path)}}"
                                       data-lightbox="{{$subCategory->id}}">
                                        <img src="{{asset(optional($subCategory->photo)->path)}}" alt="" style="height: 50px;">
                                    </a>
                                </td>
                                <td class="text-center">{{$subCategory->$name}}</td>
                                <td class="text-center">{{optional($subCategory->category)->$name}}</td>
                                <td class="text-center">
                                    <a href="sub-categories/{{$subCategory->id}}/edit"
                                       class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <button id="{{$subCategory->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{URL::route('sub-categories.destroy',$subCategory->id)}}"
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
