<!-- Modal -->
<div class="modal fade" id="editusermodal" tabindex="-1" role="dialog" aria-labelledby="editusermodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit user details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="edituserform" name="edituserform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="first_name_label_edit"></span> Enter User First Name</label>

    <input type="text" class="form-control ajax_input_edit" name="first_name" id="first_name_edit"  placeholder="Enter User First Name">

    <span class="text-danger ajax_errors_edit" id="first_name_error_edit"> </span>
  </div>


  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="last_name_label_edit"></span> Enter User Last Name</label>

    <input type="text" class="form-control ajax_input_edit" name="last_name" id="last_name_edit"  placeholder="Enter User Last Name">

    <span class="text-danger ajax_errors_edit" id="last_name_error_edit"> </span>

  </div>


<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="email_label_edit"></span> Enter User Email</label>

<input type="email" class="form-control ajax_input_edit" name="email" id="email_edit"  placeholder="Enter Email">

<span class="text-danger ajax_errors_edit" id="email_error_edit"> </span>

</div>


<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="joining_date_label_edit"></span> Enter User joining_date</label>

<input type="date" class="form-control ajax_input_edit" name="joining_date" id="joining_date_edit"  placeholder="Enter joining_date">

<span class="text-danger ajax_errors_edit" id="joining_date_error_edit"> </span>

</div>



<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="leaving_date_label_edit"></span> Enter User leaving_date</label>

<input type="date" class="form-control ajax_input_edit" name="leaving_date" id="leaving_date_edit"  placeholder="Enter leaving_date">

<span class="text-danger ajax_errors_edit" id="leaving_date_error_edit"> </span>

</div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="status_label_edit"></span>Select Account Status</label>

    <select name="status" id="select_status_edit"  class="select2" data-placeholder="Select status" style="width: 100%;">
    <option value="" id="select_status_from_db"></option>
    <option value="" id="already_selected_status_edit" selected>Select Account Status</option>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    <option value="pending">Pending</option>
    </select>


  <span class="text-danger ajax_errors_edit" id="status_error_edit"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="role_label_edit"></span>Select User Role</label>

    <select name="role" id="select_role_edit"  class="select2" data-placeholder="Select role" style="width: 100%;">
    <option value="" id="select_role_from_db"></option>
    <option value="" id="already_selected_role_edit" selected>Select User Role</option>
    <option value="admin">Admin</option>
    <option value="principals">Principals</option>
    <option value="assistants">Assistants</option>
    </select>


  <span class="text-danger ajax_errors_edit" id="role_error_edit"> </span>
</div>

        <input type="hidden" id="hiddeniduser" name="custId" value="">

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors_edit" id="error_edituserform"> </span>
        <span class="text-success ajax_errors_edit" id="success_edituserform"> </span>
      </div>
      </form>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){

    $('#editusermodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var user_id = button.data('id');
      // alert(button.data('id'));
      $.ajax({
          url: '{{URL::route("admindashboard.users.fetch")}}',
          type:"POST",
          data:{
            user_id:user_id,
          },
          success:function(response){
            if(response.status == true){
              console.log(response.data);
                $('#select_status_from_db').val(response.data.status);
                $('#select_status_from_db').html(response.data.status);
                $('#select_status_from_db').attr("selected");
                $('#already_selected_status_edit').removeAttr("selected");

                $('#select_role_from_db').val(response.data.roles[0].display_name);
                $('#select_role_from_db').html(response.data.roles[0].display_name);
                $('#select_role_from_db').attr("selected");
                $('#already_selected_role_edit').removeAttr("selected");

                $('#first_name_edit').val(response.data.first_name);
                $('#last_name_edit').val(response.data.last_name);
                $('#email_edit').val(response.data.email);
                $('#joining_date_edit').val(response.data.joining_date);
                $('#leaving_date_edit').val(response.data.leaving_date);
                $('#hiddeniduser').val(response.data.id);
            }
          }
         });
    });
    });
</script>
@endsection