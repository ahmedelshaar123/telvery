@extends('layouts.admin.app',[
         'page_header'       => trans("admin.telvery"),
         'page_description'       => trans("admin.reviews")
                                ])
@section('content')
    <div class="ibox-content">
        <div class="box-body">
            @if(count($reviews))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.client")}}</th>
                        <th class="text-center">{{trans("admin.product")}}</th>
                        <th class="text-center">{{trans("admin.comment")}}</th>
                        <th class="text-center">{{trans("admin.rating")}}</th>
                        <th class="text-center">{{trans("admin.liked")}}</th>
                        <th class="text-center">{{trans("admin.disliked")}}</th>
                        <th class="text-center">{{trans("admin.replies")}}</th>
                        <th class="text-center">{{trans("admin.delete")}}</th>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr id="removable{{$review->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{optional($review->client)->first_name . ' ' . optional($review->client)->last_name}}</td>
                                <td class="text-center">{{optional($review->product)->$name}}</td>
                                <td class="text-center">{{$review->comment}}</td>
                                <td class="text-center">{{$review->rating}}</td>
                                <?php
                                $likes=$review->reactions()->where('type','1')->count();
                                $dislikes=$review->reactions()->where('type','2')->count();
                                ?>
                                <td class="text-center">{{$likes}}</td>
                                <td class="text-center">{{$dislikes}}</td>
                                <td class="text-center"><a href="{{url(route('reviews.show',$review->id))}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a></td>
                                <td class="text-center">
                                    <button id="{{$review->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{route('reviews.destroy',$review->id)}}"
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
@stop
