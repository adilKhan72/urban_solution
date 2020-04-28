<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Gender Phone Date-Of-Birth & Blood-Group</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <form action="javascript:;" autocomplete="off" method="post" class="" id="gender_phone_bloog_group" name="gender_phone_bloog_group" role="form">
              
              <div class="form-group">
                <label for="gender"> <span class="label_for_input label_success_form_1" id="gender_label"></span>  Choose a Gender</label>


                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#gender_info" title="Click for more Info"></i>
                    <div id="gender_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Gender should be selected from the given list .it is required. you can search form db the list.
                    </div>



                <select name="gender" class="select2" id="select_gender" data-placeholder="Choose a Gender" style="width: 100%;">
                    @if ($user->userinformation->gender != '' )
                    <option value="{{$user->userinformation->gender}}" selected="">{{ $user->userinformation->gender }}</option>
                    @endif
                </select>
                <span class="text-danger ajax_errors" id="gender_error"> </span>
              </div>

              <div class="form-group">
              <label for="phone_number"> <span class="label_for_input label_success_form_1" id="phone_label"></span> Phone Number</label>



              <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#phone_info" title="Click for more Info"></i>
                    <div id="phone_info" class="collapse alert alert-info">
                    <strong>Info!</strong>  Phone number must be numbers, and must be more than 11 numbers and than 15. It is not required. 
                    </div>


                @if ($user->userinformation != null && $user->userinformation->phone != null)
                <input  name="phone" type="text" id="phone" class="form-control ajax_input" value="{{$user->userinformation->phone}}" placeholder="Enter Your Phone Number" >
                @else
                <input name="phone" type="text" id="phone" class="form-control ajax_input"  placeholder="Enter Your Phone Number">
                @endif
                <span class="text-danger ajax_errors" id="phone_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration"> <span class="label_for_input label_success_form_1" id="dob_label"></span> Date of Birth</label>


                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#dob_info" title="Click for more Info"></i>
                    <div id="dob_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Date of Birth number must be Valid DAte, and must be Before 2000/01/01. It is not required. 
                    </div>


                @if ($user->userinformation != null && $user->userinformation->phone != null)
                <input name="dob" type="date" id="dob" class="form-control ajax_input" value="{{$user->userinformation->dob}}" placeholder="Enter Your Date of Birth">
                @else
                <input name="dob" type="date" id="dob" class="form-control ajax_input" placeholder="Enter Your Date of Birth">
                @endif
                <span class="text-danger ajax_errors" id="dob_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration"> <span class="label_for_input label_success_form_1" id="blood_group_id_label"></span>  Blood Group</label>


                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#blood_group_id_info" title="Click for more Info"></i>
                    <div id="blood_group_id_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Blood Group should be selected from the given list .it is required. you can search form db the list.
                </div>

                <select name="blood_group_id" class="select2" id="select_blood_group" data-placeholder="Select a Blood Group" style="width: 100%;">
                @if ($user->userinformation != null && $user->userinformation->blood_group_id != '')
                <option value="{{$user->userinformation->blood_group_id}}" selected="">{{ $user->userinformation->bloodgroup->blood_type }}</option>
                @endif
                </select>
                <span class="text-danger ajax_errors" id="blood_group_id_error"> </span>
              </div>
              <div class="row">
                  <div class="col-12">
                  <input type="submit" value="Save Changes" class="btn btn-success float-right">
                  <span class="text-danger ajax_errors" id="errors_form_1"> </span>
                  <span class="text-success ajax_errors" id="success_form_1"> </span>
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
    $('#gender_phone_bloog_group').on('submit',function(event){
        $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty(); 
        var gender = $('#select_gender').val();
        var phone = $('#phone').val();
        var dob = $('#dob').val();
        var blood_group_id = $('#select_blood_group').val();
        $.ajax({
          url: '{{URL::route("profile.informations.store")}}',
          type:"POST",
          data:{
            form:'form_1',
            gender:gender,
            phone:phone,
            dob:dob,
            blood_group_id:blood_group_id,
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
                title: '{{Session::get('form_success')}}'
              });
            $('.label_success_form_1').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_form_1').append(response.msg);
           }else{
            $('#errors_form_1').append(response.msg);
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
        }
         });
        });
    });
</script>
@endsection