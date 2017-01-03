<section class="top-nav">
  @if (!Auth::guest())
  <span class="top-nav__welcome">
    Hi, <span class="top-nav__em">{{ explode(' ', Auth::user()->name)[0] }}</span>!
  </span>
  @endif
  <a href="/">
    <img src="{{ asset('/images/main-logo.png') }}" class="top-nav__logo" alt="Sutton Center">
  </a>
  <ul class="top-nav__items">
    <!-- Authentication Links -->
    @if (!Auth::guest())
    <li class="top-nav__item">
      <a href="{{ url('/logout') }}" class="top-nav__link"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
    </li>
    @if (Auth::user()->is_admin())
    <li class="top-nav__item"><a href="{{ url('/register') }}" class="top-nav__link">Create User</a></li>
    @endif
    @endif
  </ul>  
</section>
