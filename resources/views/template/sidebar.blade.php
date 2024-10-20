<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laptop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EVENTORIZE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Event
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('crud-event.index') }}"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span> List Events</span>
        </a>
    </li>
    @if(auth()->check() && auth()->user()->role == 'user')
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        TRANSACTION
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('bookings.index') }}"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span> Bookings History</span>
        </a>
    </li>
    @endif
    @if(auth()->check() && (auth()->user()->role == 'admin' || (auth()->user()->role == 'organizer')))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('crud-event.create') }}"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-plus"></i>
                <span> Add Events</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('bookings.index') }}"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-shopping-cart fa-plus"></i>
                <span> Transactions</span>
            </a>
        </li>
    @endif

    @if(auth()->check() && auth()->user()->role == 'admin')
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Users Data
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('organizers.index') }}"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-clipboard"></i>
                <span> Manage Organizers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user fa-plus"></i>
                <span> Manage Users</span>
            </a>
        </li>
    @endif
    <div class="text-center d-none d-md-inline mt-3">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>