<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Name Email & Password</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <form action="javascript:;" autocomplete="off"  method="post" class="" id="name_Email_password" name="name_Email_password" role="form">
              <div class="form-group">
                <label for="inputName"> <span class="label_for_input label_success_form_4" id="first_name_label"></span> First Name</label>

                <i class="fa fa-info-circle" style="color:#dc3545"  data-toggle="collapse" data-target="#first_name_info" title="Click for more Info"></i>
                <div id="first_name_info" class="collapse alert alert-danger">
                <strong>Warning!</strong>  First Name field is required. Field must be enter by admin.
                </div>

               @if ($user->first_name != null)
               <input name="first_name" type="text" id="first_name" class="form-control ajax_input" value="{{$user->first_name}}" placeholder="Enter Your First Name" disabled>
               @else
               <input name="first_name" type="text" id="first_name" class="form-control ajax_input" placeholder="Enter Your First Name" disabled>
               @endif
               <span class="text-danger ajax_errors" id="first_name_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputName"> <span class="label_for_input label_success_form_4" id="middle_name_label"></span> Middle  Name</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#middle_name_info" title="Click for more Info"></i>
                <div id="middle_name_info" class="collapse alert alert-info">
                <strong>Info!</strong> Middle Name Field is not Required. It must be a single Word.
                </div>


                @if ($user->middle_name != null)
                <input name="middle_name" type="text" id="middle_name" class="form-control ajax_input" value="{{$user->middle_name}}" placeholder="Enter Your Middle Name">
               @else
               <input name="middle_name" type="text" id="middle_name" class="form-control ajax_input" placeholder="Enter Your Middle Name">
               @endif
               <span class="text-danger ajax_errors" id="middle_name_error"> </span>
              </div>

              <div class="form-group">
                <label for="inputName"> <span class="label_for_input label_success_form_4" id="last_name_label"></span>  Last Name</label>

                <i class="fa fa-info-circle" style="color:#dc3545"  data-toggle="collapse" data-target="#last_name_info" title="Click for more Info"></i>
                <div id="last_name_info" class="collapse alert alert-danger">
                <strong>Info!</strong> Last Name Field is not Required. It must be a single Word. Field must be enter by admin.
                </div>
                

                @if ($user->last_name != null)
                <input name="last_name" type="text" id="last_name" class="form-control ajax_input" value="{{$user->last_name}}" placeholder="Enter Your Last Name" disabled>
               @else
               <input name="last_name" type="text" id="last_name" class="form-control ajax_input"  placeholder="Enter Your Last Name" disabled>
               @endif
               <span class="text-danger ajax_errors" id="last_name_error"> </span>
              
              </div>
              <div class="form-group">
                <label for="inputName"> <span class="label_for_input label_success_form_4" id="designation_label"></span>  Designation</label>

                <i class="fa fa-info-circle" style="color:#dc3545"  data-toggle="collapse" data-target="#designation_info" title="Click for more Info"></i>
                <div id="designation_info" class="collapse alert alert-danger">
                <strong>Info!</strong> Designation Field must be enter by admin.
                </div>

                @if ($user->designation != null)
                <input name="designation" type="text" id="designation" class="form-control ajax_input" value="{{$user->designation}}" placeholder="Enter Your designation" disabled>
               @else
               <input name="designation" type="text" id="designation" class="form-control ajax_input"  placeholder="Enter Your designation" disabled>
               @endif
               <span class="text-danger ajax_errors" id="designation_error"> </span>
              </div>

              <div class="form-group">
                <label for="inputName"> <span class="label_for_input label_success_form_4" id="email_label"></span>  Email</label>
                <i class="fa fa-info-circle" style="color:#dc3545"  data-toggle="collapse" data-target="#email_info" title="Click for more Info"></i>
                <div id="email_info" class="collapse alert alert-danger">
                <strong>Warning!</strong>  Email filed is required for login. Email should be reachable. <br/>Emails will be send to this email. Email should be unique. Field must be enter by admin.
                </div>
                @if ($user->email != null)
                <input type="email" name="email" class="form-control ajax_input" id="email" value="{{$user->email}}" placeholder="Enter Your Email" disabled>
                @else
                <input type="email" name="email" class="form-control ajax_input" id="email" placeholder="Enter Your Email" disabled>
                @endif
               <span class="text-danger ajax_errors" id="email_error"> </span>
                </div>
              <div class="form-group">
                <label for="inputName"> Password</label>
                <i class="fa fa-info-circle" style="color:#dc3545"  data-toggle="collapse" data-target="#password_info" title="Click for more Info"></i>
                <div id="password_info" class="collapse alert alert-danger">
                <strong>Danger!</strong> User Password can be reset from login page. <strong>RESET YOUR PASSWORD </strong>link is given on login page. <br/>
                  The Reset Password link will be sent to your email which is mentioned in this form.
                </div>
               <input name="password" type="password" class="form-control ajax_input" value="" id="password" placeholder="Enter Your New Password" disabled>
               <span class="text-danger ajax_errors" id="password_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputName"> Confirm Password </label>

                <i class="fa fa-info-circle" style="color:#dc3545"  data-toggle="collapse" data-target="#confirmInputPassword_info" title="Click for more Info"></i>
                <div id="confirmInputPassword_info" class="collapse alert alert-danger">
                <strong>Danger!</strong> Confirm password cannot be used as Password is disabled.
                </div>
               <input name="confirm-password" type="password" class="form-control ajax_input" value="" id="confirmInputPassword"  placeholder="Enter Confirm Password" disabled>
               <span class="text-danger ajax_errors" id="confirmInputPassword_error"> </span>
                
              </div>

              <div class="row">
                  <div class="col-12">
                  <input type="submit" value="Save Changes" class="btn btn-success float-right">
                  <span class="text-danger ajax_errors" id="errors_form_4"> </span>
                  <span class="text-success ajax_errors" id="success_form_4"> </span>
                  </div>
              </div>
              
            </form>
            </div>
            <!-- /.card-body -->
</div>
          <!-- /.card -->
          @section('jquery')
@parent
<script>
  $(document).ready(function(){
    bsCustomFileInput.init();
    $('#name_Email_password').on('submit',function(event){
        $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();
        var first_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirmInputPassword = $('#confirmInputPassword').val();
        $.ajax({
          url: '{{URL::route("principaldashboard.profile.informations.store")}}',
          type:"POST",
          data:{
            form:'form_4',
            first_name:first_name,
            middle_name:middle_name,
            last_name:last_name,
            email:email,
            password:password,
            confirmInputPassword:confirmInputPassword,
          },
          success:function(response){
              if(response.status == true){
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
               });
              Toast.fire({
                type: 'success',
                title: response.msg
              });
            $('.label_success_form_4').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_form_4').append(response.msg);
           }else{
            $('#errors_form_4').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {
              $.each(jqXHR.responseJSON.errors, function (key, value)
              { 
                var errorid = "#"+key+"_error";
                var id = "#"+key;
                var labelid = "#"+key+"_label";
                $(id).addClass("is-invalid");
                $(errorid).append(value);
                $(labelid).append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
              });
            }
        },
         });
    });
    });
</script>
@endsection