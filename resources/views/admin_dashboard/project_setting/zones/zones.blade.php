<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Zones</h3>
              
              <div class="card-tools">
              <button type="button" id="create_zone" class="btn btn-dark " data-toggle="modal" data-target="#createzonemodal">Add Zone</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="zonetable" class="table table-bordered table-hover">
                <thead>
                <tr>
                     <th>name</th>
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


@include('admin_dashboard.project_setting.zones.deletezonemodal')
@include('admin_dashboard.project_setting.zones.editzonemodalmodal')
@include('admin_dashboard.project_setting.zones.createzonemodal')
@section('jquery')
@parent
<script>
  $(document).ready(function(){

    var  datatbl_zone = $('#zonetable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.zones.index")}}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });

    bsCustomFileInput.init();
    $('#createzoneform').on('submit',function(event){
        $('.ajax_input_createzoneform').removeClass("is-invalid");
        $('.ajax_errors_createzoneform').empty(); 
        $('.label_for_input_createzoneform').empty();
        files = new FormData(this);
        //files.append('form','createzoneform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.zones.store")}}',
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

            $('.label_success_createzoneform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createzoneform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_zone.draw();
                  $('#createzonemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createzoneform').append(response.msg);
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

    $('#editzoneform').on('submit',function(event){
        $('.ajax_input_edit_editzoneform').removeClass("is-invalid");
        $('.ajax_errors_edit_editzoneform').empty(); 
        $('.label_for_input_editzoneform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.zones.edit")}}',
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

            $('.label_success_editzoneform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editzoneform').append(response.msg);
          
            setTimeout(
                function() 
                {
                datatbl_zone.draw();
                $('#editzonemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editzoneform').append(response.msg);
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
          url: '{{URL::route("admindashboard.projectsetting.zones.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

                datatbl_zone.draw();
                $('#deletezonemodal').modal('hide');

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