<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--favicons -->
    <link rel="icon" type="image/png" href="{{asset('uploads/logo.png')}}"/>
    <link href="{{asset('uploads/logo.png')}}" rel="apple-touch-icon">
    <!--favicons -->
    <title> {{trans('admin.site')}} | {{trans('admin.db')}} </title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="{{asset('inspina/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspina/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('inspina/Ionicons/css/ionicons.min.css')}}">
    <link href="{{asset('inspina/css/animate.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('inspina/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('inspina/js/plugins/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('inspina/js/plugins/bootstrap-fileinput/css/fileinput.min.css')}}">
    <link rel="stylesheet" href="{{asset('inspina/js/plugins/lightbox2/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link href="{{asset('inspina/css/style.css')}}" rel="stylesheet">
    @if(app()->getLocale() == 'ar')
        <link href="{{asset('inspina/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
        <link href="{{asset('inspina/css/inspina-rtl.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('inspina/css/style.css')}}" rel="stylesheet">
    @endif
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    @stack('styles')
</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        {{--// profile image and display name of user--}}
                        <span>
                           <p>{{trans('admin.welcome') . ' ' . auth()->user()->name}}</p>
                         </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
{{--                                <span class="block m-t-xs">--}}
{{--                                    <strong class="font-bold">{{Auth::user()->name}}</strong>--}}
{{--                                    @foreach(auth()->user()->roles as $role)--}}
{{--                                        <span class="label label-success">{{$role->display_name}}</span>--}}
{{--                                    @endforeach--}}
{{--                                </span>--}}
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            {{--<li><a href="">حسابي</a></li>--}}
                            {{--<li class="divider"></li> -->--}}
                            <li>
                                <script type="">
                                    function submitSidebarSignout() {
                                        document.getElementById('signoutSidebar').submit();
                                    }
                                </script>
                                {!! Form::open(['method' => 'post', 'url' => url('logout'),'id'=>'signoutForm','id'=>'signoutSidebar']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('logout')}}" onclick="submitSidebarSignout()">{{trans('admin.logout')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">{{ config('app.name') }}</div>
                </li>
                    {{--            Home--}}
                    <li>
                        <a href="{{url('admin/home')}}">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">{{trans('admin.home')}}</span>
                        </a>
                    </li>

                    {{--            top sliders--}}
                    <li>
                        <a href="{{url('admin/top-sliders')}}">
                            <i class="fa fa-sliders"></i>
                            <span class="nav-label">{{trans('admin.top')}}</span>
                        </a>
                    </li>
                    {{--            company team--}}
                    <li>
                        <a href="{{url('admin/company-team')}}">
                            <i class="fa fa-users"></i>
                            <span class="nav-label">{{trans('admin.team')}}</span>
                        </a>
                    </li>
                    {{--            featured estates--}}
                    <li>
                        <a href="{{url('admin/featured-estates')}}">
                            <i class="fa fa-building-o"></i>
                            <span class="nav-label">{{trans('admin.feat')}}</span>
                        </a>
                    </li>
                    {{--            services--}}
                    <li>
                        <a href="{{url('admin/services')}}">
                            <i class="fa fa-hand-o-up"></i>
                            <span class="nav-label">{{trans('admin.services')}}</span>
                        </a>
                    </li>
                    {{--            posts--}}
                    <li>
                        <a href="{{url('admin/posts')}}">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <span class="nav-label">{{trans('admin.posts')}}</span>
                        </a>
                    </li>
                    {{--            partners--}}
                    <li>
                        <a href="{{url('admin/partners')}}">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            <span class="nav-label">{{trans('admin.partners')}}</span>
                        </a>
                    </li>
                    {{--            bottom sliders--}}
                    <li>
                        <a href="{{url('admin/bottom-sliders')}}">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <span class="nav-label">{{trans('admin.bot')}}</span>
                        </a>
                    </li>
                    {{--            users--}}
                    <li>
                        <a href="{{url('admin/users')}}">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span class="nav-label">{{trans('admin.users')}}</span>
                        </a>
                    </li>
                    {{--            roles--}}
                    <li>
                        <a href="{{url('admin/roles')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="nav-label">{{trans('admin.roles')}}</span>
                        </a>
                    </li>
                    {{--            contacts--}}
                    <li>
                        <a href="{{url('admin/contacts')}}">
                            <i class="fa fa-phone"></i>
                            <span class="nav-label">{{trans('admin.contacts')}}</span>
                        </a>
                    </li>
                    {{--            subscribers--}}
                    <li>
                        <a href="{{url('admin/subscribers')}}">
                            <i class="fa fa-mail-reply-all"></i>
                            <span class="nav-label">{{trans('admin.subscribers')}}</span>
                        </a>
                    </li>
                    {{--            static pages--}}
                    <li>
                        <a href="{{url('admin/static-pages')}}">
                            <i class="fa fa-paper-plane-o"></i>
                            <span class="nav-label">{{trans('admin.static_pages')}}</span>
                        </a>
                    </li>
                    {{--            settings--}}
                    <li>
                        <a href="{{url('admin/settings')}}">
                            <i class="fa fa-gears"></i>
                            <span class="nav-label">{{trans('admin.settings')}}</span>
                        </a>
                    </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <style>
            span.select2-container {
                z-index: 10050;
                width: 100% !important;
                padding: 0;
            }
            .select2-container .select2-search--inline {
                float: left;
                width: 100%;
            }
        </style>
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary pull-right" href="#"><i
                            class="fa fa-bars"></i> </a>
                    {{--<form role="search" class="navbar-form-custom" method="post" action="#">--}}
                    {{--<div class="form-group">--}}
                    {{--<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">--}}
                    {{--</div>--}}
                    {{--</form>--}}
                </div>
                <ul class="nav navbar-top-links @if(app()->getLocale() == 'en') navbar-right @else navbar-left @endif">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i> {{trans('admin.lang')}}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <ul class="menu bg-primary">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar' )
                                        <li>
                                            <a class="text-white" rel="alternate" hreflang="en"
                                               href="{{LaravelLocalization::getLocalizedURL('en', null, [], true)}}">
                                                English
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a class="text-white" rel="alternate" hreflang="ar"
                                               href="{{LaravelLocalization::getLocalizedURL('ar', null, [], true)}}">
                                                العربية
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <script type="">
                            function submitSignout() {
                                document.getElementById('signoutForm').submit();
                            }
                        </script>
                        {!! Form::open(['method' => 'post', 'url' => url('logout'),'id'=>'signoutForm']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('logout')}}" onclick="submitSignout()">
                          <i class="fa fa-sign-out"></i>{{trans('admin.logout')}}
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <section class="content-header">
            <h1>
                {{$page_header ?? trans('admin.site')}}
                <small>{!! $page_description ?? '' !!}</small>
            </h1>
        </section>
        <div class="wrapper wrapper-content">
            <div class="row">
{{--                @if(session()->has('key'))--}}
{{--                    <div class="alert alert-success">{{session()->get('key')}}</div>--}}
{{--                @endif--}}
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
            <div class="footer">
                <img src="https://www.smartlevel.sa/inspina/img/logo.png" alt="" style="width: 100px" height="100px">
                <div>
                    <strong>&copy;</strong>{{trans('admin.all_rights_reserved')}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mainly scripts -->
<script src="{{asset('inspina/js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('inspina/js/bootstrap.min.js')}}"></script>
<script src="{{asset('inspina/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('inspina/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- Custom and plugin javascript -->
<script src="{{asset('inspina/js/inspinia.js')}}"></script>
<script src="{{asset('inspina/js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('inspina/js/plugins/jquery-confirm/jquery.confirm.min.js')}}"></script>
<script src="{{asset('inspina/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('inspina/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('inspina/js/plugins/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<script src="{{asset('inspina/js/plugins/bootstrap-fileinput/js/fileinput_locale_ar.js')}}"></script>
<script src="{{asset('inspina/js/plugins/lightbox2/js/lightbox.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<style>
    .swal2-popup {
        font-size: 1.5rem !important;
    }
</style>
<script>
    function readImg(input, img) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(img).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    function previewImages(input) {

        var preview = document.querySelector('#preview');

        if (input.files) {
            [].forEach.call(input.files, readAndPreview);
        }

        function readAndPreview(file) {

            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...

            var reader = new FileReader();

            reader.addEventListener("load", function() {
                var image = new Image();
                image.height = 50;
                image.title  = file.name;
                image.src    = this.result;
                preview.appendChild(image);
            });

            reader.readAsDataURL(file);

        }

    }

    // document.querySelector('#multi-imgs-tag').addEventListener("change", previewImages);
</script>
@if(session()->has('key'))
<script>
        // setTimeout(function(){
        //     $("div.alert").remove();
        // }, 2000 ); // 2 secs
        Swal.fire({
            title: '{{session()->get('key')}}',
        });
        location.reload();
</script>
@endif
<script>
    $(document).on('click', '.destroy', function () {
        var route = $(this).attr('data-route');
        var elem = $(this).parent('td').parent('tr');
        var token = $(this).attr('data-token');
        Swal.fire({
            title: "{{trans('admin.sure')}}",
            imageUrl: "{{asset('uploads/logo.png')}}",
            text: "{{trans('admin.once_deleted')}}",
            showCancelButton: true,
            showConfirmButton: true,
        })
            .then((willDelete) => {
                if (willDelete.value) {
                    $.ajax({
                        url : route,
                        type : "POST",
                        data : {'_method' : 'DELETE', _token : token},
                        dataType: 'json',
                        success: function(response){
                            if(response === 'delete'){
                                elem.remove();
                                Swal.fire({
                                    icon: 'success',
                                    title: "{{trans('admin.success_op')}}",
                                    text : "{{trans('admin.deleted')}}",
                                });
                            }
                            else if(response === 'not-delete'){
                                Swal.fire({
                                    icon: 'error',
                                    title: "{{trans('admin.cant_del')}}",
                                });
                            }

                        },
                    })
                } else {
                    Swal.fire({
                        icon: 'info',
                        title:"{{trans('admin.cancelled')}}",
                    });
                }
            });

    });
</script>
<script src="https://cdn.tiny.cloud/1/ue2vr7a42s2iuoqlxjebdb6u4zpnq2ml4nthmk3ftvuzc53f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.myTextArea'
    });
</script>
{{--<script>--}}
{{--    $('body').on('keyup', '#search', function () {--}}
{{--        var search = $(this).val();--}}
{{--        var dataUrl = $(this).data('url');--}}
{{--        $.ajax({--}}
{{--            url: 'search',--}}
{{--            datatype: 'html',--}}
{{--            data: {'search': search, 'dataUrl':dataUrl},--}}
{{--            success: function (result) {--}}
{{--                $('#ajax_search').html(result);--}}
{{--                console.log(result);--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#table1').DataTable(
            {
                searching: true,
                paging: true,
                //scrollY: 200
                //deferRender: true
                "info": false,
                "ordering": false,
                //"processing": true
                language: {
                    search: '{{trans('admin.search_here')}}',
                }
            }
        );
    });
</script>
<script>
    $(document).ready( function () {
        @if(app()->getLocale() == 'ar')
            $('#table1_filter').css({'float':'right'})
        @else
            $('#table1_filter').css({'float':'left'})
        @endif
    });
</script>
@stack('scripts')
</body>
</html>
