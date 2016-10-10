<nav class="nav has-shadow">
  <div class="nav-left">
    <a class="nav-item is-brand" href="{{ route('home') }}">
      <img class="logo" src="/img/espresso_machine.svg">
      <span>ISPRESSO</span>
    </a>
    <a class="nav-item is-tab @yield('navigation/beans/is-active')"
        href="{{ route('beans.index') }}">Beans</a>
    <a class="nav-item is-tab @yield('navigation/roasts/is-active')"
        href="{{ route('roasts.index') }}">Roasts</a>
    <a class="nav-item is-tab @yield('navigation/brews/is-active')"
        href="{{ route('brews.index') }}">Brews</a>
    <a class="nav-item is-tab @yield('navigation/tastings/is-active')"
        href="{{ route('tastings.index') }}">Tastings</a>
    <a class="nav-item is-tab @yield('navigation/reports/is-active')"
        href="{{ route('reports.index') }}">Reports</a>
  </div>

  <span class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
  </span>

  <div class="nav-right nav-menu">

    <span class="nav-item">
      <a class="button" >
        <span class="icon">
          <i class="fa fa-sign-out"></i>
        </span>
        <span>Logout</span>
      </a>
    </span>
  </div>
</nav>
