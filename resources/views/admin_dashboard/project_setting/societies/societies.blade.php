<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Societies</h3>
              
              <div class="card-tools">
              <button type="button" id="create_societie" class="btn btn-dark " data-toggle="modal" data-target="#createsocietiemodal">Add Society</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="societietable" class="table table-bordered table-hover">
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


@include('admin_dashboard.project_setting.societies.deletesocietiemodal')
@include('admin_dashboard.project_setting.societies.editsocietiemodalmodal')
@include('admin_dashboard.project_setting.societies.createsocietiemodal')
@section('jquery')
@parent
<script>
  $(document).ready(function(){

    var  datatbl_society = $('#societietable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.societies.index")}}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });

    bsCustomFileInput.init();
    $('#createsocietieform').on('submit',function(event){
        $('.ajax_input_createsocietieform').removeClass("is-invalid");
        $('.ajax_errors_createsocietieform').empty(); 
        $('.label_for_input_createsocietieform').empty();
        files = new FormData(this);
        //files.append('form','createsocietieform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.societies.store")}}',
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

            $('.label_success_createsocietieform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createsocietieform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_society.draw();
                  $('#createsocietiemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createsocietieform').append(response.msg);
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

    $('#editsocietieform').on('submit',function(event){
        $('.ajax_input_edit_editsocietieform').removeClass("is-invalid");
        $('.ajax_errors_edit_editsocietieform').empty(); 
        $('.label_for_input_editsocietieform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.societies.edit")}}',
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

            $('.label_success_editsocietieform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editsocietieform').append(response.msg);
          
            setTimeout(
                function() 
                {
                datatbl_society.draw();
                $('#editsocietiemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editsocietieform').append(response.msg);
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
          url: '{{URL::route("admindashboard.projectsetting.societies.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

                datatbl_society.draw();
                $('#deletesocietiemodal').modal('hide');

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

