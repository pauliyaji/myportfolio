@include('layouts/partials/header')
<body class="sb-nav-fixed">
@include('layouts/partials/topnav')
<div id="layoutSidenav">
    @include('layouts/partials/sidebar')
    @yield('content')



@include('layouts/partials/footer')

