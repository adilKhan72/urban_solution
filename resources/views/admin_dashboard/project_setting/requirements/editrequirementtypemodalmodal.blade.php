<!-- Modal -->

<div class="modal fade" id="editrequirementtypemodal" tabindex="-1" role="dialog" aria-labelledby="editrequirementtypemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit requirementtype details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editrequirementtypeform" name="editrequirementtypeform" enctype=multipart/form-data role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editequirementtypeform label_success_editequirementtypeform" id="type_label_edit"></span> Enter Requirement Type</label>

    <input type="text" class="form-control ajax_input_editequirementtypeform" name="type" id="type_edit"  placeholder="Enter requirementtype Type">

    <span class="text-danger ajax_errors_editequirementtypeform" id="type_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editequirementtypeform label_success_editequirementtypeform" id="discription_label_edit"></span> Enter Society discription</label>

    <input type="text" class="form-control ajax_input_editequirementtypeform" name="discription" id="discription_edit"  placeholder="Enter requirementtype discription">

    <span class="text-danger ajax_errors_editequirementtypeform" id="discription_error_edit"> </span>
  </div>


        <input type="hidden" id="hiddenidrequirementtype" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editrequirementtypeform" id="error_editrequirementtypeform"> </span>
        <span class="text-success ajax_errors_edit_editrequirementtypeform" id="success_editrequirementtypeform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editrequirementtypemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var requirementtype_id = button.data('id');
      //alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.requirements.requirementtypefetch")}}',
          type:"POST",
          data:{
            requirementtype_id:requirementtype_id,
          },
          success:function(response){
            if(response.status == true){
              $('#discription_edit').val(response.data.discription);
              $('#type_edit').val(response.data.type);
              $('#hiddenidrequirementtype').val(response.data.id);
            }
          }
         });
    });

    });
</script>
@endsection