<ul class="navbar-nav dashboard-sidebar">
    <li>
            <span id="sidebar-close">
                <i class="la la-times"></i>
            </span>
    </li>
    <li>
        <a class="sidebar-brand" href="{{url('/')}}">
            <img src="{{asset('images/admin/logo.png')}}" alt="logo" style="width: 84%">
        </a>
    </li>
    <li class="sidebar-heading pt-3">Main</li>
    <li class="nav-item {{ (request()->routeIs('admin.dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="la la-dashboard font-size-18 mr-1"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <hr class="sidebar-divider border-top-color">
    </li>
    <li class="sidebar-heading">Super Admin</li>
    <li class="nav-item {{ (request()->routeIs('admin.category.index')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.category.index')}}">
            <i class="la la-file-text-o font-size-18 mr-1"></i>
            <span>Manage Categories</span>
        </a>
    </li>
    <li class="nav-item {{ (request()->routeIs('admin.city.index')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.city.index')}}">
            <i class="la la-file-text-o font-size-18 mr-1"></i>
            <span>Manage Cities</span>
        </a>
    </li>
    <li>
        <hr class="sidebar-divider border-top-color">
    </li>
    <li class="sidebar-heading">Listings</li>
    <li class="nav-item">
        <a class="nav-link" href="dashboard-my-listings.html">
            <i class="la la-file-text-o font-size-18 mr-1"></i>
            <span>My listings</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="dashboard-reviews.html">
            <i class="la la-star-o font-size-18 mr-1"></i>
            <span>Reviews</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.organization.index')}}">
            <i class="la la-plus-circle font-size-18 mr-1"></i>
            <span>Add Listing</span>
        </a>
    </li>
    <li>
        <hr class="sidebar-divider border-top-color">
    </li>
    <li class="sidebar-heading">Account</li>
    <li class="nav-item">
        <a class="nav-link" href="dashboard-my-profile.html">
            <i class="la la-user font-size-18 mr-1"></i>
            <span>My Profile</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.logout')}}">
            <i class="la la-power-off font-size-18 mr-1"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
