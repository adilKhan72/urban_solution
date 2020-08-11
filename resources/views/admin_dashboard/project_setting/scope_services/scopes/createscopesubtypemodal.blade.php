<!-- Modal -->
<div class="modal fade" id="createscopesubtypemodal" tabindex="-1" role="dialog" aria-labelledby="createscopesubtypemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add scope sub type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createscopesubtypeform" name="createscopesubtypeform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createscopesubtypeform label_success_createscopesubtypeform" id="name_label"></span> name</label>

    <input type="text" class="form-control ajax_input_createscopesubtypeform" name="name" id="name"  placeholder="Enter scope name">

    <span class="text-danger ajax_errors_createscopesubtypeform" id="name_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createscopesubtypeform label_success_createscopesubtypeform" id="discription_label"></span> discription</label>

    <input type="text" class="form-control ajax_input_createscopesubtypeform" name="discription" id="discription"  placeholder="Enter scope discription">

    <span class="text-danger ajax_errors_createscopesubtypeform" id="discription_error"> </span>
  </div>

     <input type="hidden" id="hiddenidscopeforsubtypes" name="custId" value="">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createscopesubtypeform" id="error_createscopesubtypeform"> </span>
        <span class="text-success ajax_errors_createscopesubtypeform" id="success_createscopesubtypeform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#createscopesubtypemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var scope_id = button.data('id');
      $('#hiddenidscopeforsubtypes').val(scope_id);
    });
    });
</script>
@endsection