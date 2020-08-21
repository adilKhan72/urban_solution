<!-- Modal -->
<div class="modal fade" id="createsocietiemodal" tabindex="-1" role="dialog" aria-labelledby="createsocietiemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Add societie</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createsocietieform" name="createsocietieform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createsocietieform label_success_createsocietieform" id="name_label"></span> Enter Society name</label>

    <input type="text" class="form-control ajax_input_createsocietieform" name="name" id="name"  placeholder="Enter societie Name">

    <span class="text-danger ajax_errors_createsocietieform" id="name_error"> </span>
  </div>




      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createsocietieform" id="error_createsocietieform"> </span>
        <span class="text-success ajax_errors_createsocietieform" id="success_createsocietieform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#createsocietiemodal').on('shown.bs.modal', function (event) {
      $('#name').val('');
    });
    });
</script>
@endsection