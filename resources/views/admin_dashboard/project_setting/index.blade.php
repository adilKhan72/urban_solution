@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
            

    <div class="row">
     <div class="col-md-12 col-lg-6">
       @include('admin_dashboard.project_setting.clients.clients')
       </div>
     <div class="col-md-12 col-lg-6">
       @include('admin_dashboard.project_setting.mouzas.mouzas')
       </div>
       </div>
       <div class="row">
     <div class="col-md-12 col-lg-6">
       @include('admin_dashboard.project_setting.societies.societies')
     </div>
     <div class="col-md-12 col-lg-6">
       @include('admin_dashboard.project_setting.zones.zones')
       </div>
       </div>
       <div class="row">
       <div class="col-md-12 col-lg-6">
       @include('admin_dashboard.project_setting.areaunit.areaunit')
       </div>
     </div>


     </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('javascript')
<script>
//alert("javascript form dashboard_principal");
</script>
@endsection
@section('jquery')
<script>

</script>
@endsection
