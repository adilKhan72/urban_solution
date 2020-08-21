<!-- Modal -->

<div class="modal fade" id="editchecklistmodal" tabindex="-1" role="dialog" aria-labelledby="editchecklistmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit checklist details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editchecklistform" name="editchecklistform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editchecklistform label_success_editchecklistform" id="name_label_edit"></span> Enter checklist Name</label>

    <input type="text" class="form-control ajax_input_edit_editchecklistform" name="name" id="name_edit1"  placeholder="Enter checklist Name">

    <span class="text-danger ajax_errors_edit_editchecklistform" id="name_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editchecklistform label_success_editchecklistform" id="discription_label_edit"></span> Enter checklist discription</label>

    <input type="text" class="form-control ajax_input_edit_editchecklistform" name="discription" id="discription_edit1"  placeholder="Enter checklist discription">

    <span class="text-danger ajax_errors_edit_editchecklistform" id="discription_error_edit"> </span>
  </div>


        <input type="hidden" id="hiddenidchecklist" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editchecklistform" id="error_editchecklistform"> </span>
        <span class="text-success ajax_errors_edit_editchecklistform" id="success_editchecklistform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editchecklistmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var checklist_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.tasks.checklistfetch")}}',
          type:"POST",
          data:{
            checklist_id:checklist_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#name_edit1').val(response.data.name);
                $('#discription_edit1').val(response.data.discription);
                $('#hiddenidchecklist').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection