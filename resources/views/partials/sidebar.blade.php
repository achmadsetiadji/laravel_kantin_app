<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kira-Kira Ramen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Action
    </div>

    @if (auth()->user()->level === "kasir")
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('/order')}}">
                <i class="fas fa-fw fa-cash-register"></i>
                <span>Transaction</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/orderan')}}">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Invoice</span>
            </a>
        </li>
    @else
        @if (auth()->user()->level == "waiter" || auth()->user()->level == "owner")
            <li class="nav-item">
                <a class="nav-link" href="{{url('/orderan')}}">
                    <i class="fas fa-fw fa-clipboard-check"></i>
                    <span>Invoice</span>
                </a>
            </li>
        @endif
        @if (auth()->user()->level == "admin" || auth()->user()->level == "waiter")
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tables Screens:</h6>
                        @if (auth()->user()->level == "admin")
                            <a class="collapse-item" href="{{url('/user')}}">
                            <i class="fas fa-fw fa-users"></i>
                            <span class="ml-1">User Table</span>
                        </a>
                        @endif
                        @if (auth()->user()->level == "admin" || auth()->user()->level == "waiter")
                        <a class="collapse-item" href="{{url('/makanan')}}">
                            <i class="fas fa-fw fa-clipboard"></i>
                            <span class="ml-1">Food Table</span>
                        </a>
                        @endif
                    </div>
                </div>
            </li>
        @endif
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
