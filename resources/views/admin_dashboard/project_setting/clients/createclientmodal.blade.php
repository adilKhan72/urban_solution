<!-- Modal -->
<div class="modal fade" id="createclientmodal" tabindex="-1" role="dialog" aria-labelledby="createclientmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Add client</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createclientform" name="createclientform" role="form">

      <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createclientform label_success_createclientform" id="phone_label"></span> Enter phone</label>

    <input type="text" class="form-control ajax_input_createclientform" name="phone" id="phone"  placeholder="Enter client phone">

    <span class="text-danger ajax_errors_createclientform" id="phone_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createclientform label_success_createclientform" id="email_label"></span> Enter email</label>

    <input type="text" class="form-control ajax_input_createclientform" name="email" id="email"  placeholder="Enter client email">

    <span class="text-danger ajax_errors_createclientform" id="email_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createclientform label_success_createclientform" id="designation_label"></span> designation</label>

    <input type="text" class="form-control ajax_input_createclientform" name="designation" id="designation"  placeholder="Enter client designation">

    <span class="text-danger ajax_errors_createclientform" id="designation_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createclientform label_success_createclientform" id="secondary_phone_label"></span> secondary_phone</label>

    <input type="text" class="form-control ajax_input_createclientform" name="secondary_phone" id="secondary_phone"  placeholder="Enter client secondary_phone">

    <span class="text-danger ajax_errors_createclientform" id="secondary_phone_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createclientform label_success_createclientform" id="address_label"></span> Enter address</label>

    <input type="text" class="form-control ajax_input_createclientform" name="address" id="address"  placeholder="Enter client address">

    <span class="text-danger ajax_errors_createclientform" id="address_error"> </span>
  </div>


      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createclientform" id="error_createclientform"> </span>
        <span class="text-success ajax_errors_createclientform" id="success_createclientform"> </span>
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