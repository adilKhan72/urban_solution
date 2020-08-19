<!-- Modal -->
<div class="modal fade" id="createchecklistmodal" tabindex="-1" role="dialog" aria-labelledby="createchecklistmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add checklist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createchecklistform" name="createchecklistform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createchecklistform label_success_createchecklistform" id="name_label"></span> Enter checklist name</label>

    <input type="text" class="form-control ajax_input_createchecklistform" name="name" id="name"  placeholder="Enter checklist Name">

    <span class="text-danger ajax_errors_createchecklistform" id="name_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createchecklistform label_success_createchecklistform" id="discription_label"></span> Enter checklist discription</label>

    <input type="text" class="form-control ajax_input_createchecklistform" name="discription" id="discription"  placeholder="Enter checklist discription">

    <span class="text-danger ajax_errors_createchecklistform" id="discription_error"> </span>
  </div>



      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createchecklistform" id="error_createchecklistform"> </span>
        <span class="text-success ajax_errors_createchecklistform" id="success_createchecklistform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#createchecklistmodal').on('shown.bs.modal', function (event) {
      $('#name').val('');
      $('#discription').val('');
    });
    });
</script>
@endsection