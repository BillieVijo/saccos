<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                
                @if (auth()->user()->role_id == 1)
                    {{-- admin Side menu --}}
                    @include('layouts.backend.sidenavs.admin_sidenav')
                @elseif (auth()->user()->role_id == 2)
                    @include('layouts.backend.sidenavs.staff_sidenav')
                @elseif (auth()->user()->role_id == 3)
                    @include('layouts.backend.sidenavs.member_sidenav')
                @else
                @endif
                
                
               
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: </div>
            {{auth()->user()->roles->name}}
        </div>
    </nav>
</div>