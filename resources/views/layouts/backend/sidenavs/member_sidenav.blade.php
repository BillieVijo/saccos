<a class="nav-link collapsed" href=""  aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-heading"></i></div>
    ======
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#role" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-nodes"></i></div>
    Loan
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="role" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('loan.create')}}"><i class="fas fa-plus"> </i> Request Loan</a>
        <a class="nav-link" href="{{route('loan.index')}}"><i class="fas fa-columns"> </i> My Loans</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#deposit" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-dollar"></i></div>
    Deposit
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="deposit" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('deposit.create')}}"><i class="fas fa-plus"> </i> Make Deposit</a>
        <a class="nav-link" href="{{route('deposit.index')}}"><i class="fas fa-columns"> </i> My Deposits</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#share" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-dollar"></i></div>
    Share
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="share" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('share.create')}}"><i class="fas fa-plus"> </i> Add Share</a>
        <a class="nav-link" href="{{route('share.index')}}"><i class="fas fa-columns"> </i> My Shares</a>
    </nav>
</div>
