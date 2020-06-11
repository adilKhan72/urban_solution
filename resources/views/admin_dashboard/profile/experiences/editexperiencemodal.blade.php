<!-- Modal -->
<div class="modal fade" id="editexperiencemodal" tabindex="-1" role="dialog" aria-labelledby="editexperiencemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit experience details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        

      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editexperienceform" name="editexperienceform" enctype=multipart/form-data role="form">

  <div class="form-group">

    <label for="exampleInputEmail1">  <span class="label_for_input label_success_editexperienceform" id="organisation_label_edit"></span> Enter Organisation Name </label>

    <input type="text" class="form-control ajax_input_edit" name="organisation" id="organisation_edit"  placeholder="Enter Organisation Name">

    <span class="text-danger ajax_errors_edit" id="organisation_error_edit"> </span>

  </div>

  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editexperienceform" id="designation_label_edit"></span> Enter Designation Name </label>

    <input type="text" class="form-control ajax_input_edit" name="designation" id="designation_edit"  placeholder="Enter Designation Name">

    <span class="text-danger ajax_errors_edit" id="designation_error_edit"> </span>

  </div>


  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editexperienceform" id="description_edit_label"></span> Experience Discription</label>
    
    <textarea class="form-control ajax_input_edit" name="description" rows="3" id="description_edit"  placeholder="Enter experience discription..."></textarea>
    
    <span class="text-danger ajax_errors_edit" id="description_error_edit"> </span>
    
  </div>



  <div class="form-group">
  <label for="exampleInputEmail1"> <span class="label_for_input label_success_editexperienceform" id="experience_letter_scan_label_edit"></span> Choose Experience</label>
  <div class="custom-file">

    <input name="experience_letter_scan" type="file" class="custom-file-input ajax_input_edit" id="experience_letter_scan_edit">

    <label class="custom-file-label experience_letter_scan_clear" for="exampleInputFile" id="experience_letter_scan_edit_label_2"></label>
  </div>
  <span class="text-danger ajax_errors_edit" id="experience_letter_scan_error_edit"> </span>
</div>


  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editexperienceform" id="from_date_label_edit"></span> Enter From_Date</label>

  <input name="from_date" type="date" id="from_date_edit" class="form-control ajax_input_edit" placeholder="Enter from_date">

  <span class="text-danger ajax_errors_edit" id="from_date_error_edit"> </span>

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editexperienceform" id="to_date_label_edit"></span>Enter to_date</label>
  <input name="to_date" type="date" id="to_date_edit" class="form-control ajax_input_edit" placeholder="Enter experience Ended Date">
  <span class="text-danger ajax_errors_edit" id="to_date_error_edit"> </span>
  </div>



  <input type="hidden" id="hiddenidexperienceedit" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit" id="error_editexperienceform"> </span>
        <span class="text-success ajax_errors_edit" id="success_editexperienceform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editexperiencemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var experience_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.profile.experiences.fetch")}}',
          type:"POST",
          data:{
            experience_id:experience_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                //$('#select_educational_degree2_ineroption').val(response.data.educationaldegree.id);
                $('#experience_letter_scan_edit_label_2').html('Replace '+response.data.experience_letter_scan);
                $('#organisation_edit').val(response.data.organisation);
                $('#designation_edit').val(response.data.designation);
                $('#from_date_edit').val(response.data.from_date);
                $('#to_date_edit').val(response.data.to_date);
                $('#description_edit').val(response.data.description);
                $('#hiddenidexperienceedit').val(response.data.id);
            }
          }
         });
    });

    bsCustomFileInput.init();
    $('#editexperienceform').on('submit',function(event){
        $('.ajax_input_edit').removeClass("is-invalid");
        $('.ajax_errors_edit').empty(); 
        $('.label_for_input').empty();

        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.profile.experiences.edit")}}',
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

            $('.label_success_editexperienceform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editexperienceform').append(response.msg);
          
            setTimeout(
                function() 
                {
                location.reload(); 
                }, 1000);
           }else{
            $('#error_editexperienceform').append(response.msg);
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