@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Favicon Logo</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Header Logo</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">App Name</a>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="tab-content" id="nav-tabContent">
                <div class="custom-systemsettingstyle tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <form action="javascript:;" autocomplete="off" method="post" class="" id="files1" files="true" name="files" enctype="multipart/form-data" role="form">

                        <div class="form-group">
                           
                            <label for="exampleInputFile"> 
                            <span class="label_for_input label_success_form_3" id="favicon_logo_label"></span>
                            Favicon Logo
                            </label>

                            <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#favicon_logo_info" title="Click for more Info">
                            </i>

                            <div id="favicon_logo_info" class="collapse alert alert-info">
                                <strong>Info!</strong> Favicon logo is used in the top browser tab when the Portal loads <br/> It should be in same diemnsions and myst be png.
                            </div>

                            <div class="input-group">
                                <div class="custom-file">
                                <input name="favicon_logo" type="file" class="custom-file-input" id="favicon_logo">
                                <label class="custom-file-label favicon_logo_clear" for="exampleInputFile">Choose New Favicon Logo</label>
                                </div>
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
                    @isset($favicon_logo->setting_value)
                    <div class="row">
                  <div class="col-md-4">
                    <img src="
      {{ URL::asset('storage/system_files/'.$favicon_logo->setting_value) }}
      " alt="" class="img-thumbnail">
      </div>
              </div>
      @endif
                </div>

                <div class="custom-systemsettingstyle tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <form action="javascript:;" autocomplete="off" method="post" class="" id="files2" files="true" name="files" enctype="multipart/form-data" role="form">

<div class="form-group">
   
    <label for="exampleInputFile"> 
    <span class="label_for_input_2 label_success_form_2" id="header_logo_label"></span>
    Header Logo
    </label>

    <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#header_logo_info" title="Click for more Info">
    </i>

    <div id="header_logo_info" class="collapse alert alert-info">
        <strong>Info!</strong> Header logo must in jpeg format and size must be less than 2MB. Header logo is used for application logo in header and login page.
    </div>

    <div class="input-group">
        <div class="custom-file">
        <input name="header_logo" type="file" class="custom-file-input" id="header_logo">
        <label class="custom-file-label header_logo_clear" for="exampleInputFile">Choose New Header Logo</label>
        </div>
    </div>
    <span class="text-danger ajax_errors_2" id="personal_portfoliio_scan_error"> </span>
</div>

<div class="row">
<div class="col-12">
<input type="submit" value="Save Changes" class="btn btn-success float-right">
<span class="text-danger ajax_errors_2" id="errors_form_2"> </span>
<span class="text-success ajax_errors_2" id="success_form_2"> </span>
</div>
</div>
</form>

@isset($header_logo->setting_value)
                    <div class="row">
                  <div class="col-md-4">
                    <img src="
      {{ URL::asset('storage/system_files/'.$header_logo->setting_value) }}
      " alt="" class="img-thumbnail">
      </div>
              </div>
      @endif

                </div>
                <div class="custom-systemsettingstyle tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                <form action="javascript:;" autocomplete="off" method="post" class="" id="files3" files="true" name="files" enctype="multipart/form-data" role="form">








                <div class="form-group">
                <label for="exampleInputFile"> 
    <span class="label_for_input_3 label_success_form_3" id="app_name_label"></span>
    Application Name
    </label>

    <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#app_name_info" title="Click for more Info">
    </i>

    <div id="app_name_info" class="collapse alert alert-info">
        <strong>Info!</strong> Your application name will show on every page and will basically your company or organisation name.
    </div>

                @isset($app_name->setting_value)
               <input name="app_name" type="text" id="app_name" class="form-control ajax_input" value="{{$app_name->setting_value}}" placeholder="Enter Your Application Name" >
               @else
               <input name="app_name" type="text" id="app_name" class="form-control ajax_input" placeholder="Enter Your Application Name" >
               @endif
               <span class="text-danger ajax_errors_2" id="personal_portfoliio_scan_error"> </span>
              </div>


<div class="row">
<div class="col-12">
<input type="submit" value="Save Changes" class="btn btn-success float-right">
<span class="text-danger ajax_errors_2" id="errors_form_4"> </span>
<span class="text-success ajax_errors_2" id="success_form_4"> </span>
</div>
</div>
</form>
                </div>

                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection
  
@section('javascript')
<script>
//alert("javascript form dashboard_principal");
</script>
@endsection
@section('jquery')
<script>
  $(document).ready(function(){
    bsCustomFileInput.init();
        //this ajax request is modified for files upload


        $('#files3').on('submit',function(event){

$('#app_name').removeClass("is-invalid");
 $('.ajax_errors_2').empty(); 
 $('.label_for_input_3').empty();

 var app_name = $('#app_name').val();
 files = new FormData(this);


 $.ajax({
   url: '{{URL::route("admindashboard.systemsetting.updateappname")}}',
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
     $('#-app_name_label').append('<i style="color:#218838;" class="fas fa-check"></i>');
     $('#success_form_4').append(response.msg);
    }else{
     $('#errors_form_4').append(response.msg);
    }
   },
   error: function(jqXHR, exception){
     
     if (jqXHR.status == 422) {

         $('#errors_form_4').append(jqXHR.responseJSON.errors.app_name[0]);
         $('#app_name').addClass("is-invalid");
         $('#app_name_label').append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
     }
 },
  });
});


$('#files2').on('submit',function(event){

$('#header_logo').removeClass("is-invalid");
 $('.ajax_errors_2').empty(); 
 $('.label_for_input_2').empty();

 var header_logo = $('#header_logo').val();
 files = new FormData(this);

 $.ajax({
   url: '{{URL::route("admindashboard.systemsetting.updateheaderlogo")}}',
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
     $('#-header_logo_label').append('<i style="color:#218838;" class="fas fa-check"></i>');
     $('#success_form_2').append(response.msg);
    }else{
     $('#errors_form_2').append(response.msg);
    }
   },
   error: function(jqXHR, exception){
     
     if (jqXHR.status == 422) {

         $('#errors_form_4').append(jqXHR.responseJSON.errors.header_logo[0]);
         $('#header_logo').addClass("is-invalid");
         $('#header_logo_label').append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
     }
 },
  });
});

        


$('#files1').on('submit',function(event){

       $('#favicon_logo').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();

        var favicon_logo = $('#favicon_logo').val();
        files = new FormData(this);


        $.ajax({
          url: '{{URL::route("admindashboard.systemsetting.updatefavicon")}}',
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
            $('#-favicon_logo_label').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_form_3').append(response.msg);
           }else{
            $('#errors_form_3').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {

                $('#errors_form_3').append(jqXHR.responseJSON.errors.favicon_logo[0]);
                $('#favicon_logo').addClass("is-invalid");
                $('#favicon_logo_label').append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
            }
        },
         });
    });
    });
</script>
@endsection
