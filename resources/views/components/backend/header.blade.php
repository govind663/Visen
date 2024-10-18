<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
    </div>
    <div class="header-right">
        {{-- <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div> --}}

        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('assets/backend/vendors/images/admin.png') }}" alt="" style="vertical-align: middle;"/>
                    </span>
                    <span class="user-name">
                        @if(Auth::check())
                            Admin
                        @else
                            Guest
                        @endif
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <strong class="dropdown-item-text text-justify text-primary">
                        Welcome,
                        {{ Auth::user()->email }}
                    </strong>
                    <hr>
                    <a class="dropdown-item" href="{{ route('change-password') }}">
                        <i class="dw dw-user1"></i> Change Password
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="dw dw-logout"></i>
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
