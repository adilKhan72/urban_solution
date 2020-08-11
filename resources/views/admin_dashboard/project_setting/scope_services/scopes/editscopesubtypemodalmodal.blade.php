<!-- Modal -->

<div class="modal fade" id="editscopesubtypemodal" tabindex="-1" role="dialog" aria-labelledby="editscopesubtypemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit scopesubtype details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editscopesubtypeform" name="editscopesubtypeform" enctype=multipart/form-data role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editscopesubtypeform label_success_editscopesubtypeform" id="name_label_edit"></span> Enter scopesubtype name</label>

    <input type="text" class="form-control ajax_input_edit_editscopesubtypeform" name="name" id="name_edit_subtype"  placeholder="Enter scopesubtype name">

    <span class="text-danger ajax_errors_edit_editscopesubtypeform" id="name_error_edit"> </span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editscopesubtypeform label_success_editscopesubtypeform" id="discription_label_edit"></span> Enter scopesubtype discription</label>

    <input type="text" class="form-control ajax_input_edit_editscopesubtypeform" name="discription" id="discription_edit_subtype"  placeholder="Enter scopesubtype discription">

    <span class="text-danger ajax_errors_edit_editscopesubtypeform" id="discription_error_edit"> </span>
  </div>


        <input type="hidden" id="hiddenidscopesubtype" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editscopesubtypeform" id="error_editscopesubtypeform"> </span>
        <span class="text-success ajax_errors_edit_editscopesubtypeform" id="success_editscopesubtypeform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editscopesubtypemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var scopesubtype_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.fetchsubtype")}}',
          type:"POST",
          data:{
            scopesubtype_id:scopesubtype_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#name_edit_subtype').val(response.data.name);
                $('#discription_edit_subtype').val(response.data.discription);
                $('#hiddenidscopesubtype').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection