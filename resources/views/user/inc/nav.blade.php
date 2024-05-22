<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{route('welcome')}}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>BCSMAP<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar" style="font-family: 'Hind Siliguri', sans-serif;">

        <ul>
          <li><a href="{{ url("#hero") }}">Home</a></li>
          <li><a href="{{ url("#about") }}">About</a></li>
          <li><a href="{{ url("#services") }}">Services</a></li>
          <li><a href="{{ url("#portfolio") }}">Portfolio</a></li>
          <li><a href="{{ url("#team") }}">Team</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li class="dropdown"><a href="{{ url("#") }}"><span>প্রিলিমিনারি</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{ url("#") }}">বাংলা ভাষা ও সাহিত্য</a></li>
              
              <li><a href="{{ url("#") }}"> English Language and Literature</a></li>
              <li><a href="{{ url("#") }}">বাংলাদেশ বিষয়াবলি</a></li>
              <li><a href="{{ url("#") }}">আন্তর্জাতিক বিষয়াবলি </a></li>
              <li><a href="{{ url("#") }}">সাধারণ বিজ্ঞান</a></li>
              <li><a href="{{ url("#") }}">কম্পিউটার ও তথ্যপ্রযুক্তি</a></li>
              <li><a href="{{ url("#") }}">গাণিতিক যুক্তি </a></li>
              <li><a href="{{ url("#") }}">মানসিক দক্ষতা </a></li>
              <li><a href="{{ url("#") }}">নৈতিকতা, মূল্যবোধ ও সুশাসন</a></li>
              <li><a href="{{ url("#") }}">ভূগোল (বাংলাদেশ ও বিশ্বঃ) পরিবেশ ও দুর্যোগব্যবস্থাপনা</a></li>
            </ul>
          </li>
          <li><a href="{{ url("#contact") }}">Contact</a>
          <li>
          @if (Route::has('login'))
          <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
              @auth
                  <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
              @else
                  
            <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                  @if (Route::has('register'))
                <li><a href="{{ route('payment.page') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                  @endif
              @endauth
          </div>
      @endif
    </li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>