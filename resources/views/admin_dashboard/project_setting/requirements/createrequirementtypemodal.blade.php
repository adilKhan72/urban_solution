<!-- Modal -->
<div class="modal fade" id="createrequirementtypemodal" tabindex="-1" role="dialog" aria-labelledby="createrequirementtypemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add requirementtype</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createrequirementtypeform" name="createrequirementtypeform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createrequirementtypeform label_success_createrequirementtypeform" id="type_label"></span> Enter Requirement Type</label>

    <input type="text" class="form-control ajax_input_createrequirementtypeform" name="type" id="type"  placeholder="Enter requirementtype Type">

    <span class="text-danger ajax_errors_createrequirementtypeform" id="type_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createrequirementtypeform label_success_createrequirementtypeform" id="discription_label"></span> Enter Society discription</label>

    <input type="text" class="form-control ajax_input_createrequirementtypeform" name="discription" id="discription"  placeholder="Enter requirementtype discription">

    <span class="text-danger ajax_errors_createrequirementtypeform" id="discription_error"> </span>
  </div>



      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createrequirementtypeform" id="error_createrequirementtypeform"> </span>
        <span class="text-success ajax_errors_createrequirementtypeform" id="success_createrequirementtypeform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#createrequirementtypemodal').on('shown.bs.modal', function (event) {
      $('#discription').val('');
      $('#type').val('');
    });
    });
</script>
@endsection