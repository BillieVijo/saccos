<!DOCTYPE html>
<html lang="en">
    @include('layouts.backend.head')
    
    <body class="sb-nav-fixed">
        {{-- Top navigation bar --}}
        @include('layouts.backend.navbar')

        <div id="layoutSidenav">
            {{-- Sidebar navigation --}}
            @include('layouts.backend.sidenav')



            <div id="layoutSidenav_content">
                @yield('main')

                @include('layouts.backend.footer')
            </div>
        </div>

        @include('layouts.backend.scripts')
    </body>
</html>
