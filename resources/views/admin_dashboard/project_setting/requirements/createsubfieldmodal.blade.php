<!-- Modal -->
<div class="modal fade" id="createsubfieldmodal" tabindex="-1" role="dialog" aria-labelledby="createsubfieldmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Add subfield</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createsubfieldform" name="createsubfieldform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createsubfieldform label_success_createsubfieldform" id="filed_name_label"></span> Enter Title</label>

    <input type="text" class="form-control ajax_input_createsubfieldform" name="filed_name" id="filed_name"  placeholder="Enter  Title">

    <span class="text-danger ajax_errors_createsubfieldform" id="filed_name_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createsubfieldform label_success_createsubfieldform" id="field_value_label"></span> Enter  Discription</label>

    <textarea type="text" class="form-control ajax_input_createsubfieldform" name="field_value" id="field_value"  placeholder="Enter  discription">
</textarea>
    <span class="text-danger ajax_errors_createsubfieldform" id="field_value_error"> </span>
  </div>

      <input type="hidden" id="hiddenidsubfield" name="hiddenidsubfield" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createsubfieldform" id="error_createsubfieldform"> </span>
        <span class="text-success ajax_errors_createsubfieldform" id="success_createsubfieldform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#createsubfieldmodal').on('shown.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var hiddenidsubfield = button.data('id');
      $('#hiddenidsubfield').val(hiddenidsubfield);
      $('#filed_name').val('');
      $('#field_value').val('');
    });





    });
</script>
@endsection