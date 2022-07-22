@extends('layouts.admin.app',[
            'page_header'       => "Telvery",
            'page_description'       => "الأسئلة الشائعة",
                                ])
@section('content')
    <div class="ibox-content">
        <div class="pull-right">
            @if(auth()->user()->hasPermission('create_faqs'))
                <a href="{{route('faqs.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>أضف سؤال
                </a>
            @else
                <a href="#" class="btn btn-primary disabled">
                    <i class="fa fa-plus"></i>أضف سؤال
                </a>
            @endif
        </div>
        <hr>
        <div class="box-body">
            @if(count($faqs))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">السؤال بالعربية</th>
                        <th class="text-center">الاجابة بالعربية</th>
                        <th class="text-center">السؤال بالانجليزية</th>
                        <th class="text-center">الاجابة بالانجليزية</th>
                        <th class="text-center">تعديل</th>
                        <th class="text-center">حذف</th>
                        </thead>
                        <tbody id="ajax_search">
                        @foreach($faqs as $faq)
                            <tr id="removable{{$faq->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$faq->question_ar}}</td>
                                <td class="text-center">{{$faq->answer_ar}}</td>
                                <td class="text-center">{{$faq->question_en}}</td>
                                <td class="text-center">{{$faq->answer_en}}</td>
                                @if(auth()->user()->hasPermission('update_faqs'))
                                    <td class="text-center"><a href="{{route('faqs.edit', $faq->id)}}"
                                                               class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                    </td>
                                @else
                                    <td class="text-center"><a href="#"
                                                               class="btn btn-xs btn-success disabled"><i class="fa fa-edit"></i></a>
                                    </td>
                                @endif
                                <td class="text-center">
                                    @if(auth()->user()->hasPermission('delete_faqs'))
                                        <button data-token="{{ csrf_token() }}"
                                                data-route="{{URL::route('faqs.destroy',$faq->id)}}"
                                                type="button" class="destroy btn btn-danger btn-xs"><i
                                                class="fa fa-trash-o"></i></button>
                                    @else
                                        <button type="button" class="destroy btn btn-danger btn-xs disabled"><i class="fa fa-trash-o"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        @else
            <div class="col-md-4 col-md-offset-4">
                <div class="alert alert-info md-blue text-center">لا توجد بيانات</div>
            </div>
        @endif
    </div>
@endsection
