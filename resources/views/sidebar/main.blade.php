<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    @php
    $routeName = \Request::route()->getName();
    @endphp
    <li class="nav-item  @if($routeName == 'main_dashboard') active @endif">
        <a class="d-flex align-items-center" href="{{route('main_dashboard')}}">
            <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span>
        </a>
    </li>
    <li class="@if($routeName == 'booking.index' || $routeName == 'booking.create' || $routeName == 'booking.edit') active @endif nav-item">
        <a href="{{route('booking.index')}}">
            <i data-feather="book-open"></i>
            <span class="menu-title" data-i18n="Booking">Booking</span>
        </a>
    </li>
</ul>
