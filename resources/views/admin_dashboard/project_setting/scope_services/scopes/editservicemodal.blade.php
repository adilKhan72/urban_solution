<!-- Modal -->

<div class="modal fade" id="editservicemodal" tabindex="-1" role="dialog" aria-labelledby="editservicemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit service details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editserviceform" name="editserviceform" enctype=multipart/form-data role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editserviceform label_success_editserviceform" id="name_label_edit"></span> Enter service name</label>

    <input type="text" class="form-control ajax_input_edit_editserviceform" name="name" id="name_edit_service"  placeholder="Enter service name">

    <span class="text-danger ajax_errors_edit_editserviceform" id="name_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editserviceform label_success_editserviceform" id="discription_label_edit"></span> Enter service discription</label>

    <input type="text" class="form-control ajax_input_edit_editserviceform" name="discription" id="discription_edit_service"  placeholder="Enter service discription">

    <span class="text-danger ajax_errors_edit_editserviceform" id="discription_error_edit"> </span>
  </div>


        <input type="hidden" id="hiddenidservice" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editserviceform" id="error_editserviceform"> </span>
        <span class="text-success ajax_errors_edit_editserviceform" id="success_editserviceform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editservicemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var service_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.fetchservice")}}',
          type:"POST",
          data:{
            service_id:service_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#name_edit_service').val(response.data.name);
                $('#discription_edit_service').val(response.data.discription);
                $('#hiddenidservice').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection