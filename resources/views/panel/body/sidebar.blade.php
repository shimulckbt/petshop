<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pet Shop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    @if (auth()->user()->role->name == 'Admin')
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Products
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('products*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                aria-expanded="true" aria-controls="collapseProducts">
                <i class="fas fa-fw fa-folder"></i>
                <span>Products</span>
            </a>
            <div id="collapseProducts" class="collapse {{ request()->is('products*') ? 'show' : '' }}"
                aria-labelledby="headingProducts" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Categories:</h6>
                    <a class="collapse-item {{ request()->is('products/categories') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">All Categories</a>
                    <a class="collapse-item {{ request()->is('products/create-sub-categories') ? 'active' : '' }}"
                        href="{{ route('subCategory.create') }}">Add Categories</a>
                    <a class="collapse-item {{ request()->is('products/create-sub-sub-categories') ? 'active' : '' }}"
                        href="{{ route('subSubCategory.create') }}">Add Brands/Breeds</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Products:</h6>
                    <a class="collapse-item" href="">All Products</a>
                    <a class="collapse-item" href="">Add New Product</a>
                </div>
            </div>
        </li>
    @endif

    {{-- Manage Seller --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading">
        Manage Seller
    </div>

    @if (auth()->user()->role->name == 'Admin')
        <li class="nav-item {{ request()->is('seller*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSellers"
                aria-expanded="true" aria-controls="collapseSellers">
                <i class="fas fa-fw fa-folder"></i>
                <span>Manage Seller</span>
            </a>
            <div id="collapseSellers" class="collapse {{ request()->is('seller*') ? 'show' : '' }}"
                aria-labelledby="headingSellers" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">All Sellers:</h6>
                    <a class="collapse-item {{ request()->is('seller/manage-all') ? 'active' : '' }}"
                        href="{{ route('showAllSellers') }}">All Sellers</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>
    @endif

    {{-- Manage Appointments --}}

    @if (auth()->user()->role->name === 'Seller' && isset(Auth::user()->sellerDetail) && Auth::user()->sellerDetail->is_verified === 1)
        {{-- @if (Auth::user()->sellerDetail->is_verified === 1) --}}
        <li class="nav-item {{ request()->is('appointments*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAppointments"
                aria-expanded="true" aria-controls="collapseAppointments">
                <i class="fas fa-fw fa-folder"></i>
                <span>Manage Appointment</span>
            </a>
            <div id="collapseAppointments" class="collapse {{ request()->is('appointments*') ? 'show' : '' }}"
                aria-labelledby="headingAppointments" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">All Appointments:</h6>
                    <a class="collapse-item {{ request()->is('appointments/create') ? 'active' : '' }}"
                        href="{{ route('appointments.create') }}">Create Appointments</a>

                    <a class="collapse-item {{ request()->is('appointments') ? 'active' : '' }}"
                        href="{{ route('appointments.index') }}">Show Appointments</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>
        {{-- @endif --}}
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
