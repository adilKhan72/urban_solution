<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
@include('includes.header')
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
@include('includes.sidebar')
  </aside>
 <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          @php
            $user_role = Auth::user()->roles->pluck('display_name');
          @endphp

          @if ($user_role->contains('assistants'))
            <h1 class="m-0 text-dark">Assistant Dashboard</h1>
          @elseif ($user_role->contains('principals'))
            <h1 class="m-0 text-dark">Principal Dashboard</h1>
          @elseif ($user_role->contains('admin'))
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          @endif

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right">
            {!! Breadcrumbs::render('home') !!}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  @yield('content')
  </div>

<footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="{{ url('/') }}">{{ config('app.name') }} (Pvt.) Ltd</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ config('app.version', '1.0.0') }}
    </div>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
</div> <!-- class="wrapper" -->

<script>
//alert("from javascript app");
</script>
@yield('javascript')

@include('includes.footer')

<script>
$(document).ready(function(){
//alert("jquery form layout/app");
});
</script>

@if(Session::has('cant_access_direct'))
  <script type="text/javascript">
  $(document).ready(function(){

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    
      Toast.fire({
        type: 'error',
        title: '{{Session::get('cant_access_direct')}}'
      })
  });
 
 </script>
 @endif

@yield('jquery')

</body>
</html>
