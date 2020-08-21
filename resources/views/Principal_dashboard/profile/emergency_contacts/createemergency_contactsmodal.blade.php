<!-- Modal -->
<div class="modal fade" id="createemergency_contactmodal" tabindex="-1" role="dialog" aria-labelledby="createemergency_contactmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Add emergency_contact</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createemergency_contactform" name="createemergency_contactform" role="form">

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createemergency_contactform" id="name_label"></span> Enter Name of Relative</label>

    <input type="text" class="form-control ajax_input" name="name" id="name"  placeholder="Enter Name of Relative">

    <span class="text-danger ajax_errors" id="name_error"> </span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createemergency_contactform" id="relation_label"></span> Enter Relation</label>

    <input type="text" class="form-control ajax_input" name="relation" id="relation"  placeholder="Enter Relation">

    <span class="text-danger ajax_errors" id="relation_error"> </span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createemergency_contactform" id="phone_label"></span> Enter Phone Number</label>

    <input type="number" class="form-control ajax_input" name="phone" id="phone"  placeholder="Enter Phone Number">

    <span class="text-danger ajax_errors" id="phone_error"> </span>
  </div>


      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors" id="error_createemergency_contactform"> </span>
        <span class="text-success ajax_errors" id="success_createemergency_contactform"> </span>
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