@extends('layouts.default')

@section('content')
  <div class="landing__form-wrapper">
    <form class="landing__form" role="form" method="POST" action="{{ url('/login') }}">
      {{ csrf_field() }}
      <h1 class="landing__form-title">Login</h1>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="landing__label">E-Mail Address</label>
        <input id="email" type="email" class="landing__input" name="email" value="{{ old('email') }}">

        @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="landing__label">Password</label>
        <input id="password" type="password" class="landing__input" name="password">

        @if ($errors->has('password'))
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-group">
        <button type="submit" class="landing__button">
          Login
        </button>
        <a class="landing__button" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
      </div>
    </form>
  </div>
@endsection