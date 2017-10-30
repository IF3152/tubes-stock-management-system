<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

<!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/alertify/css/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    @yield('page-css')

</head>
<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <b><a href="/">{{ config('app.name', 'Laravel') }}</a></b>
            </div>

            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                    </div>
                </form>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                                <li><a href="#" class="more">Clear Notification</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Basic Use</a></li>
                                <li><a href="#">Working With Data</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Troubleshooting</a></li>
                            </ul>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="lnr lnr-exit"></i>Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="#" class="@yield('statistic_act')"><i class="lnr lnr-chart-bars"></i> <span>Statistic</span></a></li>
                        
                        <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed @yield('manajemen_act')"><i class="lnr lnr-file-empty"></i> <span>Barang</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse">
                                <ul class="nav">
                                    <li><a href="{{route('barang.index')}}">Semua Barang</a></li>
                                    <li><a href="{{route('kategori.index')}}">Kategori</a></li>
                                    <li><a href="{{route('merek.index')}}">Merek</a></li>
                                    <li><a href="{{route('supplier.index')}}">Supplier</a></li>
                                    
                                </ul>
                            </div>
                        </li>

                        <li><a href="{{route('cabang.index')}}" class="@yield('statistic_act')"><i class="lnr lnr-chart-bars"></i> <span>Cabang</span></a></li>
                        <li><a href="#" class="@yield('statistic_act')"><i class="lnr lnr-chart-bars"></i> <span>Pemesanan</span></a></li>
                        <li><a href="#" class="@yield('statistic_act')"><i class="lnr lnr-chart-bars"></i> <span>Pengaturan</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <div class="main-content">
                @yield('content')
            </div>
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <hr/>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2017 Kelompok 6 IF3152 Tahun 2017 | Theme by <a href="https://www.themeineed.com" target="_blank"> Theme I Need</a>. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/alertify/alertify.min.js') }}"></script>
    <script src="{{ asset('scripts/klorofil-common.js') }}"></script>
    @yield('page-script')
</body>
</html>
