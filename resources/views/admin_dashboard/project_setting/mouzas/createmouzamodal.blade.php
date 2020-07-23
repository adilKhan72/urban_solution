<!-- Modal -->
<div class="modal fade" id="createmouzamodal" tabindex="-1" role="dialog" aria-labelledby="createmouzamodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add mouza</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createmouzaform" name="createmouzaform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createmouzaform label_success_createmouzaform" id="name_label"></span> Enter Area Unit type</label>

    <input type="text" class="form-control ajax_input_createmouzaform" name="name" id="name12"  placeholder="Enter mouza Name">

    <span class="text-danger ajax_errors_createmouzaform" id="name_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createmouzaform label_success_createmouzaform" id="area_label"></span> Enter Area in Feet</label>

    <input type="text" class="form-control ajax_input_createmouzaform" name="area" id="area"  placeholder="Enter mouza Name">

    <span class="text-danger ajax_errors_createmouzaform" id="area_error"> </span>
  </div>


      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createmouzaform" id="error_createmouzaform"> </span>
        <span class="text-success ajax_errors_createmouzaform" id="success_createmouzaform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#createmouzamodal').on('shown.bs.modal', function (event) {
      $('#name12').val('');
      $('#area').val('');
    });
    });
</script>
@endsection