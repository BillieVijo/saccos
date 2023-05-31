<a class="nav-link collapsed" href=""  aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"></div>
    ==========
</a>


<a class="nav-link collapsed" href="{{route('member.index')}}"  aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
    Members
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#user" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
    Loans
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="user" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('loan.requested')}}"><i class="fas fa-dollar"> </i> Loan Requested</a>
        <a class="nav-link" href="{{route('loan.index')}}"><i class="fas fa-columns"> </i> All Loan</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#deposit" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
    Deposits
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="deposit" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('deposit.made')}}"><i class="fas fa-dollar"> </i> Deposits Made</a>
        <a class="nav-link" href="{{route('deposit.index')}}"><i class="fas fa-columns"> </i> All Deposits</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#share" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
    Shares
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="share" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('share.made')}}"><i class="fas fa-dollar"> </i> Shares Made</a>
        <a class="nav-link" href="{{route('share.index')}}"><i class="fas fa-columns"> </i> All Shares</a>
    </nav>
</div>

