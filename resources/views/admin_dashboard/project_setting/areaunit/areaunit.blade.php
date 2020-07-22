<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Area Units</h3>
              
              <div class="card-tools">
              <button type="button" id="create_areaunit" class="btn btn-dark " data-toggle="modal" data-target="#createareaunitmodal">Add Unit</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="areaunittable" class="table table-bordered table-hover">
                <thead>
                <tr>
                     <th>unit_type</th>
                     <th>area_in_feet</th>
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


@include('admin_dashboard.project_setting.areaunit.deleteareaunitmodal')
@include('admin_dashboard.project_setting.areaunit.editareaunitmodalmodal')
@include('admin_dashboard.project_setting.areaunit.createareaunitmodal')
@section('jquery')
@parent
<script>
  $(document).ready(function(){

    var  datatbl = $('#areaunittable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.areaunits.index")}}',
               columns: [
                        { data: 'unit_type', name: 'unit_type' },
                        { data: 'area_in_feet', name: 'area_in_feet' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });

    bsCustomFileInput.init();
    $('#createareaunitform').on('submit',function(event){
        $('.ajax_input_createareaunitform').removeClass("is-invalid");
        $('.ajax_errors_createareaunitform').empty(); 
        $('.label_for_input_createareaunitform').empty();
        files = new FormData(this);
        //files.append('form','createareaunitform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.areaunits.store")}}',
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

            $('.label_success_createareaunitform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createareaunitform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl.draw();
                  $('#createareaunitmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createareaunitform').append(response.msg);
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

    $('#editareaunitform').on('submit',function(event){
        $('.ajax_input_edit_editareaunitform').removeClass("is-invalid");
        $('.ajax_errors_edit_editareaunitform').empty(); 
        $('.label_for_input_editareaunitform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.areaunits.edit")}}',
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

            $('.label_success_editareaunitform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editareaunitform').append(response.msg);
          
            setTimeout(
                function() 
                {
                datatbl.draw();
                $('#editareaunitmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editareaunitform').append(response.msg);
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
          url: '{{URL::route("admindashboard.projectsetting.areaunits.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

                datatbl.draw();
                $('#deleteareaunitmodal').modal('hide');

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