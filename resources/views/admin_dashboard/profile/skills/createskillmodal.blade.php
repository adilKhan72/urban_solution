<!-- Modal -->
<div class="modal fade" id="createskillmodal" tabindex="-1" role="dialog" aria-labelledby="createskillmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off" enctype=multipart/form-data method="post" class="" id="createskillform" name="createskillform" role="form">

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createskillform" id="title_label"></span> Enter Skill Name</label>

    <input type="text" class="form-control ajax_input" name="title" id="title"  placeholder="Enter Skill Name">

    <span class="text-danger ajax_errors" id="title_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createskillform" id="profeciency_label"></span> Profeciency</label>

    <select name="profeciency" id="select_profeciency"  class="select2" data-placeholder="Select Profeciency" style="width: 100%;">

    <option value="" selected>Select Profeciency</option>
    <option value="beginner">Beginner</option>
    <option value="intermediate">Intermediate</option>
    <option value="expert">Expert</option>

    </select>


  <span class="text-danger ajax_errors" id="profeciency_error"> </span>
  </div>


      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors" id="error_createskillform"> </span>
        <span class="text-success ajax_errors" id="success_createskillform"> </span>
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