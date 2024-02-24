<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{ (isset(session('user_details')['first_name'])) ? session('user_details')['first_name'] : ''  }}</span>
                        <span class="user-status">{{ (isset(session('user_details')['user_role']['role'])) ? session('user_details')['user_role']['role'] : '' }}</span>
                    </div> --}}
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">Krupa</span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{ asset('media/defaults/default.jpg')}}" alt="avatar" height="40" width="40"><span class="avatar-status-online">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    {{-- @if (session('user_details')['user_role']['role'] == env('StrStoreRole'))
                        <a class="dropdown-item custom-bl" href="javascript:void(0);" >
                            <i class="me-50" data-feather="home"></i>
                            <span>{{ (isset(session('user_details')['store']['store_name'])) ? session('user_details')['store']['store_name'] : '' }}</span>
                        </a>
                    @endif --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0);" id="Logout"><i class="me-50" data-feather="power"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->
