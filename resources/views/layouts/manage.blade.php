@include('_includes.header.main')
    <div id="app">
        @include('_includes.nav.main')
        @include('_includes.nav.manage')
        <div class="management-area">
          @yield('content')
        </div>
    </div>
@include('_includes.footer.main')
