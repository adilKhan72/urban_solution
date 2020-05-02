<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@php
$user_role = Auth::user()->roles->pluck('display_name');
@endphp
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
    @if ($user_role->contains('assistants'))
      @include('includes.sidebars.assistant_sidebar')
    @elseif ($user_role->contains('principals'))
      @include('includes.sidebars.principal_sidebar')
    @elseif ($user_role->contains('admin'))
      @include('includes.sidebars.admin_sidebar')
    @endif  
</aside>
 <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

        <h1 class="m-0 text-dark" style="text-transform: capitalize;" >{{ request()->segment(count(request()->segments())) }}</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right">
            {!! Breadcrumbs::render(request()->segment(count(request()->segments()))) !!}
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
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
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
