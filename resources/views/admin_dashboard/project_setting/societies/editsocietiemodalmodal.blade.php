<!-- Modal -->

<div class="modal fade" id="editsocietiemodal" tabindex="-1" role="dialog" aria-labelledby="editsocietiemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit societie details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editsocietieform" name="editsocietieform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editsocietieform label_success_editsocietieform" id="name_label_edit"></span> Enter societie Name</label>

    <input type="text" class="form-control ajax_input_edit_editsocietieform" name="name" id="name_edit1"  placeholder="Enter societie Name">

    <span class="text-danger ajax_errors_edit_editsocietieform" id="name_error_edit"> </span>
  </div>




        <input type="hidden" id="hiddenidsocietie" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editsocietieform" id="error_editsocietieform"> </span>
        <span class="text-success ajax_errors_edit_editsocietieform" id="success_editsocietieform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editsocietiemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var societie_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.societies.fetch")}}',
          type:"POST",
          data:{
            societie_id:societie_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#name_edit1').val(response.data.name);
                $('#hiddenidsocietie').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection