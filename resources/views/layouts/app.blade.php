@include('_includes.header.main')
    <div id="app">
        @include('_includes.nav.main')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include('_includes.footer.main')
