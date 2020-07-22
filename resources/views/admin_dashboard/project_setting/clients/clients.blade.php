<div class="card card-default">

            <div class="card-header">
              <h3 class="card-title">Clients</h3>
              <div class="card-tools">
              <button type="button" id="create_client" class="btn btn-dark " data-toggle="modal" data-target="#createclientmodal">Add Client</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                 
              </div>
            </div>

            <div class="card-body">
            <table id="clienttable" class="table table-bordered table-hover">
                <thead>
                <tr>
                     <th>phone</th>
                     <th>email</th>
                     <th>designation</th>
                     <th>sec_phone</th>
                     <th>address</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>

          </div> 

@include('admin_dashboard.project_setting.clients.deleteclientmodal')
@include('admin_dashboard.project_setting.clients.editclientmodalmodal')
@include('admin_dashboard.project_setting.clients.createclientmodal')

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    var  datatbl_clients = $('#clienttable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.clients.index")}}',
               columns: [
                        { data: 'phone', name: 'phone' },
                        { data: 'email', name: 'email' },
                        { data: 'designation', name: 'designation' },
                        { data: 'secondary_phone', name: 'secondary_phone' },
                        { data: 'address', name: 'address' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });

    bsCustomFileInput.init();
    $('#createclientform').on('submit',function(event){
        $('.ajax_input_createclientform').removeClass("is-invalid");
        $('.ajax_errors_createclientform').empty(); 
        $('.label_for_input_createclientform').empty();
        files = new FormData(this);
        //files.append('form','createclientform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.clients.store")}}',
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

            $('.label_success_createclientform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createclientform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_clients.draw();
                  $('#createclientmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createclientform').append(response.msg);
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

    $('#editclientform').on('submit',function(event){
        $('.ajax_input_edit_editclientform').removeClass("is-invalid");
        $('.ajax_errors_edit_editclientform').empty(); 
        $('.label_for_input_editclientform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.clients.edit")}}',
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

            $('.label_success_editclientform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editclientform').append(response.msg);
          
            setTimeout(
                function() 
                {
                datatbl_clients.draw();
                $('#editclientmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editclientform').append(response.msg);
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
          url: '{{URL::route("admindashboard.projectsetting.clients.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

                datatbl_clients.draw();
                $('#deleteclientmodal').modal('hide');

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