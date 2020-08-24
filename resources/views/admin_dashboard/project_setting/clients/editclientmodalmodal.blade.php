<!-- Modal -->

<div class="modal fade" id="editclientmodal" tabindex="-1" role="dialog" aria-labelledby="editclientmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit client details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="editclientform" name="editclientform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editclientform label_success_editclientform" id="phone_label_edit"></span> Enter client phone</label>

    <input type="text" class="form-control ajax_input_edit_editclientform" name="phone" id="phone_edit"  placeholder="Enter client phone">

    <span class="text-danger ajax_errors_edit_editclientform" id="phone_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputname1"> <span class="label_for_input_editclientform label_success_editclientform" id="name_label_edit"></span> Enter client name</label>

    <input type="text" class="form-control ajax_input_edit_editclientform" name="name" id="name_edit"  placeholder="Enter client name">

    <span class="text-danger ajax_errors_edit_editclientform" id="name_error_edit"> </span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editclientform label_success_editclientform" id="email_label_edit"></span> Enter client email</label>

    <input type="text" class="form-control ajax_input_edit_editclientform" name="email" id="email_edit"  placeholder="Enter client email">

    <span class="text-danger ajax_errors_edit_editclientform" id="email_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editclientform label_success_editclientform" id="designation_label_edit"></span> Enter client designation</label>

    <input type="text" class="form-control ajax_input_edit_editclientform" name="designation" id="designation_edit"  placeholder="Enter client designation">

    <span class="text-danger ajax_errors_edit_editclientform" id="designation_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editclientform label_success_editclientform" id="secondary_phone_label_edit"></span> Enter client secondary_phone</label>

    <input type="text" class="form-control ajax_input_edit_editclientform" name="secondary_phone" id="secondary_phone_edit"  placeholder="Enter client secondary_phone">

    <span class="text-danger ajax_errors_edit_editclientform" id="secondary_phone_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input_editclientform label_success_editclientform" id="address_label_edit"></span> Enter client address</label>

    <input type="text" class="form-control ajax_input_edit_editclientform" name="address" id="address_edit"  placeholder="Enter client address">

    <span class="text-danger ajax_errors_edit_editclientform" id="address_error_edit"> </span>
  </div>

        <input type="hidden" id="hiddenidclient" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit_editclientform" id="error_editclientform"> </span>
        <span class="text-success ajax_errors_edit_editclientform" id="success_editclientform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editclientmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var client_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.clients.fetch")}}',
          type:"POST",
          data:{
            client_id:client_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#phone_edit').val(response.data.phone);
                $('#email_edit').val(response.data.email);
                $('#name_edit').val(response.data.name);
                $('#secondary_phone_edit').val(response.data.secondary_phone);
                $('#designation_edit').val(response.data.designation);
                $('#address_edit').val(response.data.address);
                $('#hiddenidclient').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection