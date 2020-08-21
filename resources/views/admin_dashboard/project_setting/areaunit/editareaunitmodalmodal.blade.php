<!-- Modal -->

<div class="modal fade" id="editareaunitmodal" tabindex="-1" role="dialog" aria-labelledby="editareaunitmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit areaunit details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editareaunitform" name="editareaunitform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editareaunitform label_success_editareaunitform" id="unit_type_label_edit"></span> Enter areaunit Name</label>

    <input type="text" class="form-control ajax_input_edit_editareaunitform" name="unit_type" id="unit_type_edit"  placeholder="Enter areaunit Name">

    <span class="text-danger ajax_errors_edit_editareaunitform" id="unit_type_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editareaunitform label_success_editareaunitform" id="area_in_feet_label_edit"></span> Enter areaunit Name</label>

    <input type="text" class="form-control ajax_input_edit_editareaunitform" name="area_in_feet" id="area_in_feet_edit"  placeholder="Enter areaunit Name">

    <span class="text-danger ajax_errors_edit_editareaunitform" id="area_in_feet_error_edit"> </span>
  </div>


        <input type="hidden" id="hiddenidareaunit" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editareaunitform" id="error_editareaunitform"> </span>
        <span class="text-success ajax_errors_edit_editareaunitform" id="success_editareaunitform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editareaunitmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var areaunit_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.areaunits.fetch")}}',
          type:"POST",
          data:{
            areaunit_id:areaunit_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#area_in_feet_edit').val(response.data.area_in_feet);
                $('#unit_type_edit').val(response.data.unit_type);
                $('#hiddenidareaunit').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection