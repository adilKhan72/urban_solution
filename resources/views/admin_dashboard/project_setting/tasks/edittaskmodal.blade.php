<!-- Modal -->

<div class="modal fade" id="edittaskmodal" tabindex="-1" role="dialog" aria-labelledby="edittaskmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit task details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="edittaskform" name="edittaskform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_edittaskform label_success_edittaskform" id="name_label_edit"></span> Enter task Name</label>

    <input type="text" class="form-control ajax_input_edit_edittaskform" name="name" id="name_edit1"  placeholder="Enter task Name">

    <span class="text-danger ajax_errors_edit_edittaskform" id="name_error_edit"> </span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editchecklistform label_success_editchecklistform" id="discription_label_edit"></span> Enter checklist discription</label>

    <input type="text" class="form-control ajax_input_edit_editchecklistform" name="discription" id="discription_edit1"  placeholder="Enter checklist discription">

    <span class="text-danger ajax_errors_edit_editchecklistform" id="discription_error_edit"> </span>
  </div>



        <input type="hidden" id="hiddenidtask" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_edittaskform" id="error_edittaskform"> </span>
        <span class="text-success ajax_errors_edit_edittaskform" id="success_edittaskform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#edittaskmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var task_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.tasks.taskfetch")}}',
          type:"POST",
          data:{
            task_id:task_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#name_edit1').val(response.data.name);
                $('#discription_edit1').val(response.data.discription);
                $('#hiddenidtask').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection