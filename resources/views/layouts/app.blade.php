<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-32x32.png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/plugins.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-4-rtl.min.css">
    <link rel="stylesheet" href="/assets/style.css">
    @livewireStyles
    <!-- endinject -->
</head>

<body class="home1 mutlti-vendor">

    @auth
        <div class="menu-area rtl">
            <div class="top-menu-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-fullwidth">
                                <div class="author-menu">
                                    <!-- start .author-area -->
                                    <div class="author-area">
                                        <!--start .author-author__info-->
                                        <div class="author-author__info has_dropdown">
                                            <div class="author__avatar online">
                                                <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(auth()?->user()->email))) }}"
                                                    alt="user avatar" class="rounded-circle" width="50">
                                            </div>

                                            <div class="dropdown dropdown--author">
                                                <div class="author-credits d-flex">
                                                    <div class="author__avatar">
                                                        <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(auth()?->user()->email))) }}"
                                                            alt="user avatar" class="rounded-circle">
                                                    </div>
                                                    <div class="autor__info">
                                                        <p class="name">
                                                            {{ auth()->user()->user_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <li>
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                                <span class="icon-logout"></span>{{ __('Log Out') }}</a>
                                                        </li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--end /.author-author__info-->
                                    </div>
                                    <!-- end .author-area -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.container -->
            </div>
            <!-- end  -->
        </div>
    @else
        <div class="menu-area rtl">
            <div class="top-menu-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-fullwidth">
                                <div class="author-menu">
                                    <!-- start .author-area -->
                                    <div class="author-area">
                                        <!--start .author-author__info-->
                                        <div class="author__access_area">
                                            <ul class="d-flex">
                                                <li><a href="{{ route('register') }}">ثبت نام</a></li>
                                                <li><a href="{{ route('login') }}">ورود</a></li>
                                            </ul>
                                        </div>
                                        <!--end /.author-author__info-->
                                    </div>
                                    <!-- end .author-area -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.container -->
            </div>
            <!-- end  -->
        </div>
    @endauth


    {{ $slot }}

    <footer class="footer-area footer--light rtl">
        <div class="mini-footer rtl">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>&copy; 2022
                                طراحی شده توسط
                                <a href="https://github.com/p-e-j-m-a-n">آقای منتظری </a>
                            </p>
                        </div>

                        <div class="go_top">
                            <span class="icon-arrow-up"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="/assets/js/plugins.min.js"></script>
    <script src="/assets/js/script.min.js"></script>
    @livewireScripts
</body>

</html>
