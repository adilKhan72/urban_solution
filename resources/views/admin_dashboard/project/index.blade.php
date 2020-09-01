@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            
      <div class="card card-default">

<div class="card-header">
  <h3 class="card-title">Projects List</h3>
  <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
     
  </div>
</div>

<div class="card-body">
<table id="projecttable" class="table table-bordered table-hover">
    <thead>
    <tr>
         <th>basic</th>
         <th>details</th>
         <th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

</div> 

      </div>
    </section>
    <!-- /.content -->

@include('admin_dashboard.project.deleteprojectmodal')

@endsection
  
@section('javascript')
<script>
//alert("javascript form dashboard_principal");
</script>
@endsection
@section('jquery')
<script>
$(document).ready(function(){

  var  datatbl_projects = $('#projecttable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projecttab.getdatatable")}}',
               columns: [
                        { data: 'basic', name: 'basic' },
                        { data: 'details', name: 'details' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });

    $('.delete_button_id').click(function() {
        value = $(this).attr("id");
        //alert(value);
        $.ajax({
          url: '{{URL::route("admindashboard.projecttab.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

                datatbl_projects.draw();
                $('#deleteprojectmodal').modal('hide');

                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
               });
              Toast.fire({
                type: 'success',
                title: response.msg
              });

            }
          }
         });

      });

});
</script>
@endsection
