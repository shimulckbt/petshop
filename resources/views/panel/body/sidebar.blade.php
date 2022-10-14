<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
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

    @if (auth()->user()->role->name == 'Admin')
        <li class="nav-item {{ request()->is('slider*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSliders"
                aria-expanded="true" aria-controls="collapseSliders">
                <i class="fas fa-fw fa-folder"></i>
                <span>Manage Slider</span>
            </a>
            <div id="collapseSliders" class="collapse {{ request()->is('slider*') ? 'show' : '' }}"
                aria-labelledby="headingSliders" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">All Sliders:</h6>
                    <a class="collapse-item {{ request()->is('slider/view') ? 'active' : '' }}"
                        href="{{ route('manage-slider') }}">All Sliders</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>
    @endif

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    @if (auth()->user()->role->name == 'Admin' ||
        (auth()->user()->role->name === 'Seller' &&
            isset(Auth::user()->sellerDetail) &&
            Auth::user()->sellerDetail->is_verified === 1))
        <!-- Heading -->
        <div class="sidebar-heading">
            Products
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('products*') || request()->is('categories*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                aria-expanded="true" aria-controls="collapseProducts">
                <i class="fas fa-fw fa-folder"></i>
                <span>Products</span>
            </a>
            <div id="collapseProducts"
                class="collapse {{ request()->is('products*') || request()->is('categories*') ? 'show' : '' }}"
                aria-labelledby="headingProducts" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if (auth()->user()->role->name == 'Admin')
                        <h6 class="collapse-header">Product Categories:</h6>
                        <a class="collapse-item {{ request()->is('categories') ? 'active' : '' }}"
                            href="{{ route('categories.index') }}">All Categories</a>
                        <a class="collapse-item {{ request()->is('categories/create-sub-categories') ? 'active' : '' }}"
                            href="{{ route('subCategory.create') }}">Add Categories</a>
                        <a class="collapse-item {{ request()->is('categories/create-sub-sub-categories') ? 'active' : '' }}"
                            href="{{ route('subSubCategory.create') }}">Add Brands/Breeds</a>
                    @endif
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Products:</h6>
                    <a class="collapse-item {{ request()->is('products') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">All Products</a>
                    <a class="collapse-item {{ request()->is('products/create') ? 'active' : '' }}"
                        href="{{ route('products.create') }}">Add New Product</a>
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

    @if (auth()->user()->role->name === 'Seller' &&
        isset(Auth::user()->sellerDetail) &&
        Auth::user()->sellerDetail->is_verified === 1)
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

                    <a class="collapse-item {{ request()->is('appointments/all') ? 'active' : '' }}"
                        href="{{ route('sellersAllAppointments') }}">All Appointments</a>

                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>
        {{-- @endif --}}
    @endif

    {{-- My Appointment --}}

    @if (auth()->user()->role->name === 'User')
        <li class="nav-item {{ request()->is('customers*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMyAppointments"
                aria-expanded="true" aria-controls="collapseMyAppointments">
                <i class="fas fa-fw fa-folder"></i>
                <span>My Appointments</span>
            </a>
            <div id="collapseMyAppointments" class="collapse {{ request()->is('customers*') ? 'show' : '' }}"
                aria-labelledby="headingAMyppointments" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">All Appointments:</h6>
                    <a class="collapse-item {{ request()->is('customers/my-appointments') ? 'active' : '' }}"
                        href="{{ route('my.appointment') }}">My Appointments</a>\
                </div>
            </div>
        </li>
    @endif

    {{-- Appointment Taker List --}}

    @if (auth()->user()->role->name === 'Admin')
        <li class="nav-item {{ request()->is('customer-appointments*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                data-target="#collapseCustomerAppointments" aria-expanded="true"
                aria-controls="collapseCustomerAppointments">
                <i class="fas fa-fw fa-folder"></i>
                <span>My Appointments</span>
            </a>
            <div id="collapseCustomerAppointments"
                class="collapse {{ request()->is('customer-appointments*') ? 'show' : '' }}"
                aria-labelledby="headingAMyppointments" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">All Appointments:</h6>
                    <a class="collapse-item {{ request()->is('customer-appointments/taker') ? 'active' : '' }}"
                        href="{{ route('appointment.taker') }}">All Appointments</a>\
                </div>
            </div>
        </li>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
