<!-- Modal -->
<div class="modal fade" id="editemergency_contactmodal" tabindex="-1" role="dialog" aria-labelledby="editemergency_contactmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit emergency_contact details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editemergency_contactform" name="editemergency_contactform" enctype=multipart/form-data role="form">



  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editemergency_contactform" id="name_label_edit"></span> Enter Name of Relative</label>

    <input type="text" class="form-control ajax_input_edit" name="name" id="name_edit"  placeholder="Enter Name of Relative">

    <span class="text-danger ajax_errors_edit" id="name_error_edit"> </span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editemergency_contactform" id="relation_label_edit"></span> Enter Relation</label>

    <input type="text" class="form-control ajax_input_edit" name="relation" id="relation_edit"  placeholder="Enter Relation">

    <span class="text-danger ajax_errors_edit" id="relation_error_edit"> </span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_editemergency_contactform" id="phone_label_edit"></span> Enter Phone Number</label>

    <input type="number" class="form-control ajax_input_edit" name="phone" id="phone_edit"  placeholder="Enter Phone Number">

    <span class="text-danger ajax_errors_edit" id="phone_error_edit"> </span>
  </div>



        <input type="hidden" id="hiddenidemergency_contact" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit" id="error_editemergency_contactform"> </span>
        <span class="text-success ajax_errors_edit" id="success_editemergency_contactform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editemergency_contactmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var emergency_contact_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("principaldashboard.profile.emergency_contacts.fetch")}}',
          type:"POST",
          data:{
            emergency_contact_id:emergency_contact_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
              $('#name_edit').val(response.data.name);
                $('#relation_edit').val(response.data.relation);
                $('#phone_edit').val(response.data.phone);
                $('#hiddenidemergency_contact').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection