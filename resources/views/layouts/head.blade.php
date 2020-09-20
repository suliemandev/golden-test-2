            <!-- HEADER DESKTOP-->

            @php
            $user = Auth::user();   
            $username = $user->name;
            $useremail = $user->email;
            @endphp
    <header class="header-desktop3 d-none d-lg-block">
        <div class="section__content section__content--p35">
            <div class="header3-wrap">
                <div class="header__logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                    </a>
                </div>
                <div class="header__navbar">
                    <ul class="list-unstyled">
                        <li class="{{ Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                            <a href="/dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                <span class="bot-line"></span>
                            </a>
                        </li>
                        <li class="{{ Request::route()->getName() == 'questions' ? 'active' : '' }}">
                            <a href="/questions">
                                <i class="fas fa-shopping-basket"></i>
                                <span class="bot-line"></span>Questions</a>
                        </li>
                        <li class="{{ Request::route()->getName() == 'trends' ? 'active' : '' }}">
                            <a href="/trends">
                                <i class="fas fa-shopping-basket"></i>
                                <span class="bot-line"></span>Trends</a>
                        </li>
                        <li class="{{ Request::route()->getName() == 'professions' ? 'active' : '' }}">
                            <a href="/professions">
                                <i class="fas fa-shopping-basket"></i>
                                <span class="bot-line"></span>professions</a>
                        </li>
                        <li class="{{ Request::route()->getName() == 'quizzes' ? 'active' : '' }}">
                            <a href="/quizzes">
                                <i class="fas fa-trophy"></i>
                                <span class="bot-line"></span>Quizzes</a>
                        </li>
                    </ul>
                </div>
                <div class="header__tool">
                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            <div class="image">
                                <img src="/images/profile.png" alt="{{ $username }}" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ $username }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="/images/profile.png" alt="{{ $username }}" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ $username }}</a>
                                        </h5>
                                        <span class="email">{{ $useremail }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    {{-- <div class="account-dropdown__item">
                                        <a href="#"><i class="zmdi zmdi-account"></i>Account</a>
                                    </div> --}}
                                    <div class="account-dropdown__item">
                                        <a href="/logout"><i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER DESKTOP-->

    <!-- HEADER MOBILE-->
    <header class="header-mobile header-mobile-2 d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="{{ Request::route()->getName() == '' ? 'active' : '' }}">
                        <a href="/">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                            <span class="bot-line"></span>
                        </a>
                    </li>
                    <li class="{{ Request::route()->getName() == 'questions' ? 'active' : '' }}">
                        <a href="/questions">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="bot-line"></span>Questions</a>
                    </li>
                    <li class="{{ Request::route()->getName() == 'results' ? 'active' : '' }}">
                        <a href="/results">
                            <i class="fas fa-trophy"></i>
                            <span class="bot-line"></span>Results</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="sub-header-mobile-2 d-block d-lg-none">
        <div class="header__tool">

            <div class="account-wrap">
                <div class="account-item account-item--style2 clearfix js-item-menu">
                    <div class="image">
                        <img src="/images/profile.png" alt="{{ $username }}" />
                    </div>
                    <div class="content">
                        <a class="js-acc-btn" href="#">{{ $username }}</a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                        <div class="info clearfix">
                            <div class="image">
                                <a href="#">
                                    <img src="/images/profile.png" alt="{{ $username }}" />
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="name">
                                    <a href="#">{{ $username }}</a>
                                </h5>
                                <span class="email">{{ $useremail }}</span>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            {{-- <div class="account-dropdown__item">
                                <a href="#"><i class="zmdi zmdi-account"></i>Account</a>
                            </div> --}}
                            <div class="account-dropdown__item">
                                <a href="/logout"><i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END HEADER MOBILE -->