<!--Header Start-->
<header id="rs-header" class="rs-header">

    <!-- Menu Start -->
    <div class="menu-area menu-sticky">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-2">
                    <div class="logo-cat-wrap">
                        <div class="logo-part">
                            <a href="index.html">
                                <img src="assets/images/dark-logo.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 text-end">
                    <div class="rs-menu-area">
                        <div class="main-menu">
                            <div class="mobile-menu">
                                <a class="rs-menu-toggle">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                            <nav class="rs-menu">
                                <ul class="nav-menu">
                                    <li class="menu-item {{ Route::is('home') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="menu-item {{ Route::is('about') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('about') }}">Tentang Kami</a>
                                    </li>
                                    <li class="menu-item {{ Route::is('cekstatus') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('cekstatus') }}">Cek Status</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
</header>
<!--Header End-->