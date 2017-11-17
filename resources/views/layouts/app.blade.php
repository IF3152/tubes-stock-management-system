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
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- This makes the current user's id available in javascript -->
    @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif

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
                        <!-- // add this dropdown // -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="lnr lnr-alarm"></i>
                                    
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                                    <li class="dropdown-header">No notifications</li>
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
                        <li><a href="{{route('pemesanan.index')}}" class="@yield('statistic_act')"><i class="lnr lnr-chart-bars"></i> <span>Pemesanan</span></a></li>
                        <li><a href="{{route('adminpage')}}" class="@yield('statistic_act')"><i class="lnr lnr-chart-bars"></i> <span>Administrasi</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <div class="main-content" id="app">
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
    
    
    <script src="/js/app.js"></script>
    <script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/alertify/alertify.min.js') }}"></script>
    <script src="{{ asset('scripts/klorofil-common.js') }}"></script>
    @yield('page-script')
</body>
</html>
