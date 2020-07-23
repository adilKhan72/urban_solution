@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Requirements Types</h3>
              
              <div class="card-tools">
              <button type="button" id="create_requirementtype" class="btn btn-dark " data-toggle="modal" data-target="#createrequirementtypemodal">Add Requirements Type</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="requirementstype" class="table table-bordered table-hover">
                <thead>
                <tr>
                     <th>Type</th>
                     <th>Discription</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
@include('admin_dashboard.project_setting.requirements.createrequirementtypemodal')
@include('admin_dashboard.project_setting.requirements.deleterequirementtypemodal')
@endsection
  
@section('javascript')
<script>
//alert("javascript form dashboard_principal");
</script>
@endsection
@section('jquery')
<script>
$(document).ready(function(){
  var  datatbl_requirementstype = $('#requirementstype').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.requirements.fetchreqtypedatatable")}}',
               columns: [
                        { data: 'type', name: 'type' },
                        { data: 'discription', name: 'discription' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });

    bsCustomFileInput.init();
    $('#createrequirementtypeform').on('submit',function(event){
        $('.ajax_input_createrequirementtypeform').removeClass("is-invalid");
        $('.ajax_errors_createrequirementtypeform').empty(); 
        $('.label_for_input_createrequirementtypeform').empty();
        files = new FormData(this);
        //files.append('form','createrequirementtypeform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.requirements.requirementtypestore")}}',
          type:"POST",
          dataType: "JSON",
          cache: false,
          contentType: false,
          processData: false,
          data:files,
          success:function(response){
              if(response.status == true){

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

            $('.label_success_createrequirementtypeform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createrequirementtypeform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_requirementstype.draw();
                  $('#createrequirementtypemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createrequirementtypeform').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {
              $.each(jqXHR.responseJSON.errors, function (key, value)
              { 
                var errorid = "#"+key+"_error";
                var id = "#"+key;
                var labelid = "#"+key+"_label";
                $(id).addClass("is-invalid");
                $(errorid).append(value);
                $(labelid).append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
              });
            }
        }
         });
    });

    $('.delete_button_id').click(function() {
        value = $(this).attr("id");
        //alert(value);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.requirements.requirementtypedelete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

              datatbl_requirementstype.draw();
                $('#deleterequirementtypemodal').modal('hide');

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
