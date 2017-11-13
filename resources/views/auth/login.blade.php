@extends('layouts.sign ') 

@section('content')
<p class="login-box-msg">Faça login para iniciar sua sessão</p>

<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control " placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>



    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> Lembre me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
    </div>


</form>

<!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
<!-- /.social-auth-links -->

<a href="{{ route('password.request') }}">Esqueci minha senha</a>
<br>
<a href="{{ route('register') }}" class="text-center">Cadastrar</a>


@endsection