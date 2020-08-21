@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
      <form action="javascript:;" autocomplete="off"  method="post" class="" id="newprojectform_1" name="newprojectform1" role="form">

      <div class="row">
     
     <div class="col-md-6">
      
      @include('admin_dashboard.project.newproject.forms.form_1')
      @include('admin_dashboard.project.newproject.forms.form_3')
     </div>
     <div class="col-md-6">
     @include('admin_dashboard.project.newproject.forms.form_4')
     @include('admin_dashboard.project.newproject.forms.form_2')
     </div>
     
     </div>
     </form>
      </div>
    </section>
    <!-- /.content -->

@include('admin_dashboard.project_setting.areaunit.createareaunitmodal')
@include('admin_dashboard.project_setting.societies.createsocietiemodal')
@include('admin_dashboard.project_setting.mouzas.createmouzamodal')
@include('admin_dashboard.project_setting.zones.createzonemodal')

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

  $('#createareaunitform').on('submit',function(event){
        $('.ajax_input_createareaunitform').removeClass("is-invalid");
        $('.ajax_errors_createareaunitform').empty(); 
        $('.label_for_input_createareaunitform').empty();
        files = new FormData(this);

        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.areaunits.store")}}',
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

            $('.label_success_createareaunitform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createareaunitform').append(response.msg);

            setTimeout(
                function() 
                {
                  $('#createareaunitmodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createareaunitform').append(response.msg);
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


    $('#createsocietieform').on('submit',function(event){
        $('.ajax_input_createsocietieform').removeClass("is-invalid");
        $('.ajax_errors_createsocietieform').empty(); 
        $('.label_for_input_createsocietieform').empty();
        files = new FormData(this);
        //files.append('form','createsocietieform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.societies.store")}}',
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

            $('.label_success_createsocietieform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createsocietieform').append(response.msg);

            setTimeout(
                function() 
                {

                  $('#createsocietiemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createsocietieform').append(response.msg);
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



    $('#createmouzaform').on('submit',function(event){
        $('.ajax_input_createmouzaform').removeClass("is-invalid");
        $('.ajax_errors_createmouzaform').empty(); 
        $('.label_for_input_createmouzaform').empty();
        files = new FormData(this);
        //files.append('form','createmouzaform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.mouzas.store")}}',
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

            $('.label_success_createmouzaform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createmouzaform').append(response.msg);

            setTimeout(
                function() 
                {

                  $('#createmouzamodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createmouzaform').append(response.msg);
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

    $('#createzoneform').on('submit',function(event){
        $('.ajax_input_createzoneform').removeClass("is-invalid");
        $('.ajax_errors_createzoneform').empty(); 
        $('.label_for_input_createzoneform').empty();
        files = new FormData(this);
        //files.append('form','createzoneform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.zones.store")}}',
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

            $('.label_success_createzoneform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createzoneform').append(response.msg);

            setTimeout(
                function() 
                {
                  $('#createzonemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createzoneform').append(response.msg);
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

  $('#select_project_unit').select2({
      ajax: {
        url: '{{URL::route("unit_for_area_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });


    $('#select_project_zone').select2({
      ajax: {
        url: '{{URL::route("project_zone_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });

    $('#select_project_mouza').select2({
      ajax: {
        url: '{{URL::route("project_mouza_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });

    $('#select_project_societies').select2({
      ajax: {
        url: '{{URL::route("project_societies_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });

    
    $('#select_project_requirement').select2({
      ajax: {
        url: '{{URL::route("project_requirement_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });



});
</script>
@endsection
