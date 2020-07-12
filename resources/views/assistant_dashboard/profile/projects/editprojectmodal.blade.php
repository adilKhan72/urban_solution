<!-- Modal -->
<div class="modal fade" id="editprojectmodal" tabindex="-1" role="dialog" aria-labelledby="editprojectmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Project details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        

      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editprojectform" name="editprojectform"   role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">  <span class="label_for_input label_success_editprojectform" id="project_name_label_edit"></span> Enter Project Name</label>
    <input type="text" class="form-control ajax_input_edit" name="project_name" id="project_name_edit"  placeholder="Enter Project Name">
    <span class="text-danger ajax_errors_edit" id="project_name_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editprojectform" id="client_name_label_edit"></span> Enter Client Name</label>
    <input type="text" class="form-control ajax_input_edit" name="client_name" id="client_name_edit"  placeholder="Enter Client Name">
    <span class="text-danger ajax_errors_edit" id="client_name_error_edit"> </span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editprojectform" id="started_label_edit"></span> Project Started At</label>
  <input name="started" type="date" id="started_edit" class="form-control ajax_input_edit" placeholder="Enter Project Started Date">
  <span class="text-danger ajax_errors_edit" id="started_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editprojectform" id="ended_label_edit"></span> Project Ended At</label>
  <input name="ended" type="date" id="ended_edit" class="form-control ajax_input_edit" placeholder="Enter Project Ended Date">
  <span class="text-danger ajax_errors_edit" id="ended_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editprojectform" id="description_label_edit"></span> Project Discription</label>
  <textarea name="description" id="description_edit" class="form-control ajax_input_edit"  rows="3" placeholder="Enter project discription..."></textarea>
  <span class="text-danger ajax_errors_edit" id="description_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editprojectform" id="address_label_edit"></span> Project Address</label>
  <textarea name="address" id="address_edit" class="form-control ajax_input_edit" rows="4"    placeholder="Enter Project Address in the same order &#10; { Seperated with Comas, and type (underscore _ ) istead of space. } &#10; do not exceed 5 words of address every word seperated with coma &#10; e.g(House/Muhallah,Village/Town,City,Teh,Distt)"></textarea>
  <span class="text-danger ajax_errors_edit" id="address_error_edit"> </span>
  </div>

  <input type="hidden" id="hiddenidproject" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit" id="error_editprojectform"> </span>
        <span class="text-success ajax_errors_edit" id="success_editprojectform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editprojectmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var project_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("assistantdashboard.profile.projects.fetch")}}',
          type:"POST",
          data:{
            project_id:project_id,
          },
          success:function(response){
            if(response.status == true){
                $('#hiddenidproject').val(response.data.id);
                $('#project_name_edit').val(response.data.project_name);
                $('#client_name_edit').val(response.data.client_name);
                $('#started_edit').val(response.data.started);
                $('#ended_edit').val(response.data.ended);
                $('#description_edit').val(response.data.description);
                $('#address_edit').val(response.data.address);
            }
          }
         });
    });

    bsCustomFileInput.init();
    $('#editprojectform').on('submit',function(event){
        $('.ajax_input_edit').removeClass("is-invalid");
        $('.ajax_errors_edit').empty(); 
        $('.label_for_input').empty();
        var hiddenidproject = $('#hiddenidproject').val();
        var project_name = $('#project_name_edit').val();
        var client_name = $('#client_name_edit').val();
        var started = $('#started_edit').val();
        var ended = $('#ended_edit').val();
        var description = $('#description_edit').val();
        var address = $('#address_edit').val();
        $.ajax({
          url: '{{URL::route("assistantdashboard.profile.projects.edit")}}',
          type:"POST",
          data:{
            form:'editprojectform',
            project_id:hiddenidproject,
            project_name:project_name,
            client_name:client_name,
            started:started,
            ended:ended,
            description:description,
            address:address,
          },
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

            $('.label_success_editprojectform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editprojectform').append(response.msg);
          
            setTimeout(
                function() 
                {
                location.reload(); 
                }, 3000);
           }else{
            $('#error_editprojectform').append(response.msg);
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