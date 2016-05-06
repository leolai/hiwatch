@extends('admin.framework.main')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel-heading">
            <h3 class="panel-title">@lang('auth.login')</h3>
        </div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul style="color:red;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/admin/auth/login" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="name">@lang('auth.name')</label>
                    <input id="name" type="text" class="form-control" name="name"
                           placeholder="@lang('auth.name')" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="password">@lang('auth.password')</label>
                    <input id="password" type="password" class="form-control" name="password">
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> @lang('auth.remember')
                    </label>
                </div>
                <button type="submit" class="btn btn-default">@lang('auth.submit')</button>
            </form>
        </div>
    </div>
</div>


@endsection