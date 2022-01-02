<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed sticky-top bg-primary navbar-brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item"><a class="navbar-brand" href="#">
                    <div class="brand-logo"><img class="logo" src=""></div>
                     <h2 class="brand-text mb-0"></h2> 
                </a></li>
        </ul>
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                   
  
                </div>
                <ul class="nav navbar-nav float-right d-flex align-items-center">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-language="fr">
                            <i class="flag-icon flag-icon-fr mr-50"></i><span class="selected-language d-lg-inline d-none">Français</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item selected-language d-lg-inline d-none" href="#" data-language="ar"><i class="flag-icon flag-icon-ma mr-50"></i>Arabe</a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                class="ficon bx bx-fullscreen"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search pt-2"><i
                                class="ficon bx bx-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                            <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1"
                                data-search="template-search">
                            <div class="search-input-close"><i class="bx bx-x"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        @if(Auth::check())
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-lg-flex d-none"><span class="user-name">{{ Auth::user()->name ?? ""}}</span>
                                <span class="user-status">Available</span>
                            </div>
                            <span><img class="round" src="{{asset('/images/avatar.webp')}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        @endif
                        <div class="dropdown-menu dropdown-menu-right pb-0">
                            <a class="dropdown-item" href="{{route('dashboard')}}"><i class="bx bx-user mr-50"></i> Dashboard</a>
                            <a  class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off mr-50"></i></i>Deconnecter</a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  </nav>
  <!-- END: Header-->
  