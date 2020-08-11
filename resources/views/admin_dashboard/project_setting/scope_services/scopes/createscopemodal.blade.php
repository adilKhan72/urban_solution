<!-- Modal -->
<div class="modal fade" id="createscopemodal" tabindex="-1" role="dialog" aria-labelledby="createscopemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add scope</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createscopeform" name="createscopeform" role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createscopeform label_success_createscopeform" id="name_label"></span> name</label>

    <input type="text" class="form-control ajax_input_createscopeform" name="name" id="name"  placeholder="Enter scope name">

    <span class="text-danger ajax_errors_createscopeform" id="name_error"> </span>
  </div>



      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createscopeform" id="error_createscopeform"> </span>
        <span class="text-success ajax_errors_createscopeform" id="success_createscopeform"> </span>
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