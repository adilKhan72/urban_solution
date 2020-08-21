<!-- Modal -->
<div class="modal fade" id="editusermodal" tabindex="-1" role="dialog" aria-labelledby="editusermodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Edit user details</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="edituserform" name="edituserform" enctype=multipart/form-data role="form">


    <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="first_name_label_edit"></span> Enter User First Name</label>

    <i class="fa fa-info-circle text-info"   data-toggle="collapse" data-target="#first_name_info" title="Click for more Info"></i>
                <div id="first_name_info" class="collapse alert alert-info">
                <strong>Info!</strong>  First Name field is required.
                </div>


    <input type="text" class="form-control ajax_input_edit" name="first_name" id="first_name_edit"  placeholder="Enter User First Name">

    <span class="text-danger ajax_errors_edit" id="first_name_error_edit"> </span>
  </div>


  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="last_name_label_edit"></span> Enter User Last Name</label>


    <i class="fa fa-info-circle text-info"   data-toggle="collapse" data-target="#last_name_info" title="Click for more Info"></i>
                <div id="last_name_info" class="collapse alert alert-info">
                <strong>Info!</strong> Last Name Field is not Required. It must be a single Word.
                </div>


    <input type="text" class="form-control ajax_input_edit" name="last_name" id="last_name_edit"  placeholder="Enter User Last Name">

    <span class="text-danger ajax_errors_edit" id="last_name_error_edit"> </span>

  </div>

  <div class="form-group">

    <label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="designation_label_edit"></span> Enter User Designation</label>


    <i class="fa fa-info-circle text-info"   data-toggle="collapse" data-target="#designation_info" title="Click for more Info"></i>
                <div id="designation_info" class="collapse alert alert-info">
                <strong>Info!</strong> Designation is important to know the role of the user.
                </div>


    <input type="text" class="form-control ajax_input_edit" name="designation" id="designation_edit"  placeholder="Enter User Designation">

    <span class="text-danger ajax_errors_edit" id="designation_error_edit"> </span>

  </div>


<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="email_label_edit"></span> Enter User Email</label>



<i class="fa fa-info-circle text-info"   data-toggle="collapse" data-target="#email_info" title="Click for more Info"></i>
                <div id="email_info" class="collapse alert alert-info">
                <strong>Info!</strong>  Email filed is required for login. Email should be reachable. <br/>Emails will be send to this email. Email should be unique.
                </div>

<input type="email" class="form-control ajax_input_edit" name="email" id="email_edit"  placeholder="Enter Email">

<span class="text-danger ajax_errors_edit" id="email_error_edit"> </span>

</div>


<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="joining_date_label_edit"></span> Enter User joining_date</label>

<i class="fa fa-info-circle text-info"  data-toggle="collapse" data-target="#joining_date_info" title="Click for more Info"></i>
<div id="joining_date_info" class="collapse alert alert-info">
<strong>Info!</strong> Joining date must be a valid date. it is required. The employee number is populated by joining data. Please Avoid Updating Joing date.
</div>

<input type="date" class="form-control ajax_input_edit" name="joining_date" id="joining_date_edit"  placeholder="Enter joining_date">

<span class="text-danger ajax_errors_edit" id="joining_date_error_edit"> </span>

</div>



<div class="form-group">

<label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="leaving_date_label_edit"></span> Enter User leaving_date</label>

<i class="fa fa-info-circle text-info"   data-toggle="collapse" data-target="#leaving_date_info" title="Click for more Info"></i>
                <div id="leaving_date_info" class="collapse alert alert-info">
                <strong>Info!</strong> Only leave date put If the employee left the Company.
                </div>



<input type="date" class="form-control ajax_input_edit" name="leaving_date" id="leaving_date_edit"  placeholder="Enter leaving_date">

<span class="text-danger ajax_errors_edit" id="leaving_date_error_edit"> </span>

</div>


  <div class="form-group">
    <label for="exampleInputEmail1"> <span class="label_for_input label_success_edituserform" id="status_label_edit"></span>Select Account Status</label>


    <i class="fa fa-info-circle text-info" data-toggle="collapse" data-target="#status_info" title="Click for more Info"></i>
                <div id="status_info" class="collapse alert alert-info">
                <strong>Info!</strong> If status is not active the user wont be able to login to this portal. Defining a status is very important.
                </div>


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

    <i class="fa fa-info-circle text-info" data-toggle="collapse" data-target="#role_info" title="Click for more Info"></i>
                <div id="role_info" class="collapse alert alert-info">
                <strong>Info!</strong> Defining a specific role will define the user tasks and access level.
                </div>


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
                $('#designation_edit').val(response.data.designation);
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