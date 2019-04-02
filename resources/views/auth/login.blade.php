@extends('layouts.dapp')

@section('content')

<section id="wrapper" class="login-register" style="background-image: url({{url('')}}/uploads/avatars/{{\App\Provider::first()->back}});">  
  <div class="login-box card" style="background-color: #ffffffcf;">
    <div class="card-body">
    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
        <a href="javascript:void(0)" class="text-center db"><img width="100px" src="{{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}" alt="Home" /><br/> <h4 class="card-title">{{\App\Provider::first()->name}}</h4></a>  
        
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus type="text" required="" placeholder="@lang('admin.username')">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required required="" placeholder="@lang('admin.password')">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="checkbox-signup">@lang('admin.rem_me')</label>
            </div>
            </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">@lang('admin.log_in')</button>
          </div>
        </div>
      
      </form>
    </div>
  </div>
</section>
@endsection