<div class="col-lg-3">
    <div class="card sidebar-menu mb-4">
        <div class="card-header">
            <h3 class="h4 card-title">Shop</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column category-menu">
                <li><a href="{{ route('shop') }}" class="nav-link {{ \Request::getRequestUri() == '/shop' ? 'active' : '' }}">All</a>
                </li>
                <li><a href="{{ route('shop', 'product_category_id=' . 1) }}" class="nav-link {{ \Request::getRequestUri() == '/shop?product_category_id=1' ? 'active' : '' }}">Pets</a>
                </li>
                <li><a href="{{ route('shop', 'product_category_id=' . 2) }}" class="nav-link {{ \Request::getRequestUri() == '/shop?product_category_id=2' ? 'active' : '' }}">Pet Foods</a>
                </li>
                <li><a href="{{ route('shop', 'product_category_id=' . 3) }}" class="nav-link {{ \Request::getRequestUri() == '/shop?product_category_id=3' ? 'active' : '' }}">Pet Accessories</a>
                </li>
            </ul>
        </div>
    </div>
</div>