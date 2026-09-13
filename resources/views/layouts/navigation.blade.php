<nav x-data="{ open: false }" class="main-navigation">

    <div class="nav-container">

        <div class="nav-left">

            <div class="nav-logo">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="application-logo" />
                </a>
            </div>

            <div class="desktop-nav">

                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}"
                   class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                    Students
                </a>

                <a href="{{ route('courses.index') }}"
                   class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                    Courses
                </a>

            </div>

        </div>

        <div class="desktop-user">

            <div x-data="{ userOpen: false }" class="user-menu">

                <button
                    @click="userOpen = !userOpen"
                    class="user-button"
                    type="button"
                >
                    <span>{{ Auth::user()->name }}</span>

                    <svg
                        class="user-arrow"
                        :class="{ 'rotate': userOpen }"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div
                    x-show="userOpen"
                    @click.outside="userOpen = false"
                    x-transition
                    class="user-dropdown"
                    style="display: none;"
                >

                    <div class="user-info">
                        <strong>{{ Auth::user()->name }}</strong>
                        <span>{{ Auth::user()->email }}</span>
                    </div>

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('profile.edit') }}" class="dropdown-link">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="dropdown-link logout-link">
                            Log Out
                        </button>
                    </form>

                </div>

            </div>

        </div>

        <button
            @click="open = !open"
            class="mobile-menu-button"
            type="button"
            aria-label="Toggle navigation"
        >
            <svg
                x-show="!open"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <svg
                x-show="open"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                style="display: none;"
            >
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </div>

    <div
        x-show="open"
        x-transition
        class="mobile-navigation"
        style="display: none;"
    >

        <a href="{{ route('dashboard') }}"
           class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('students.index') }}"
           class="mobile-nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
            Students
        </a>

        <a href="{{ route('courses.index') }}"
           class="mobile-nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}">
            Courses
        </a>

        <a href="{{ route('library.index') }}"
           class="mobile-nav-link {{ request()->routeIs('library.*') ? 'active' : '' }}">
            Library

        <div class="mobile-user">

            <div class="mobile-user-info">
                <strong>{{ Auth::user()->name }}</strong>
                <span>{{ Auth::user()->email }}</span>
            </div>

            <a href="{{ route('profile.edit') }}" class="mobile-nav-link">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="mobile-nav-link mobile-logout">
                    Log Out
                </button>
            </form>

        </div>

    </div>

</nav>

<style>
    .main-navigation {
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;
        position: relative;
        z-index: 50;
    }

    .nav-container {
        max-width: 1400px;
        min-height: 68px;
        margin: 0 auto;
        padding: 0 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav-left {
        display: flex;
        align-items: center;
        gap: 45px;
    }

    .nav-logo a {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .application-logo {
        width: 34px;
        height: 34px;
        color: #2563eb;
    }

    .desktop-nav {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nav-link {
        position: relative;
        display: inline-flex;
        align-items: center;
        height: 68px;
        padding: 0 14px;
        color: #6b7280;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .nav-link:hover {
        color: #111827;
    }

    .nav-link.active {
        color: #2563eb;
        font-weight: 600;
    }

    .nav-link.active::after {
        content: "";
        position: absolute;
        left: 14px;
        right: 14px;
        bottom: 0;
        height: 2px;
        background: #2563eb;
        border-radius: 2px 2px 0 0;
    }

    .desktop-user {
        display: flex;
        align-items: center;
    }

    .user-menu {
        position: relative;
    }

    .user-button {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 12px;
        background: transparent;
        border: 1px solid transparent;
        border-radius: 8px;
        color: #374151;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .user-button:hover {
        background: #f3f4f6;
        border-color: #e5e7eb;
    }

    .user-arrow {
        width: 16px;
        height: 16px;
        transition: transform 0.2s ease;
    }

    .user-arrow.rotate {
        transform: rotate(180deg);
    }

    .user-dropdown {
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        width: 220px;
        padding: 8px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .user-info {
        display: flex;
        flex-direction: column;
        padding: 10px 12px;
        gap: 3px;
    }

    .user-info strong {
        color: #111827;
        font-size: 14px;
    }

    .user-info span {
        color: #6b7280;
        font-size: 12px;
        word-break: break-word;
    }

    .dropdown-divider {
        height: 1px;
        margin: 5px 0;
        background: #e5e7eb;
    }

    .dropdown-link {
        display: block;
        width: 100%;
        padding: 10px 12px;
        border: 0;
        border-radius: 7px;
        background: transparent;
        color: #374151;
        text-align: left;
        text-decoration: none;
        font-family: inherit;
        font-size: 14px;
        cursor: pointer;
    }

    .dropdown-link:hover {
        background: #f3f4f6;
        color: #111827;
    }

    .logout-link:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    .mobile-menu-button {
        display: none;
        width: 40px;
        height: 40px;
        padding: 8px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: #ffffff;
        color: #374151;
        cursor: pointer;
    }

    .mobile-menu-button svg {
        width: 22px;
        height: 22px;
    }

    .mobile-navigation {
        display: none;
        border-top: 1px solid #e5e7eb;
        padding: 10px 16px 16px;
        background: #ffffff;
    }

    .mobile-nav-link {
        display: block;
        width: 100%;
        padding: 11px 12px;
        border: 0;
        border-radius: 7px;
        background: transparent;
        color: #4b5563;
        text-align: left;
        text-decoration: none;
        font-family: inherit;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
    }

    .mobile-nav-link:hover {
        background: #f3f4f6;
        color: #111827;
    }

    .mobile-nav-link.active {
        background: #eff6ff;
        color: #2563eb;
        font-weight: 600;
    }

    .mobile-user {
        margin-top: 10px;
        padding-top: 12px;
        border-top: 1px solid #e5e7eb;
    }

    .mobile-user-info {
        display: flex;
        flex-direction: column;
        gap: 3px;
        padding: 8px 12px 10px;
    }

    .mobile-user-info strong {
        color: #111827;
        font-size: 14px;
    }

    .mobile-user-info span {
        color: #6b7280;
        font-size: 12px;
    }

    .mobile-logout {
        color: #dc2626;
    }

    @media (max-width: 768px) {
        .nav-container {
            min-height: 60px;
            padding: 0 16px;
        }

        .nav-left {
            gap: 0;
        }

        .desktop-nav,
        .desktop-user {
            display: none;
        }

        .mobile-menu-button {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mobile-navigation {
            display: block;
        }
    }
</style>