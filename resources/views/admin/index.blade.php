@extends('admin.framework.main')

@section('content')
    {{--顶部菜单--}}


    {{--主体部分--}}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li><a href="#">@lang('nav.home')</a></li>
                    </ol>
                </div>

                <div class="panel-body">
                    Welcome!
                </div>
            </div>
        </div>
    </div>

@endsection