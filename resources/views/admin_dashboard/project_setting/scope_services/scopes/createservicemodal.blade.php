<!-- Modal -->
<div class="modal fade" id="createservicemodal" tabindex="-1" role="dialog" aria-labelledby="createservicemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Add service</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createserviceform" name="createserviceform" role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createserviceform label_success_createserviceform" id="name_label"></span> name</label>

    <input type="text" class="form-control ajax_input_createserviceform" name="name" id="name"  placeholder="Enter service name">

    <span class="text-danger ajax_errors_createserviceform" id="name_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_createserviceform label_success_createserviceform" id="discription_label"></span> discription</label>

    <input type="text" class="form-control ajax_input_createserviceform" name="discription" id="discription"  placeholder="Enter service discription">

    <span class="text-danger ajax_errors_createserviceform" id="discription_error"> </span>
  </div>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_createserviceform" id="error_createserviceform"> </span>
        <span class="text-success ajax_errors_createserviceform" id="success_createserviceform"> </span>
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