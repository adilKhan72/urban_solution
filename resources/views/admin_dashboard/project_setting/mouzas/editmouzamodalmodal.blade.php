<!-- Modal -->

<div class="modal fade" id="editmouzamodal" tabindex="-1" role="dialog" aria-labelledby="editmouzamodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit mouza details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editmouzaform" name="editmouzaform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editmouzaform label_success_editmouzaform" id="name_label_edit"></span> Enter mouza Name</label>

    <input type="text" class="form-control ajax_input_edit_editmouzaform" name="name" id="name_edit"  placeholder="Enter mouza Name">

    <span class="text-danger ajax_errors_edit_editmouzaform" id="name_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editmouzaform label_success_editmouzaform" id="area_label_edit"></span> Enter mouza Area</label>

    <input type="text" class="form-control ajax_input_edit_editmouzaform" name="area" id="area_edit"  placeholder="Enter mouza Area">

    <span class="text-danger ajax_errors_edit_editmouzaform" id="area_error_edit"> </span>
  </div>


        <input type="hidden" id="hiddenidmouza" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editmouzaform" id="error_editmouzaform"> </span>
        <span class="text-success ajax_errors_edit_editmouzaform" id="success_editmouzaform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editmouzamodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var mouza_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.mouzas.fetch")}}',
          type:"POST",
          data:{
            mouza_id:mouza_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#area_edit').val(response.data.area);
                $('#name_edit').val(response.data.name);
                $('#hiddenidmouza').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection