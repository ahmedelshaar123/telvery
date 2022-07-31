@extends('layouts.admin.app',[
            'page_header'       => trans("admin.telvery"),
            'page_description'       => trans("admin.teams"),
                                ])
@section('content')
    <div class="ibox-content">
        <div class="pull-right">
            <a href="{{url('admin/teams/create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i> {{trans("admin.add")}}
            </a>
        </div>
        <hr>
        <div class="box-body">
            @if(count($teams))
                <div class="table-responsive">
                    <table class="data-table table table-bordered" id="table1">
                        <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">{{trans("admin.image")}}</th>
                        <th class="text-center">{{trans("admin.name")}}</th>
                        <th class="text-center">{{trans("admin.job")}}</th>
                        <th class="text-center">{{trans("admin.desc")}}</th>
                        <th class="text-center">{{trans("admin.edit")}}</th>
                        <th class="text-center">{{trans("admin.delete")}}</th>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr id="removable{{$team->id}}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">
                                    <a href="{{asset(optional($team->photo)->path)}}"
                                       data-lightbox="{{$team->id}}"
                                    ><img src="{{asset(optional($team->photo)->path)}}"
                                          alt="" style="height: 50px;"></a>
                                </td>
                                <td class="text-center">{{$team->$name}}</td>
                                <td class="text-center">{{$team->$job}}</td>
                                <td class="text-center">{{$team->$desc}}</td>
                                <td class="text-center">
                                    <a href="teams/{{$team->id}}/edit"
                                       class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <button id="{{$team->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{URL::route('teams.destroy',$team->id)}}"
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
