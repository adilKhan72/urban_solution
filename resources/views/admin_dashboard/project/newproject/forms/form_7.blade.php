<div class="card card-default ">
            <div class="card-header cardheadercolor">
              <h3 class="card-title">Project services Contacts</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">



            



              <div class="form-group">
                <label for="inputproject_service"> <span class="label_for_input" id="project_service_label"></span>Project service</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_service_info" title="Click for more Info"></i>

                <button type="button" id="create_service" class="btn btn-tool" data-toggle="modal" data-target="#createservicemodal">Add New service</button>

                <div id="project_service_info" class="collapse alert alert-info">
                <strong>Information!</strong>  service is used for the area you defined above. Please ask the service about project service before entering the project service. service is used for automatic converstion from one service to another.
                </div>

               <select name="project_service[]" class="select2" id="select_project_service" multiple="" data-placeholder="Select services " style="width: 100%;">
                  </select>

               <span class="text-danger ajax_errors" id="project_service_error"> </span>
              </div>





            </div>
            <!-- /.card-body -->
          </div>        
          <!-- /.card -->


@section('jquery')
@parent
<script>
  $(document).ready(function(){

    });
</script>
@endsection