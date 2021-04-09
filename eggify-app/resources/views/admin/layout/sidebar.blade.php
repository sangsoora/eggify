<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img src="{{ asset('assets/img/logo-color.png') }}" alt="logo" style="width: 100px"/>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Principal</li>
            <li class="nav-item {{ active_class(['admin/dashboard*']) }}">
                <a href="{{ url('/admin/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">{{ trans('admin.menu.dashboard') }}</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['admin/provider*']) }}">
                <a href="{{ url('/admin/provider') }}" class="nav-link">
                    <i class="link-icon" data-feather="truck"></i>
                    <span class="link-title">{{ trans('admin.menu.provider') }}</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['admin/producer*']) }}">
                <a href="{{ url('/admin/producer') }}" class="nav-link">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">{{ trans('admin.menu.producer') }}</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['admin/operator*']) }}">
                <a href="{{ url('/admin/operator') }}" class="nav-link">
                    <i class="link-icon" data-feather="compass"></i>
                    <span class="link-title">{{ trans('admin.menu.operator') }}</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['admin/faqs*']) }}">
                <a href="{{ url('/admin/faqs') }}" class="nav-link">
                    <i class="link-icon" data-feather="info"></i>
                    <span class="link-title">{{ trans('admin.menu.faqs') }}</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['admin/category*']) }}">
                <a href="{{ url('/admin/category') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">{{ trans('admin.menu.category') }}</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['admin/subcategory*']) }}">
                <a href="{{ url('/admin/subcategory') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">{{ trans('admin.menu.subcategory') }}</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['admin/order*']) }}">
                <a href="{{ url('/admin/order') }}" class="nav-link">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">{{ trans('admin.menu.order') }}</span>
                </a>
            </li>

            <li class="nav-item {{ active_class(['admin/users-admin*']) }}">
                <a href="{{ url('/admin/users-admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">{{ trans('admin.menu.users_admin') }}</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
