<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="#"><img src="{{ asset('dist/assets/compiled/svg/logo.svg') }}" alt="Logo"></a>
            </div>
            <div class="gap-2 mt-2 theme-toggle d-flex align-items-center">
                <!-- Theme Toggle Code -->
                ...
            </div>
            <div class="sidebar-toggler x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item has-sub {{ Request::is('home*') || Request::is('skill*') || Request::is('work*') || Request::is('education*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-briefcase-fill"></i>
                    <span>Manage Home & About</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item {{ Request::routeIs('home.index') ? 'active' : '' }}">
                        <a href="{{ route('home.index') }}" class="submenu-link">Home</a>
                    </li>
                    <li class="submenu-item {{ Request::routeIs('skill.index') ? 'active' : '' }}">
                        <a href="{{ route('skill.index') }}" class="submenu-link">Technical Skills</a>
                    </li>
                    <li class="submenu-item has-sub {{ Request::is('work*') || Request::is('education*') ? 'active' : '' }}">
                        <a href="#" class="submenu-link">Work Experience & Education</a>
                        <ul class="submenu submenu-level-2">
                            <li class="submenu-item {{ Request::routeIs('work.index') ? 'active' : '' }}">
                                <a href="{{ route('work.index') }}" class="submenu-link">Work Experience</a>
                            </li>
                            <li class="submenu-item {{ Request::routeIs('education.index') ? 'active' : '' }}">
                                <a href="{{ route('education.index') }}" class="submenu-link">Education</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item {{ Request::routeIs('portfolio.index') ? 'active' : '' }}">
                <a href="{{ route('portfolio.index') }}" class='sidebar-link'>
                    <i class="bi bi-person-workspace"></i>
                    <span>Manage Portfolio</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('service.index') ? 'active' : '' }}">
                <a href="{{ route('service.index') }}" class='sidebar-link'>
                    <i class="bi bi-gear-fill"></i>
                    <span>Manage Services</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('contact.index') ? 'active' : '' }}">
                <a href="{{ route('contact.index') }}" class='sidebar-link'>
                    <i class="bi bi-person-rolodex"></i>
                    <span>Manage Contact</span>
                </a>
            </li>

            <li class="sidebar-title">Features</li>

            <li class="sidebar-item has-sub {{ Request::is('profile*') || Request::routeIs('logout') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-arrow-right-circle-fill"></i>
                    <span>Setting</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item {{ Request::routeIs('profile.edit') ? 'active' : '' }}">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                    </li>
                    <li class="submenu-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
