<div class="col-lg-3">
    <div class="card sidebar-menu mb-4">
        <div class="card-header">
            <h3 class="h4 card-title">Shop</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column category-menu">
                <li><a href="{{ route('shop') }}"
                        class="nav-link {{ \Request::getRequestUri() == '/shop' ? 'active' : '' }}">All</a>
                </li>
                <li><a href="{{ route('shop', 'product_category_id=' . 1) }}"
                        class="nav-link {{ str_contains(\Request::getRequestUri(), '/shop?product_category_id=1') ? 'active' : '' }}">Pets</a>
                    @if ($allCategoriesWithSubCategories[0]->productSubCategory != null)
                        <ul class="list-unstyled">
                            @foreach ($allCategoriesWithSubCategories[0]->productSubCategory as $productSubCategory)
                                <li><a href="{{ route('shop', 'product_category_id=1&product_sub_category_id=' . $productSubCategory->id) }}"
                                        class="nav-link {{ str_contains(\Request::getRequestUri(), '/shop?product_category_id=1&product_sub_category_id=' . $productSubCategory->id) ? 'text-primary' : '' }}">{{ $productSubCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                <li><a href="{{ route('shop', 'product_category_id=' . 2) }}"
                        class="nav-link {{ str_contains(\Request::getRequestUri(), '/shop?product_category_id=2') ? 'active' : '' }}">Pet
                        Foods</a>
                        @if ($allCategoriesWithSubCategories[1]->productSubCategory != null)
                        <ul class="list-unstyled">
                            @foreach ($allCategoriesWithSubCategories[1]->productSubCategory as $productSubCategory)
                                <li><a href="{{ route('shop', 'product_category_id=2&product_sub_category_id=' . $productSubCategory->id) }}"
                                        class="nav-link {{ str_contains(\Request::getRequestUri(), '/shop?product_category_id=2&product_sub_category_id=' . $productSubCategory->id) ? 'text-primary' : '' }}">{{ $productSubCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                <li><a href="{{ route('shop', 'product_category_id=' . 3) }}"
                        class="nav-link {{ str_contains(\Request::getRequestUri(), '/shop?product_category_id=3') ? 'active' : '' }}">Pet
                        Accessories</a>
                        @if ($allCategoriesWithSubCategories[2]->productSubCategory != null)
                        <ul class="list-unstyled">
                            @foreach ($allCategoriesWithSubCategories[2]->productSubCategory as $productSubCategory)
                                <li><a href="{{ route('shop', 'product_category_id=3&product_sub_category_id=' . $productSubCategory->id) }}"
                                        class="nav-link {{ str_contains(\Request::getRequestUri(), '/shop?product_category_id=3&product_sub_category_id=' . $productSubCategory->id) ? 'text-primary' : '' }}">{{ $productSubCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
