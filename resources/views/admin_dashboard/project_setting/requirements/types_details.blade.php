@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
     <div class="col-md-5 col-xl-5">

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
     <div class="col-md-7 col-xl-7">


          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Requirements Sub Fields and Values</h3>
              
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="subfield" class="table table-bordered table-hover">
                <thead>
                <tr>
                     <th>requirement_type</th>
                     <th>filed_name</th>
                     <th>field_value</th>
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
          </div>



      </div>
    </section>
    <!-- /.content -->
@include('admin_dashboard.project_setting.requirements.createrequirementtypemodal')
@include('admin_dashboard.project_setting.requirements.deleterequirementtypemodal')
@include('admin_dashboard.project_setting.requirements.editrequirementtypemodalmodal')


@include('admin_dashboard.project_setting.requirements.createsubfieldmodal')
@include('admin_dashboard.project_setting.requirements.deletesubfieldmodal')
@include('admin_dashboard.project_setting.requirements.editsubfieldmodal')
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


    var  datatbl_subfield = $('#subfield').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.requirements.fetchsubfielddataTable")}}',
               columns: [
                        { data: 'type', name: 'requirement_type'},
                        { data: 'filed_name', name: 'filed_name' },
                        { data: 'field_value', name: 'field_value' },
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






    $('#createsubfieldform').on('submit',function(event){
        $('.ajax_input_createsubfieldform').removeClass("is-invalid");
        $('.ajax_errors_createsubfieldform').empty(); 
        $('.label_for_input_createsubfieldform').empty();
        files = new FormData(this);
        //files.append('form','createsubfieldform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.requirements.subfieldstore")}}',
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

            $('.label_success_createsubfieldform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createsubfieldform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_requirementstype.draw();
                  datatbl_subfield.draw();
                  $('#createsubfieldmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createsubfieldform').append(response.msg);
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
              datatbl_subfield.draw();
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



      $('.delete_button_id_2').click(function() {
        value = $(this).attr("id");
        //alert(value);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.requirements.subfielddelete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

              datatbl_subfield.draw();
                $('#deletesubfieldmodal').modal('hide');

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





      $('#editrequirementtypeform').on('submit',function(event){
        $('.ajax_input_edit_editrequirementtypeform').removeClass("is-invalid");
        $('.ajax_errors_edit_editrequirementtypeform').empty(); 
        $('.label_for_input_editrequirementtypeform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.requirements.requirementtypeedit")}}',
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

            $('.label_success_editrequirementtypeform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editrequirementtypeform').append(response.msg);
          
            setTimeout(
                function() 
                {
                  datatbl_requirementstype.draw();
                  datatbl_subfield.draw();
                $('#editrequirementtypemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editrequirementtypeform').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {
              $.each(jqXHR.responseJSON.errors, function (key, value)
              { 
                var errorid = "#"+key+"_error_edit";
                var id = "#"+key+"_edit";
                var labelid = "#"+key+"_label_edit";
                $(id).addClass("is-invalid");
                $(errorid).append(value);
                $(labelid).append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
              });
            }
        }
         });
    });


    $('#editsubfieldform').on('submit',function(event){
        $('.ajax_input_edit_editsubfieldform').removeClass("is-invalid");
        $('.ajax_errors_edit_editsubfieldform').empty(); 
        $('.label_for_input_editsubfieldform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.requirements.subfieldedit")}}',
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

            $('.label_success_editsubfieldform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editsubfieldform').append(response.msg);
          
            setTimeout(
                function() 
                {
                  datatbl_requirementstype.draw();
                  datatbl_subfield.draw();
                $('#editsubfieldmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editsubfieldform').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {
              $.each(jqXHR.responseJSON.errors, function (key, value)
              { 
                var errorid = "#"+key+"_error_edit";
                var id = "#"+key+"_edit";
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
