<div class="row">
     <div class="col-md-5 col-xl-5">
<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">scopes</h3>

              <div class="card-tools">
              <button type="button" id="create_scope" class="btn btn-dark " data-toggle="modal" data-target="#createscopemodal">Add scope</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="scopetable" class="table table-bordered table-hover">
                <thead>
                <tr>
                     <th>name</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>

          </div> 
</div>

<div class="col-md-7 col-xl-7">
<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Scope Sub Types</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="scopesubtypetable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>parent_scope</th>
                     <th>name</th>
                     <th>discription</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>

          </div> 
</div>
</div>
<div class="row">
     <div class="col-md-10 col-xl-10">
     <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">service Types</h3>

              <div class="card-tools">
              <button type="button" id="create_service" class="btn btn-dark " data-toggle="modal" data-target="#createservicemodal">Add service</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  
              </div>
            </div>
            <div class="card-body">
            <table id="servicetable" class="table table-bordered table-hover">
                <thead>
                <tr>

                     <th>name</th>
                     <th>discription</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>

          </div> 
     </div>
     </div>
@include('admin_dashboard.project_setting.scope_services.scopes.deletescopemodal')
@include('admin_dashboard.project_setting.scope_services.scopes.deletescopesubtypemodal')
@include('admin_dashboard.project_setting.scope_services.scopes.editscopemodalmodal')
@include('admin_dashboard.project_setting.scope_services.scopes.editscopesubtypemodalmodal')
@include('admin_dashboard.project_setting.scope_services.scopes.createscopemodal')
@include('admin_dashboard.project_setting.scope_services.scopes.createscopesubtypemodal')


@include('admin_dashboard.project_setting.scope_services.scopes.createservicemodal')
@include('admin_dashboard.project_setting.scope_services.scopes.deleteservicemodal')
@include('admin_dashboard.project_setting.scope_services.scopes.editservicemodal')
@section('jquery')
@parent
<script>
  $(document).ready(function(){


    var  datatbl_services = $('#servicetable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.scopeandservice.fetchservicedatatable")}}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'discription', name: 'discription' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });


    var  datatbl_scopes = $('#scopetable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.scopeandservice.fetchscopedatatable")}}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });


    var  datatbl_scopes_subtypes = $('#scopesubtypetable').DataTable({
    "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      processing: true,
      serverSide: true,
      ajax: '{{URL::route("admindashboard.projectsetting.scopeandservice.fetchscopesubtypedatatable")}}',
               columns: [
                        { data: 'parent_scope', name: 'parent_scope' },
                        { data: 'name', name: 'name' },
                        { data: 'discription', name: 'discription' },
                        { data: 'action', name: 'action',orderable: false,searchable: false,"className": "text-center"}
                     ]
    });


    bsCustomFileInput.init();


    $('#createserviceform').on('submit',function(event){
        $('.ajax_input_createserviceform').removeClass("is-invalid");
        $('.ajax_errors_createserviceform').empty(); 
        $('.label_for_input_createserviceform').empty();
        files = new FormData(this);
        //files.append('form','createserviceform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.storeservice")}}',
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

            $('.label_success_createserviceform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createserviceform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_services.draw();
                  $("#createserviceform")[0].reset();
                  $('#createservicemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createserviceform').append(response.msg);
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



    $('#createscopeform').on('submit',function(event){
        $('.ajax_input_createscopeform').removeClass("is-invalid");
        $('.ajax_errors_createscopeform').empty(); 
        $('.label_for_input_createscopeform').empty();
        files = new FormData(this);
        //files.append('form','createscopeform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.store")}}',
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

            $('.label_success_createscopeform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createscopeform').append(response.msg);

            setTimeout(
                function() 
                {
                  $("#createscopeform")[0].reset();
                  datatbl_scopes.draw();
                  $('#createscopemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createscopeform').append(response.msg);
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



    $('#createscopesubtypeform').on('submit',function(event){
        $('.ajax_input_createscopesubtypeform').removeClass("is-invalid");
        $('.ajax_errors_createscopesubtypeform').empty(); 
        $('.label_for_input_createscopesubtypeform').empty();
        files = new FormData(this);
        //files.append('form','createscopesubtypeform');
        
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.storesubtypes")}}',
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

            $('.label_success_createscopesubtypeform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_createscopesubtypeform').append(response.msg);

            setTimeout(
                function() 
                {
                  datatbl_scopes_subtypes.draw();
                  datatbl_scopes.draw();
                  $('#createscopesubtypemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_createscopesubtypeform').append(response.msg);
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


    $('#editscopesubtypeform').on('submit',function(event){
        $('.ajax_input_edit_editscopesubtypeform').removeClass("is-invalid");
        $('.ajax_errors_edit_editscopesubtypeform').empty(); 
        $('.label_for_input_editscopesubtypeform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.editsubtype")}}',
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

            $('.label_success_editscopesubtypeform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editscopesubtypeform').append(response.msg);
          
            setTimeout(
                function() 
                {
                  datatbl_scopes_subtypes.draw();
                $('#editscopesubtypemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editscopesubtypeform').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {
              $.each(jqXHR.responseJSON.errors, function (key, value)
              { 
                var errorid = "#"+key+"_error_edit";
                var id = "#"+key;
                var labelid = "#"+key+"_label_edit";
                $(id).addClass("is-invalid");
                $(errorid).append(value);
                $(labelid).append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
              });
            }
        }
         });
    });



    $('#editserviceform').on('submit',function(event){
        $('.ajax_input_edit_editserviceform').removeClass("is-invalid");
        $('.ajax_errors_edit_editserviceform').empty(); 
        $('.label_for_input_editserviceform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.editservice")}}',
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

            $('.label_success_editserviceform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editserviceform').append(response.msg);
          
            setTimeout(
                function() 
                {
                  datatbl_services.draw();
                $('#editservicemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editserviceform').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {
              $.each(jqXHR.responseJSON.errors, function (key, value)
              { 
                var errorid = "#"+key+"_error_edit";
                var id = "#"+key;
                var labelid = "#"+key+"_label_edit";
                $(id).addClass("is-invalid");
                $(errorid).append(value);
                $(labelid).append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
              });
            }
        }
         });
    });



    $('#editscopeform').on('submit',function(event){
        $('.ajax_input_edit_editscopeform').removeClass("is-invalid");
        $('.ajax_errors_edit_editscopeform').empty(); 
        $('.label_for_input_editscopeform').empty();
        files = new FormData(this);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.edit")}}',
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

            $('.label_success_editscopeform').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_editscopeform').append(response.msg);
          
            setTimeout(
                function() 
                {
                datatbl_scopes.draw();
                $('#editscopemodal').modal('hide');
                }, 1000);
           }else{
            $('#error_editscopeform').append(response.msg);
           }
          },
          error: function(jqXHR, exception){
            
            if (jqXHR.status == 422) {
              $.each(jqXHR.responseJSON.errors, function (key, value)
              { 
                var errorid = "#"+key+"_error_edit";
                var id = "#"+key;
                var labelid = "#"+key+"_label_edit";
                $(id).addClass("is-invalid");
                $(errorid).append(value);
                $(labelid).append('<i style="color:#dc3545;" class="far fa-times-circle "></i>');
              });
            }
        }
         });
    });



    $('.delete_button_id_service').click(function() {
        value = $(this).attr("id");
        //alert(value);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.deleteservice")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){
              
              datatbl_services.draw();
                $('#deleteservicemodal').modal('hide');

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

            }
          }
         });

      });











    $('.delete_button_id').click(function() {
        value = $(this).attr("id");
        //alert(value);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){
              
                datatbl_scopes_subtypes.draw();
                datatbl_scopes.draw();
                $('#deletescopemodal').modal('hide');

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

            }
          }
         });

      });



    $('.delete_scopesubtype_button_id').click(function() {
        value = $(this).attr("id");
        //alert(value);
        $.ajax({
          url: '{{URL::route("admindashboard.projectsetting.scopeandservice.deletesubtype")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){

            if(response.status == true){

              datatbl_scopes_subtypes.draw();
                $('#deletescopesubtypemodal').modal('hide');

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

            }
          }
         });

      });

    });
</script>
@endsection