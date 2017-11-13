@extends('layouts.sign') 
@section('content')
<p class="login-box-msg">Registre um novo cliente</p>
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}


      <div class="form-group has-feedback">
        <input placeholder="Nome completo" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
       
      </div>
      <div class="form-group has-feedback">
        <input placeholder="E-mail" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> 
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback">
        <input placeholder="CPF" id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" required>
        <span class="glyphicon glyphicon-file form-control-feedback"></span>
        @if ($errors->has('cpf'))
            <span class="help-block">
                <strong>{{ $errors->first('cpf') }}</strong>
            </span>
        @endif
       
      </div>

      <div class="form-group has-feedback">
        <input  placeholder="Senha" id="password" type="password" class="form-control" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif        
      </div>
      <div class="form-group has-feedback">
        <input placeholder="Confirmar senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Li e aceito os <a href="#">termos de uso</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Cadastrar</button>
        </div>
        <!-- /.col -->
      </div>

</form>


<a href="{{ route('login') }}">Ja sou cadastrado</a>


@endsection