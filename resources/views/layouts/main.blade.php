<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
{{-- <html lang="en"> --}}
{{-- @langrtl --}}
    {{-- <html lang="{{ app()->getLocale() }}" dir="rtl"> --}}
{{-- @else --}}
    <html lang="{{ app()->getLocale() }}">
{{-- @endlangrtl --}}
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  @stack('before-styles')

  <!-- Icons -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Styles required by this views -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">  

   @stack('after-styles')
</head>
<!-- BODY options, add following classes to body to change options
'.header-fixed' - Fixed Header
'.brand-minimized' - Minimized brand (Only symbol)
'.sidebar-fixed' - Fixed Sidebar
'.sidebar-hidden' - Hidden Sidebar
'.sidebar-off-canvas' - Off Canvas Sidebar
'.sidebar-minimized'- Minimized Sidebar (Only icons)
'.sidebar-compact'    - Compact Sidebar
'.aside-menu-fixed' - Fixed Aside Menu
'.aside-menu-hidden'- Hidden Aside Menu
'.aside-menu-off-canvas' - Off Canvas Aside Menu
'.breadcrumb-fixed'- Fixed Breadcrumb
'.footer-fixed'- Fixed footer
-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  {{-- @include('includes.navbar') --}}
  
  <div class="app-body">
    {{-- @include('includes.sidebar') --}}
    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      {{-- @include('includes.breadcrumb') --}}
      {{-- {!! Breadcrumbs::render() !!} --}}

      <div class="container">

        <div class="row">
           <div class="col-md-12">
            @include('includes.partials.messages')
           </div>
        </div>


      @yield('content')
      <!-- /.container-fluid -->

      </div>
      
    </main>
    
    {{-- @include('includes.asidemenu')  --}}

  </div>

   {{-- @include('includes.footer') --}}

  @include('includes.scripts')
  @yield('myscript')

</body>
</html>