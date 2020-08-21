<!-- Modal -->
<div class="modal fade" id="createqualificationmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Add Qualification</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createqualificationform" name="createqualificationform" role="form">
  
  <div class="form-group">
    <label for="exampleInputEmail1">  <span class="label_for_input label_success_createqualificationform" id="educational_degree_id_label"></span> Enter Educational Degree</label>
    <select name="educational_degree_id" class="select2" id="select_educational_degree" data-placeholder="Select Educational Degree" style="width: 100%;">
    </select>
    <span class="text-danger ajax_errors" id="educational_degree_id_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createqualificationform" id="organisation_label"></span> Enter Organisation Name</label>
    <input type="text" class="form-control ajax_input" name="organisation" id="organisation"  placeholder="Enter Organisation Name">
    <span class="text-danger ajax_errors" id="organisation_error"> </span>
  </div>



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createqualificationform" id="title_label"></span> Enter Degree Title</label>
    <input type="text" class="form-control ajax_input" name="title" id="title"  placeholder="Enter  Degree Title">
    <span class="text-danger ajax_errors" id="title_error"> </span>
  </div>



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createqualificationform" id="marks_label"></span> Enter Marks</label>
  <input name="marks" type="text" id="marks" class="form-control ajax_input" placeholder="Enter qualification Started Date">
  <span class="text-danger ajax_errors" id="marks_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createqualificationform" id="marks_type_label"></span> Marks type</label>

    <select name="marks_type" id="select_marks_type"  class="select2" data-placeholder="Select Marks type" style="width: 100%;">
    <option value="" selected>Select Marks Type</option>
    <option value="gpa">gpa</option>
    <option value="percentage">percentage</option>
    </select>


  <span class="text-danger ajax_errors" id="marks_type_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createqualificationform" id="description_label"></span> Qualification Discription</label>
  <textarea name="description" id="description" class="form-control ajax_input"  rows="3" placeholder="Enter qualification discription..."></textarea>
  <span class="text-danger ajax_errors" id="description_error"> </span>
  </div>

  <div class="form-group">
  <label for="exampleInputEmail1"> <span class="label_for_input label_success_createqualificationform" id="transcript_scan_label"></span> Choose Transcript</label>
  <div class="custom-file">

    <input name="transcript_scan" type="file" class="custom-file-input ajax_input" id="transcript_scan">

    <label class="custom-file-label transcript_scan_clear" for="exampleInputFile">Choose Transcript</label>
  </div>
  <span class="text-danger ajax_errors" id="transcript_scan_error"> </span>
</div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createqualificationform" id="from_date_label"></span> Enter From_Date</label>
  <input name="from_date" type="date" id="from_date" class="form-control ajax_input" placeholder="Enter 
  From_Date">
  <span class="text-danger ajax_errors" id="from_date_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createqualificationform" id="to_date_label"></span> Enter To_Date</label>
  <input name="to_date" type="date" id="to_date" class="form-control ajax_input" placeholder="Enter  To_Date">
  <span class="text-danger ajax_errors" id="to_date_error"> </span>
  </div>




      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors" id="error_createqualificationform"> </span>
        <span class="text-success ajax_errors" id="success_createqualificationform"> </span>
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
    $('#createqualificationform').on('submit',function(event){

        $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();
        var educational_degree_id = $('#select_educational_degree').val();
        var organisation = $('#organisation').val();
        var marks_type = $('#select_marks_type').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var description = $('#description').val();
        var transcript_scan = $('#transcript_scan').val();

        files = new FormData(this);
        //files.append('form','createqualificationform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.profile.qualitifcations.store")}}',
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

            $('.label_success_createqualificationform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createqualificationform').append(response.msg);
            

            setTimeout(
                function() 
                {
                location.reload(); 
                }, 1000);


           }else{
            $('#error_createqualificationform').append(response.msg);
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