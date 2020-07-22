<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Mouzas</h3>

              <div class="card-tools">
              <button type="button" id="create_mouza" class="btn btn-dark " data-toggle="modal" data-target="#createmouzamodal">Add Mouza</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="mouzatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                     <th>name</th>
                     <th>area</th>
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

@include('admin_dashboard.project_setting.mouzas.deletemouzamodal')
@include('admin_dashboard.project_setting.mouzas.editmouzamodalmodal')
@include('admin_dashboard.project_setting.mouzas.createmouzamodal')
@section('jquery')
@parent
<script>
  $(document).ready(function(){

    var  datatbl_mouza = $('#mouzatable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.mouzas.index")}}',
               columns: [
                        { data: 'name', name: 'unit_type' },
                        { data: 'area', name: 'area_in_feet' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });

    bsCustomFileInput.init();
    $('#createmouzaform').on('submit',function(event){
        $('.ajax_input_createmouzaform').removeClass("is-invalid");
        $('.ajax_errors_createmouzaform').empty(); 
        $('.label_for_input_createmouzaform').empty();
        files = new FormData(this);
        //files.append('form','createmouzaform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.mouzas.store")}}',
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

            $('.label_success_createmouzaform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createmouzaform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_mouza.draw();
                  $('#createmouzamodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createmouzaform').append(response.msg);
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

    $('#editmouzaform').on('submit',function(event){
        $('.ajax_input_edit_editmouzaform').removeClass("is-invalid");
        $('.ajax_errors_edit_editmouzaform').empty(); 
        $('.label_for_input_editmouzaform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.mouzas.edit")}}',
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

            $('.label_success_editmouzaform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editmouzaform').append(response.msg);
          
            setTimeout(
                function() 
                {
                datatbl_mouza.draw();
                $('#editmouzamodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editmouzaform').append(response.msg);
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
          url: '{{URL::route("admindashboard.projectsetting.mouzas.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

                datatbl_mouza.draw();
                $('#deletemouzamodal').modal('hide');

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