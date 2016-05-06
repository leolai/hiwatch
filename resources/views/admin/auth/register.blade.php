@extends('admin.framework.main')

@section('content')
   <div class="row">
       <div class="col-md-4 col-md-offset-4">
           <form method="POST" action="/admin/auth/register">
               {{csrf_field()}}
               <div class="form-group">
                   <label for="name">@lang('auth.name')</label>
                   <input id="name" type="text" class="form-control" name="name" value="{{ord('name')}}">
               </div>
               <div class="form-group">
                   <label for="email">@lang('auth.email')</label>
                   <input id="email" type="text" class="form-control" name="email" value="{{ord('email')}}">
               </div>
               <div class="form-group">
                   <label for="password">@lang('auth.password')</label>
                   <input id="password" type="password" class="form-control" name="password">
               </div>
               <div class="form-group">
                   <label for="password_confirmation">@lang('auth.password_confirmation')</label>
                   <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
               </div>
               <button type="submit" class="btn btn-default">@lang('auth.submit')</button>
           </form>

       </div>
   </div>
@endsection