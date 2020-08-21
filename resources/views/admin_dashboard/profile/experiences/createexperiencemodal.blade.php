<!-- Modal -->
<div class="modal fade" id="createexperiencemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Add experience</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createexperienceform" name="createexperienceform" role="form">
  
  <div class="form-group">
    <label for="exampleInputEmail1">  <span class="label_for_input label_success_createexperienceform" id="organisation_id_label"></span> Enter Organisation Name</label>
    <input type="text" class="form-control ajax_input" name="organisation" id="organisation"  placeholder="Enter Organisation Name">
    <span class="text-danger ajax_errors" id="organisation_id_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createexperienceform" id="designation_label"></span> Enter Designation Name</label>
    <input type="text" class="form-control ajax_input" name="designation" id="designation"  placeholder="Enter Designation Name">
    <span class="text-danger ajax_errors" id="designation_error"> </span>
  </div>









  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createexperienceform" id="description_label"></span> experience Discription</label>
  <textarea name="description" id="description" class="form-control ajax_input"  rows="3" placeholder="Enter experience discription..."></textarea>
  <span class="text-danger ajax_errors" id="description_error"> </span>
  </div>

  <div class="form-group">
  <label for="exampleInputEmail1"> <span class="label_for_input label_success_createexperienceform" id="experience_letter_scan_label"></span> Choose Experience</label>
  <div class="custom-file">

    <input name="experience_letter_scan" type="file" class="custom-file-input ajax_input" id="experience_letter_scan">

    <label class="custom-file-label experience_letter_scan_clear" for="exampleInputFile">Choose Experience</label>
  </div>
  <span class="text-danger ajax_errors" id="experience_letter_scan_error"> </span>
</div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createexperienceform" id="from_date_label"></span> Enter From_Date</label>
  <input name="from_date" type="date" id="from_date" class="form-control ajax_input" placeholder="Enter 
  From_Date">
  <span class="text-danger ajax_errors" id="from_date_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createexperienceform" id="to_date_label"></span> Enter To_Date</label>
  <input name="to_date" type="date" id="to_date" class="form-control ajax_input" placeholder="Enter  To_Date">
  <span class="text-danger ajax_errors" id="to_date_error"> </span>
  </div>




      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors" id="error_createexperienceform"> </span>
        <span class="text-success ajax_errors" id="success_createexperienceform"> </span>
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
    $('#createexperienceform').on('submit',function(event){

        $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();
        files = new FormData(this);

        $.ajax({
          url: '{{URL::route("admindashboard.profile.experiences.store")}}',
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

            $('.label_success_createexperienceform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createexperienceform').append(response.msg);
            

            setTimeout(
                function() 
                {
                location.reload(); 
                }, 1000);


           }else{
            $('#error_createexperienceform').append(response.msg);
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