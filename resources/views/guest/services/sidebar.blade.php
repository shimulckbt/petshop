<div class="col-lg-3">
    <div class="card sidebar-menu mb-4">
        <div class="card-header">
            <h3 class="h5 card-title">Expertise</h3>
        </div>
        @php
            $skills = \App\Models\SellerDetail::with('user')->get();
        @endphp

        <div class="card-body">
            <ul class="nav nav-pills flex-column category-menu">
                <li><a href="{{ route('services.index') }}"
                        class="nav-link {{ \Request::getRequestUri() == '/services' ? 'active' : '' }}">All</a>
                </li>
                @foreach ($skills as $skill)
                    <li><a href="{{ route('services.index', 'user_id=' . $skill->user_id) }}"
                            class="nav-link {{ \Request::getRequestUri() == '/services?user_id=' . $skill->user_id ? 'active' : '' }}">{{ $skill->skill_type }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
