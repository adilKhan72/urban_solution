<!-- Modal -->
<div class="modal fade" id="createzonemodal" tabindex="-1" role="dialog" aria-labelledby="createzonemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add zone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createzoneform" name="createzoneform" role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createzoneform label_success_createzoneform" id="name_label"></span> Enter Area in Feet</label>

    <input type="text" class="form-control ajax_input_createzoneform" name="name" id="name1122"  placeholder="Enter zone Name">

    <span class="text-danger ajax_errors_createzoneform" id="name_error"> </span>
  </div>


      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createzoneform" id="error_createzoneform"> </span>
        <span class="text-success ajax_errors_createzoneform" id="success_createzoneform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#createzonemodal').on('shown.bs.modal', function (event) {
      $('#name1122').val('');
    });
    });
</script>
@endsection