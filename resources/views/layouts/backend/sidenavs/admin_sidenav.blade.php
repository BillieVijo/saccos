
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#role" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-nodes"></i></div>
    Roles
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="role" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('role.create')}}"><i class="fas fa-plus"> </i> Add Role</a>
        <a class="nav-link" href="{{route('role.index')}}"><i class="fas fa-columns"> </i> Manage Role</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#user" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
    Staffs
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="user" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('user.create')}}"><i class="fas fa-plus"> </i> Add Staff</a>
        <a class="nav-link" href="{{route('user.index')}}"><i class="fas fa-columns"> </i> Manage Staff</a>
    </nav>
</div>

<a class="nav-link collapsed" href="{{route('member.index')}}"  aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
    Members
</a>

<a class="nav-link collapsed" href="{{route('log.index')}}"  aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-cogs"></i></div>
    Logs
</a>



