<!-- Modal -->
<div class="modal fade" id="editqualificationmodal" tabindex="-1" role="dialog" aria-labelledby="editqualificationmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit qualification details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        

      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editqualificationform" name="editqualificationform" enctype=multipart/form-data role="form">

  <div class="form-group">

    <label for="exampleInputEmail1">  <span class="label_for_input label_success_editqualificationform" id="educational_degree_id_label_edit"></span> Select Degree Type</label>

    <select name="educational_degree_id" class="select2 ajax_input_edit" id="select_educational_degree2" data-placeholder="Select Educational Degree" style="width: 100%;">
    <option value="" id="select_educational_degree2_ineroption"></option>
    </select>

    <span class="text-danger ajax_errors_edit" id="educational_degree_id_error_edit"> </span>

  </div>

  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editqualificationform" id="organisation_label_edit"></span> Enter Organisation Name</label>

    <input type="text" class="form-control ajax_input_edit" name="organisation" id="organisation_edit"  placeholder="Enter organisation name">

    <span class="text-danger ajax_errors_edit" id="organisation_error_edit"> </span>

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editqualificationform" id="title_label_edit"></span> Enter Degree Title</label>
    <input type="text" class="form-control ajax_input_edit" name="title" id="title_edit"  placeholder="Enter  Degree Title">
    <span class="text-danger ajax_errors_edit" id="title_error_edit"> </span>
  </div>



  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editqualificationform" id="marks_label_edit"></span> Enter Marks</label>

    <input type="text" class="form-control ajax_input_edit" name="marks" id="marks_edit"  placeholder="Enter marks">

    <span class="text-danger ajax_errors_edit" id="marks_error_edit"> </span>

  </div>




  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editqualificationform" id="marks_type_label_edit"></span> Marks type</label>

    <select name="marks_type" id="select_marks_type_edit"  class="select2 ajax_input_edit" data-placeholder="Select Marks type" style="width: 100%;">
    <option value="" selected>Select Marks Type</option>
    <option value="gpa">gpa</option>
    <option value="percentage">percentage</option>
    </select>


  <span class="text-danger ajax_errors_edit" id="marks_type_error_edit"> </span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editqualificationform" id="description_label_edit"></span> Qualification Discription</label>
  <textarea name="description" id="description_edit" class="form-control ajax_input_edit"  rows="3" placeholder="Enter qualification discription..."></textarea>
  <span class="text-danger ajax_errors_edit" id="description_error_edit"> </span>
  </div>


  <div class="form-group">
  <label for="exampleInputEmail1"> <span class="label_for_input label_success_editqualificationform" id="transcript_scan_label_edit"></span> Choose Transcript</label>
  <div class="custom-file">

    <input name="transcript_scan" type="file" class="custom-file-input ajax_input_edit" id="transcript_scan_edit">

    <label class="custom-file-label transcript_scan_clear" for="exampleInputFile" id="transcript_scan_edit_label_2"></label>
  </div>
  <span class="text-danger ajax_errors_edit" id="transcript_scan_error_edit"> </span>
</div>


  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editqualificationform" id="from_date_label_edit"></span> Enter From_Date</label>

  <input name="from_date" type="date" id="from_date_edit" class="form-control ajax_input_edit" placeholder="Enter from_date">

  <span class="text-danger ajax_errors_edit" id="from_date_error_edit"> </span>

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editqualificationform" id="to_date_label_edit"></span>Enter to_date</label>
  <input name="to_date" type="date" id="to_date_edit" class="form-control ajax_input_edit" placeholder="Enter qualification Ended Date">
  <span class="text-danger ajax_errors_edit" id="to_date_error_edit"> </span>
  </div>



  <input type="hidden" id="hiddenidqualificationedit" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit" id="error_editqualificationform"> </span>
        <span class="text-success ajax_errors_edit" id="success_editqualificationform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editqualificationmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var qualification_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("principaldashboard.profile.qualitifcations.fetch")}}',
          type:"POST",
          data:{
            qualification_id:qualification_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                //$('#select_educational_degree2_ineroption').val(response.data.educationaldegree.id);
                $('#transcript_scan_edit_label_2').html('Replace '+response.data.transcript_scan);
                $('#organisation_edit').val(response.data.organisation);
                $('#title_edit').val(response.data.title);
                $('#marks_edit').val(response.data.marks);
                $('#select_marks_type_edit').val(response.data.marks_type);
                $('#from_date_edit').val(response.data.from_date);
                $('#to_date_edit').val(response.data.to_date);
                $('#description_edit').val(response.data.description);
                $('#hiddenidqualificationedit').val(response.data.id);
            }
          }
         });
    });

    bsCustomFileInput.init();
    $('#editqualificationform').on('submit',function(event){
        $('.ajax_input_edit').removeClass("is-invalid");
        $('.ajax_errors_edit').empty(); 
        $('.label_for_input').empty();

        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("principaldashboard.profile.qualitifcations.edit")}}',
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

            $('.label_success_editqualificationform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editqualificationform').append(response.msg);
          
            setTimeout(
                function() 
                {
                location.reload(); 
                }, 1000);
           }else{
            $('#error_editqualificationform').append(response.msg);
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