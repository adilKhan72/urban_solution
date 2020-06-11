<!-- Modal -->
<div class="modal fade" id="createusermodal" tabindex="-1" role="dialog" aria-labelledby="createusermodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form action="javascript:;" autocomplete="off"  enctype=multipart/form-data method="post" class="" id="createuserform" name="createuserform" role="form">

  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="first_name_label"></span> Enter User First Name</label>

    <input type="text" class="form-control ajax_input" name="first_name" id="first_name"  placeholder="Enter First Name">

    <span class="text-danger ajax_errors" id="first_name_error"> </span>

  </div>

  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="last_name_label"></span> Enter User Last Name</label>

    <input type="text" class="form-control ajax_input" name="last_name" id="last_name"  placeholder="Enter Last Name">

    <span class="text-danger ajax_errors" id="last_name_error"> </span>

  </div>


<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="email_label"></span> Enter User Email</label>

<input type="email" class="form-control ajax_input" name="email" id="email"  placeholder="Enter Email">

<span class="text-danger ajax_errors" id="email_error"> </span>

</div>


<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="joining_date_label"></span> Enter User joining_date</label>

<input type="date" class="form-control ajax_input" name="joining_date" id="joining_date"  placeholder="Enter joining_date">

<span class="text-danger ajax_errors" id="joining_date_error"> </span>

</div>


<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="password_label"></span> Enter User password</label>

<input type="password" class="form-control ajax_input" name="password" id="password"  placeholder="Enter password">

<span class="text-danger ajax_errors" id="password_error"> </span>

</div>


<div class="form-group">
<label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="password_confirmation_label"></span> Enter Password Confirmation</label>
 
   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" id="password_confirmation" required autocomplete="new-password_confirmation">
   <span class="text-danger ajax_errors" id="password_confirmation_error"> </span>
</div>

<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="leaving_date_label"></span> Enter User leaving_date</label>

<input type="date" class="form-control ajax_input" name="leaving_date" id="leaving_date"  placeholder="Enter leaving_date">

<span class="text-danger ajax_errors" id="leaving_date_error"> </span>

</div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="status_label"></span>Select Account Status</label>

    <select name="status" id="select_status"  class="select2" data-placeholder="Select status" style="width: 100%;">
    <option value="" selected>Select Account Status</option>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    <option value="pending">Pending</option>
    </select>


  <span class="text-danger ajax_errors" id="status_error"> </span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_createuserform" id="role_label"></span>Select User Role</label>

    <select name="role" id="select_role"  class="select2" data-placeholder="Select role" style="width: 100%;">
    <option value="" selected>Select User Role</option>
    <option value="admin">Admin</option>
    <option value="principals">Principals</option>
    <option value="assistants">Assistants</option>
    </select>


  <span class="text-danger ajax_errors" id="role_error"> </span>
</div>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <span class="text-danger ajax_errors" id="error_createuserform"> </span>
        <span class="text-success ajax_errors" id="success_createuserform"> </span>
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