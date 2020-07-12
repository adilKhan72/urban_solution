<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Personal Files</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <form action="javascript:;" autocomplete="off" method="post" class="" id="files" files="true" name="files" enctype="multipart/form-data" role="form">
            <div class="form-group">
                    <label for="exampleInputFile"> <span class="label_for_input label_success_form_3" id="profile_pic_label"></span>Profile Picture</label>

                    <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#profile_pic_info" title="Click for more Info"></i>
                    <div id="profile_pic_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Profile Picture must in jpeg,jpg,png format. <br/> Profile dimension must be same. <br/> Maximum File Size 2 MB.<br/> You can replace your Profile Picture. If you already uploaded it already.
                    </div>

                    <div class="input-group">

                      @if ($user->profile_pic != "" || $user->profile_pic != null)
                      <div class="custom-file">
                      <input name="profile_pic" type="file" class="custom-file-input" id="profile_pic">
                      <label class="custom-file-label profile_pic_clear" for="exampleInputFile" style="border-color:#484745;">Replace the {{$user->profile_pic}}</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('profile_pic','profile_pic_clear','Replace the {{$user->profile_pic}}')">Clear</span>
                      </div>
                      @else
                      <div class="custom-file">
                      <input name="profile_pic" type="file" class="custom-file-input" id="profile_pic">
                      <label class="custom-file-label profile_pic_clear" for="exampleInputFile">Choose New Profile Picture</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('profile_pic','profile_pic_clear','Choose New Profile Picture')">Clear</span>
                      </div>
                      @endif
                       
                       
                      
                     
                      <!-- <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div> -->
                      
                    </div>
                    <span class="text-danger ajax_errors" id="profile_pic_error"> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">  <span class="label_for_input label_success_form_3" id="id_card_scan_label"></span> ID Card Picture</label>



                    <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#id_card_scan_info" title="Click for more Info"></i>
                    <div id="id_card_scan_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Id Card Picture must in jpeg,jpg,png format. <br/> Maximum File Size 2 MB.<br/> You can replace your Id Card Picture. If you already uploaded it already.
                    </div>


                    <div class="input-group">
                   
                      @if ($user->id_card_scan != "" || $user->id_card_scan != null)
                      <div class="custom-file">
                      <input name="id_card_scan" type="file" class="custom-file-input" id="id_card_scan">
                      <label class="custom-file-label id_card_scan_clear" for="exampleInputFile" style="border-color:#484745;">Replace the {{$user->id_card_scan}}</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('id_card_scan','id_card_scan_clear','Replace the {{$user->id_card_scan}}')">Clear</span>
                      </div>
                      @else
                      <div class="custom-file">
                      <input name="id_card_scan" type="file" class="custom-file-input" id="id_card_scan">
                      <label class="custom-file-label id_card_scan_clear" for="exampleInputFile">Choose New ID Card Picture</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('id_card_scan','id_card_scan_clear','Choose New ID Card Picture')">Clear</span>
                      </div>
                      @endif
                    

                      <!-- <div class="input-group-append">
                        <span class="input-group-text" id="id_card_scan_upload_button">Upload</span>
                      </div> -->
                    </div>
                    <span class="text-danger ajax_errors" id="id_card_scan_error"> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">  <span class="label_for_input label_success_form_3" id="cv_scan_label"></span> CV Picture</label>

                    <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#cv_scan_info" title="Click for more Info"></i>
                    <div id="cv_scan_info" class="collapse alert alert-info">
                    <strong>Info!</strong> CV Scan Picture must in jpeg,jpg,png format. <br/> Maximum File Size 2 MB.<br/> You can replace your CV Scan Picture. If you already uploaded it already.
                    </div>


                    <div class="input-group">
                      
                      @if ($user->cv_scan != "" || $user->cv_scan != null)
                      <div class="custom-file">
                      <input name="cv_scan" type="file" class="custom-file-input" id="cv_scan">
                      <label class="custom-file-label cv_scan_clear" for="exampleInputFile" style="border-color:#484745;">Replace the {{$user->cv_scan}}</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('cv_scan','cv_scan_clear','Replace the {{$user->cv_scan}}')">Clear</span>
                      </div>
                      @else
                      <div class="custom-file">
                      <input name="cv_scan" type="file" class="custom-file-input" id="cv_scan">
                      <label class="custom-file-label cv_scan_clear" for="exampleInputFile">Choose New CV Picture</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('cv_scan','cv_scan_clear','Choose New CV Picture')">Clear</span>
                      </div>
                      @endif

                   
                      <!-- <div class="input-group-append">
                        <span class="input-group-text" id="cv_scan_upload_button">Upload</span>
                      </div> -->
                    </div>
                    <span class="text-danger ajax_errors" id="cv_scan_error"> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile"> <span class="label_for_input label_success_form_3" id="police_clearance_scan_label"></span>  Police Clearance Picture</label>

                    <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#police_clearance_scan_info" title="Click for more Info"></i>
                    <div id="police_clearance_scan_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Plice Clearance Picture must in jpeg,jpg,png format. <br/> Maximum File Size 2 MB.<br/> You can replace your Plice Clearance Picture Picture. If you already uploaded it already.
                    </div>

                    <div class="input-group">
                      
                      @if ($user->police_clearance_scan != "" || $user->police_clearance_scan != null)
                      <div class="custom-file">
                      <input name="police_clearance_scan" type="file" class="custom-file-input" id="police_clearance_scan">
                        <label class="custom-file-label police_clearance_clear" for="exampleInputFile" style="border-color:#484745;">Replace the {{$user->police_clearance_scan}}</label>\
                        </div>
                        <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('personal_portfoliio_scan','personal_portfoliio_scan_clear','Replace the {{$user->police_clearance_scan}}')">Clear</span>
                      </div>
                      @else
                      <div class="custom-file">
                      <input name="police_clearance_scan" type="file" class="custom-file-input" id="police_clearance_scan">
                        <label class="custom-file-label police_clearance_clear" for="exampleInputFile">Choose New Police Clearance Picture</label>
                        </div>
                        <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('police_clearance_scan','police_clearance_clear','Choose New Police Clearance Picture')">Clear</span>
                      </div>
                      @endif

                      
                      <!-- <div class="input-group-append">
                        <span class="input-group-text" id="police_clearance_scan_scan_upload_button">Upload</span>
                      </div> -->
                    </div>
                    <span class="text-danger ajax_errors" id="police_clearance_scan_error"> </span>
                  </div>
                  <div class="form-group">
                    <label for="personal_portfoliio_scan">  <span class="label_for_input label_success_form_3" id="personal_portfoliio_scan_label"></span> Personal Portfolio Picture</label>

                    <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#personal_portfoliio_scan_info" title="Click for more Info"></i>
                    <div id="personal_portfoliio_scan_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Portfolio Picture must in jpeg,jpg,png format. <br/> Maximum File Size 2 MB.<br/> You can replace your Portfolio Picture. If you already uploaded it already.
                    </div>

                      <div class="input-group">
                      
                      @if ($user->personal_portfoliio_scan != "" || $user->personal_portfoliio_scan != null)
                      <div class="custom-file">
                      <input name="personal_portfoliio_scan"  type="file" class="custom-file-input" id="personal_portfoliio_scan">
                      <label class="custom-file-label personal_portfoliio_scan_clear" for="exampleInputFile" style="border-color:#484745;">Replace the {{$user->personal_portfoliio_scan}}</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('personal_portfoliio_scan','personal_portfoliio_scan_clear','Replace the {{$user->personal_portfoliio_scan}}')">Clear</span>
                      </div>
                      @else
                      <div class="custom-file">
                      <input name="personal_portfoliio_scan"  type="file" class="custom-file-input" id="personal_portfoliio_scan">
                      <label class="custom-file-label personal_portfoliio_scan_clear" for="personal_portfoliio_scan">Choose New Personal Portfolio Picture</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" onclick="clearFileInput('personal_portfoliio_scan','personal_portfoliio_scan_clear','Choose New Personal Portfolio Picture')">Clear</span>
                      </div>
                      @endif
                      
                      
                    </div>
                    <span class="text-danger ajax_errors" id="personal_portfoliio_scan_error"> </span>
                  </div>

                  <div class="row">
                  <div class="col-12">
                  <input type="submit" value="Save Changes" class="btn btn-success float-right">
                  <span class="text-danger ajax_errors" id="errors_form_3"> </span>
                  <span class="text-success ajax_errors" id="success_form_3"> </span>
                  </div>
              </div>

            </form>
            </div>
            <!-- /.card-body -->
          </div>
          @section('javascript')
          @parent
  <script>
      function clearFileInput(idd, cclass, messegee){
      $('#'+idd).val("");
      $('.'+cclass).text(messegee);
    }
  </script>
  @endsection

@section('jquery')
@parent
<script>
  $(document).ready(function(){



    bsCustomFileInput.init();



        //this ajax request is modified for files upload
        $('#files').on('submit',function(event){
       $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();
        var profile_pic = $('#profile_pic').val();
        var id_card_scan = $('#id_card_scan').val();
        var cv_scan = $('#cv_scan').val();
        var police_clearance_scan = $('#police_clearance_scan').val();
        var personal_portfoliio_scan = $('#personal_portfoliio_scan').val();
        files = new FormData(this);
        files.append('form','form_3');
        $.ajax({
          url: '{{URL::route("assistantdashboard.profile.informations.store")}}',
          type:"POST",
          dataType: "JSON",
          cache: false,
          contentType: false,
          processData: false,
          data:files,
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
            $('.label_success_form_3').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_form_3').append(response.msg);
           }else{
            $('#errors_form_3').append(response.msg);
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