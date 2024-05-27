<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav bg-custom" id="sidenavAccordion">
      <nav class="sb-sidenav accordion sb-sidenav bg-custom text-white" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
               
                <a class="nav-link" href="{{route('profile') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Profile
                </a>
                <div class="sb-sidenav-menu-heading">Subject </div>
<a class="nav-link collapsed" href=
                    View Document 1
                </a>                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="{{ url('layout-sidenav-light.html') }}">Light Sidenav</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="{{ url('#') }}" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="{{ url('#') }}" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('login.html') }}">Login</a>
                                <a class="nav-link" href="{{ url('register.html') }}">Register</a>
                                <a class="nav-link" href="{{ url('password.html') }}">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="{{ url('#') }}" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('401.html') }}">401 Page</a>
                                <a class="nav-link" href="{{ url('404.html') }}">404 Page</a>
                                <a class="nav-link" href="{{ url('500.html') }}">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ url('charts.html') }}">
                    <a class="nav-link" href="{{ route('tests.show', ['test' => 5]) }}">View Test</a>

                </a>
                <a class="nav-link" href="{{ url('tables.html') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
            Logout
        </a>
    </nav>
  </div>