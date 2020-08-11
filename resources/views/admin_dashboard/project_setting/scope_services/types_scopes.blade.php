@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       

      <div class="row">
     <div class="col-md-12 col-xl-12">
       @include('admin_dashboard.project_setting.scope_services.scopes.index')
       </div>
      </div>

      </div>
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
$(document).ready(function(){
//alert(" jquery form dashboard_principal");
});
</script>
@endsection
