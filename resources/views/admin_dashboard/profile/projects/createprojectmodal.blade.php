<!-- Modal -->
<div class="modal fade" id="createprojectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        

      <form action="javascript:;" autocomplete="off"  method="post" class="" id="createprojectform" name="createprojectform"   role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">  <span class="label_for_input label_success_createprojectform" id="project_name_label"></span> Enter Project Name</label>
    <input type="text" class="form-control ajax_input" name="project_name" id="project_name"  placeholder="Enter Project Name">
    <span class="text-danger ajax_errors" id="project_name_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createprojectform" id="client_name_label"></span> Enter Client Name</label>
    <input type="text" class="form-control ajax_input" name="client_name" id="client_name"  placeholder="Enter Client Name">
    <span class="text-danger ajax_errors" id="client_name_error"> </span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createprojectform" id="started_label"></span> Project Started At</label>
  <input name="started" type="date" id="started" class="form-control ajax_input" placeholder="Enter Project Started Date">
  <span class="text-danger ajax_errors" id="started_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createprojectform" id="ended_label"></span> Project Ended At</label>
  <input name="ended" type="date" id="ended" class="form-control ajax_input" placeholder="Enter Project Ended Date">
  <span class="text-danger ajax_errors" id="ended_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createprojectform" id="description_label"></span> Project Discription</label>
  <textarea name="description" id="description" class="form-control ajax_input"  rows="3" placeholder="Enter project discription..."></textarea>
  <span class="text-danger ajax_errors" id="description_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createprojectform" id="address_label"></span> Project Address</label>
  <textarea name="address" id="address" class="form-control ajax_input" rows="4"    placeholder="Enter Project Address in the same order &#10; { Seperated with Comas, and type (underscore _ ) istead of space. } &#10; do not exceed 5 words of address every word seperated with coma &#10; e.g(House/Muhallah,Village/Town,City,Teh,Distt)"></textarea>
  <span class="text-danger ajax_errors" id="address_error"> </span>
  </div>


      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors" id="error_createprojectform"> </span>
        <span class="text-success ajax_errors" id="success_createprojectform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    bsCustomFileInput.init();
    $('#createprojectform').on('submit',function(event){
        $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();
        var project_name = $('#project_name').val();
        var client_name = $('#client_name').val();
        var started = $('#started').val();
        var ended = $('#ended').val();
        var description = $('#description').val();
        var address = $('#address').val();
        $.ajax({
          url: '{{URL::route("profile.projects.store")}}',
          type:"POST",
          data:{
            form:'createprojectform',
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

            $('.label_success_createprojectform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createprojectform').append(response.msg);
            

            setTimeout(
                function() 
                {
                location.reload(); 
                }, 3000);


           }else{
            $('#error_createprojectform').append(response.msg);
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
    });
</script>
@endsection