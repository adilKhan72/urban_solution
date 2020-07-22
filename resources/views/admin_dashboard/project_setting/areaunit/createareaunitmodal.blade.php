<!-- Modal -->
<div class="modal fade" id="createareaunitmodal" tabindex="-1" role="dialog" aria-labelledby="createareaunitmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add areaunit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createareaunitform" name="createareaunitform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createareaunitform label_success_createareaunitform" id="unit_type_label"></span> Enter Area Unit type</label>

    <input type="text" class="form-control ajax_input_createareaunitform" name="unit_type" id="unit_type"  placeholder="Enter areaunit Name">

    <span class="text-danger ajax_errors_createareaunitform" id="unit_type_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createareaunitform label_success_createareaunitform" id="area_in_feet_label"></span> Enter Area in Feet</label>

    <input type="text" class="form-control ajax_input_createareaunitform" name="area_in_feet" id="area_in_feet"  placeholder="Enter areaunit Name">

    <span class="text-danger ajax_errors_createareaunitform" id="area_in_feet_error"> </span>
  </div>


      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createareaunitform" id="error_createareaunitform"> </span>
        <span class="text-success ajax_errors_createareaunitform" id="success_createareaunitform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    });
</script>
@endsection