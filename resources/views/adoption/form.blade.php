@extends('layouts.store')

@section('content')
<section class="row">
    <section class="content-header">
      <h1>
        Adoção
        <small>Ficha cadastral</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('')}}"><i class="fa fa-shopping-bag"></i> Página Inicial</a></li>
        <li class="active">Adoção</li>
      </ol>
      <hr>
    </section>

  <form action="">
  {{ csrf_field() }}
  <fieldset>
    <legend>Informação do pet</legend>
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
  </fieldset>
  
  </form>
  
    
</section>
@endsection