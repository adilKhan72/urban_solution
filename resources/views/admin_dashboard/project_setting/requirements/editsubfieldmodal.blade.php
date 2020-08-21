<!-- Modal -->

<div class="modal fade" id="editsubfieldmodal" tabindex="-1" role="dialog" aria-labelledby="editsubfieldmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit subfield details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editsubfieldform" name="editsubfieldform" enctype=multipart/form-data role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editsubfieldform label_success_editsubfieldform" id="filed_name_label_edit"></span> Enter Title</label>

    <input type="text" class="form-control ajax_input_editsubfieldform" name="filed_name" id="filed_name_edit"  placeholder="Enter  Title">

    <span class="text-danger ajax_errors_editsubfieldform" id="filed_name_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editsubfieldform label_success_editsubfieldform" id="field_value_label_edit"></span> Enter  Discription</label>

    <textarea type="text" class="form-control ajax_input_editsubfieldform" name="field_value" id="field_value_edit"  placeholder=" Enter  Discription">
</textarea>
    <span class="text-danger ajax_errors_editsubfieldform" id="field_value_error_edit"> </span>
  </div>



        <input type="hidden" id="hiddenidsubfield_edit" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editsubfieldform" id="error_editsubfieldform"> </span>
        <span class="text-success ajax_errors_edit_editsubfieldform" id="success_editsubfieldform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editsubfieldmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var subfield_id = button.data('id');
      //alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.requirements.subfieldfetch")}}',
          type:"POST",
          data:{
            subfield_id:subfield_id,
          },
          success:function(response){
            if(response.status == true){
              $('#filed_name_edit').val(response.data.filed_name);
              $('#field_value_edit').text(response.data.field_value);
              $('#hiddenidsubfield_edit').val(response.data.id);
            }
          }
         });
    });




    });
</script>
@endsection