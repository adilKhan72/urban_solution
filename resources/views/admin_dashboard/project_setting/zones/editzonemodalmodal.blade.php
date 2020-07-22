<!-- Modal -->

<div class="modal fade" id="editzonemodal" tabindex="-1" role="dialog" aria-labelledby="editzonemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit zone details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editzoneform" name="editzoneform" enctype=multipart/form-data role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editzoneform label_success_editzoneform" id="name_label_edit"></span> Enter zone Name</label>

    <input type="text" class="form-control ajax_input_edit_editzoneform" name="name" id="name1_edit"  placeholder="Enter zone Name">

    <span class="text-danger ajax_errors_edit_editzoneform" id="name_error_edit"> </span>
  </div>


        <input type="hidden" id="hiddenidzone" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editzoneform" id="error_editzoneform"> </span>
        <span class="text-success ajax_errors_edit_editzoneform" id="success_editzoneform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editzonemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var zone_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.zones.fetch")}}',
          type:"POST",
          data:{
            zone_id:zone_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#name1_edit').val(response.data.name);
                $('#hiddenidzone').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection