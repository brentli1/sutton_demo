@if(Auth::user() && Auth::user()->is_admin())
@extends('layouts.default')

@section('content')
<div class="landing__form-wrapper">
  <form class="landing__form" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <h1 class="landing__form-title">Create User</h1>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="name" class="landing__label">Name</label>
      <input id="name" type="text" class="landing__input" name="name" value="{{ old('name') }}">

      @if ($errors->has('name'))
      <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>

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
      <label for="password" class="landing__labellanding__label">Password</label>
      <input id="password" type="password" class="landing__input" name="password">

      @if ($errors->has('password'))
      <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      <label for="password-confirm" class="landing__label">Confirm Password</label>
      <input id="password-confirm" type="password" class="landing__input" name="password_confirmation">

      @if ($errors->has('password_confirmation'))
      <span class="help-block">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">
      <button type="submit" class="landing__button">
        <i class="fa fa-btn fa-user"></i> Register
      </button>
    </div>
  </form>
</div>
@endsection
@else
@section('content')
<div>You do not have acess to register users.</div>
@endsection
@endif
