<!-- Modal -->

<div class="modal fade" id="editscopemodal" tabindex="-1" role="dialog" aria-labelledby="editscopemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit scope details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editscopeform" name="editscopeform" enctype=multipart/form-data role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editscopeform label_success_editscopeform" id="name_label_edit"></span> Enter scope name</label>

    <input type="text" class="form-control ajax_input_edit_editscopeform" name="name" id="name_edit"  placeholder="Enter scope name">

    <span class="text-danger ajax_errors_edit_editscopeform" id="name_error_edit"> </span>
  </div>


        <input type="hidden" id="hiddenidscope" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editscopeform" id="error_editscopeform"> </span>
        <span class="text-success ajax_errors_edit_editscopeform" id="success_editscopeform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editscopemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var scope_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.fetch")}}',
          type:"POST",
          data:{
            scope_id:scope_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#name_edit').val(response.data.name);
                $('#hiddenidscope').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection