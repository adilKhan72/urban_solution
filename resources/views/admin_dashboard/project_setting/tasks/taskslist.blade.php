@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Task Lists</h3>
              
              <div class="card-tools">
              <button type="button" id="create_tasklist" class="btn btn-dark " data-toggle="modal" data-target="#createtaskmodal">Add Task List</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="tasktable" class="table table-bordered table-hover">
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

@include('admin_dashboard.project_setting.tasks.createtaskmodal')
@include('admin_dashboard.project_setting.tasks.deletetaskmodal')
@include('admin_dashboard.project_setting.tasks.edittaskmodal')
@endsection
  
@section('javascript')
<script>
//alert("javascript form dashboard_principal");
</script>
@endsection
@section('jquery')
<script>
$(document).ready(function(){
  var  datatbl_task = $('#tasktable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.tasks.fetchtaskdatatable")}}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'discription', name: 'discription' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                        ]
                      });    

                      bsCustomFileInput.init();
    $('#createtaskform').on('submit',function(event){
        $('.ajax_input_createtaskform').removeClass("is-invalid");
        $('.ajax_errors_createtaskform').empty(); 
        $('.label_for_input_createtaskform').empty();
        files = new FormData(this);
        //files.append('form','createtaskform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.tasks.taskstore")}}',
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

            $('.label_success_createtaskform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createtaskform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_task.draw();
                  $('#createtaskmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createtaskform').append(response.msg);
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
          url: '{{URL::route("admindashboard.projectsetting.tasks.taskdelete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

              datatbl_task.draw();
                $('#deletetaskmodal').modal('hide');

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

      $('#edittaskform').on('submit',function(event){
        $('.ajax_input_edit_edittaskform').removeClass("is-invalid");
        $('.ajax_errors_edit_edittaskform').empty(); 
        $('.label_for_input_edittaskform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.tasks.taskedit")}}',
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

            $('.label_success_edittaskform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_edittaskform').append(response.msg);
          
            setTimeout(
                function() 
                {
                  datatbl_task.draw();
                $('#edittaskmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_edittaskform').append(response.msg);
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
