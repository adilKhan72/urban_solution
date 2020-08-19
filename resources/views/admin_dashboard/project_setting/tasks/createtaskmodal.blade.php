<!-- Modal -->
<div class="modal fade" id="createtaskmodal" tabindex="-1" role="dialog" aria-labelledby="createtaskmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createtaskform" name="createtaskform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createtaskform label_success_createtaskform" id="name_label"></span> Enter task name</label>

    <input type="text" class="form-control ajax_input_createtaskform" name="name" id="name"  placeholder="Enter task Name">

    <span class="text-danger ajax_errors_createtaskform" id="name_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createtaskform label_success_createtaskform" id="discription_label"></span> Enter task discription</label>

    <input type="text" class="form-control ajax_input_createtaskform" name="discription" id="discription"  placeholder="Enter task discription">

    <span class="text-danger ajax_errors_createtaskform" id="discription_error"> </span>
  </div>



      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createtaskform" id="error_createtaskform"> </span>
        <span class="text-success ajax_errors_createtaskform" id="success_createtaskform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#createtaskmodal').on('shown.bs.modal', function (event) {
      $('#name').val('');
      $('#discription').val('');
    });
    });
</script>
@endsection