@extends('admin.layouts.app')
@section('title', __('Admin / artcam'))
@section('admin_content')
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="" class="text-center"><img class="sidebar-img" src="/images/logo.png" alt=""></a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header text-center">
        <div class="user-info">
          <span class="user-name">
            <strong>{{ Auth::guard('admin')->user()->name }}</strong>
          </span>
          <span class="user-role">{{ Auth::guard('admin')->user()->email }}</span>
          <div class="internet-availablity text-danger"></div>
        </div>
      </div>
      <!-- sidebar-header  -->
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="">
            <a href="" class="click-without-refresh">
              {{-- <i class="fa fa-tachometer-alt"></i> --}}
              <span>DASHBOARD</span>
              {{-- <span class="badge badge-pill badge-warning">New</span> --}}
            </a>
          </li>
          {{-- <li class="sidebar-dropdown">
            <a href="">
              <span>ORDERS</span>
              <span class="badge badge-pill badge-danger">2</span>
            </a>
          </li> --}}
          <li class="sidebar-dropdown">
            <a href="#">
              {{-- <i class="fas fa-box"></i> --}}
              <span>CATALOG</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  {{-- <a href="{{ route('admin.product.grid',array('session_id'=>session()->getId())) }}">Products</a> --}}
                  <a href="">Products</a>
                </li>
                <li>
                  <a href="#">Categories</a>
                </li>
              </ul>
            </div>
          </li>
          {{-- <li class="sidebar-dropdown">
            <a href="#">
              <span>CUSTOMERS</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="">All Customers</a>
                </li>
              </ul>
            </div>
          </li> --}}
          <li class="header-menu">
            <span>System</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              {{-- <i class="fas fa-sliders-h"></i> --}}
              <span>CONFIGURATION</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Config</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              {{-- <i class="fas fa-cog"></i> --}}
              <span>SYSTEM</span>
              {{-- <span class="badge badge-pill badge-primary">Beta</span> --}}
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li class="header-menu">
                  <span>Admin Users</span>
                </li>
                <li>
                  <a href="{{ route('admin.user.grid',array('session_id'=>session()->getId())) }}">All Users</a>
                </li>
                <li class="header-menu">
                  <span>Cash</span>
                </li>
                <li>
                  <a href="#">Cash Management</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off"></i>
      </a>
      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="admin page-content">
    <div class="container" style="max-width: 1620px;">
    	{{-- @include('admin.dashboard.dashboard') --}}
      @if(Route::currentRouteName() == 'admin.home')
      @include('admin.dashboard.dashboard')
      @else
      @yield('content')
      @endif
    </div>
    <!-- page-content" -->
    <footer class="text-center" style="margin-top: 40px;">
      <div class="mb-2">
        <small>
         {{ __('Copyright') }} © {{date("Y")}} {{ __('Md.Moniruzzaman. All Rights Reserved.') }}
       </small>
     </div>
   </footer>
 </main>
</div>
<!-- page-wrapper -->
@endsection