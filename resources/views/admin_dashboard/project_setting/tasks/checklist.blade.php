@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Check Lists</h3>
              
              <div class="card-tools">
              <button type="button" id="create_checklist" class="btn btn-dark " data-toggle="modal" data-target="#createchecklistmodal">Add Check List</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="checklisttable" class="table table-bordered table-hover">
                <thead>
                <tr>
                     <th>Name</th>
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

@include('admin_dashboard.project_setting.tasks.createchecklistmodal')
@include('admin_dashboard.project_setting.tasks.deletechecklistmodal')
@include('admin_dashboard.project_setting.tasks.editchecklistmodal')
@endsection
  
@section('javascript')
<script>
//alert("javascript form dashboard_principal");
</script>
@endsection
@section('jquery')
<script>
$(document).ready(function(){
   var  datatbl_checklist = $('#checklisttable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.tasks.fetchchecklistdatatable")}}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'discription', name: 'discription' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                        ]
  });

  bsCustomFileInput.init();
    $('#createchecklistform').on('submit',function(event){
        $('.ajax_input_createchecklistform').removeClass("is-invalid");
        $('.ajax_errors_createchecklistform').empty(); 
        $('.label_for_input_createchecklistform').empty();
        files = new FormData(this);
        //files.append('form','createchecklistform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.tasks.checkliststore")}}',
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

            $('.label_success_createchecklistform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createchecklistform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_checklist.draw();
                  $('#createchecklistmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createchecklistform').append(response.msg);
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
          url: '{{URL::route("admindashboard.projectsetting.tasks.checklistdelete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

              datatbl_checklist.draw();
                $('#deletechecklistmodal').modal('hide');

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


      $('#editchecklistform').on('submit',function(event){
        $('.ajax_input_edit_editchecklistform').removeClass("is-invalid");
        $('.ajax_errors_edit_editchecklistform').empty(); 
        $('.label_for_input_editchecklistform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.tasks.checklistedit")}}',
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

            $('.label_success_editchecklistform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editchecklistform').append(response.msg);
          
            setTimeout(
                function() 
                {
                  datatbl_checklist.draw();
                $('#editchecklistmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editchecklistform').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {
              $.each(jqXHR.responseJSON.errors, function (key, value)
              { 
                var errorid = "#"+key+"_error_edit";
                var id = "#"+key;
                var labelid = "#"+key+"_label_edit";
                $(id).addClass("is-invalid");
                $(errorid).append(value);
                $(labelid).append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
              });
            }
        }
         });
    });

});
</script>
@endsection
