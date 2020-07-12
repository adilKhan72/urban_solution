<!-- Modal -->
<div class="modal fade" id="editskillmodal" tabindex="-1" role="dialog" aria-labelledby="editskillmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit skill details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editskillform" name="editskillform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editskillform" id="title_label_edit"></span> Enter Skill Name</label>

    <input type="text" class="form-control ajax_input_edit" name="title" id="title_edit"  placeholder="Enter Skill Name">

    <span class="text-danger ajax_errors_edit" id="title_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editskillform" id="profeciency_label_edit"></span> Profeciency</label>

    <select name="profeciency" id="select_profeciency_edit"  class="select2 ajax_input_edit" data-placeholder="Select Profeciency" style="width: 100%;">
    <option value="" id="select_profecienecy_from_db"></option>
    <option value="" id="already_selected_edit" selected>Select Profeciency</option>
    <option value="beginner">Beginner</option>
    <option value="intermediate">Intermediate</option>
    <option value="expert">Expert</option>

    </select>
    
  <span class="text-danger ajax_errors_edit" id="profeciency_error_edit"> </span>
  </div>

        <input type="hidden" id="hiddenidskill" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit" id="error_editskillform"> </span>
        <span class="text-success ajax_errors_edit" id="success_editskillform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editskillmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var skill_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("principaldashboard.profile.skills.fetch")}}',
          type:"POST",
          data:{
            skill_id:skill_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#select_profecienecy_from_db').val(response.data.profeciency);
                $('#select_profecienecy_from_db').html(response.data.profeciency);
                $('#select_profecienecy_from_db').attr("selected");
                $('#already_selected_edit').removeAttr("selected");
                $('#title_edit').val(response.data.title);
                $('#hiddenidskill').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection