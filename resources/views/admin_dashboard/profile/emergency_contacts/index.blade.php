@extends('layouts.dashboards.app')
@section('content')
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-header">
            <button type="button" id="emergency_contact" class="btn btn-dark float-right" data-toggle="modal" data-target="#createemergency_contactmodal">Add New Emergency Contacts</button>
              <h3 class="card-title">List of Emergency Contacts</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                      <th>name</th>
                     <th>relation</th>
                     <th>phone</th>
                     <th>Created_at</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                     <th>name</th>
                     <th>relation</th>
                     <th>phone</th>
                     <th>Created_at</th>
                     <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @include('admin_dashboard.profile.emergency_contacts.createemergency_contactsmodal')
    @include('admin_dashboard.profile.emergency_contacts.editemergency_contactsmodal')
    @include('admin_dashboard.profile.emergency_contacts.deleteemergency_contactsmodal')
    @endsection
  
  @section('javascript')
  <script>
  //alert("javascript form dashboard_principal");
  </script>
  @endsection
  @section('jquery')
  <script>
  $(document).ready(function(){

  var  datatbl = $('#example2').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.profile.emergency_contacts.getdatatable")}}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'relation', name: 'relation' },
                        { data: 'phone', name: 'phone' },
                        { data: 'created_at', name: 'created_at',searchable: false },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });

    bsCustomFileInput.init();
    $('#createemergency_contactform').on('submit',function(event){
        $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();
        files = new FormData(this);
        //files.append('form','createskillform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.profile.emergency_contacts.store")}}',
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

            $('.label_success_editemergency_contactform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createemergency_contactform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl.draw();
                  $('#createemergency_contactmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createemergency_contactform').append(response.msg);
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

    $('#editemergency_contactform').on('submit',function(event){
        $('.ajax_input_edit').removeClass("is-invalid");
        $('.ajax_errors_edit').empty(); 
        $('.label_for_input').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.profile.emergency_contacts.edit")}}',
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

            $('.label_success_editemergency_contactform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editemergency_contactform').append(response.msg);
          
            setTimeout(
                function() 
                {
                datatbl.draw();
                $('#editemergency_contactmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editemergency_contactform').append(response.msg);
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


    $('.delete_button_id').click(function() {
        value = $(this).attr("id");
        //alert(value);
        $.ajax({
          url: '{{URL::route("admindashboard.profile.emergency_contacts.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

                datatbl.draw();
                $('#deleteemergency_contactmodal').modal('hide');

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