<div class="card card-default ">
            <div class="card-header cardheadercolor">
              <h3 class="card-title">Project Mouzas/Socities/Zones</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">



            



              <div class="form-group">
                <label for="inputproject_zone"> <span class="label_for_input" id="project_zone_label"></span>Project Zone</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_zone_info" title="Click for more Info"></i>

                <button type="button" id="create_zone" class="btn btn-tool" data-toggle="modal" data-target="#createzonemodal">Add New Zone</button>

                <div id="project_zone_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Unit is used for the area you defined above. Please ask the Client about project Unit before entering the project unit. Unit is used for automatic converstion from one unit to another.
                </div>

               <select name="project_zone" class="select2" id="select_project_zone" multiple="" data-placeholder="Select Unit for Area Above" style="width: 100%;">
                  </select>

               <span class="text-danger ajax_errors" id="project_zone_error"> </span>
              </div>


              <div class="form-group">
                <label for="inputproject_mouza"> <span class="label_for_input" id="project_mouza_label"></span>Project Mouza</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_mouza_info" title="Click for more Info"></i>

                <button type="button" id="create_mouza" class="btn btn-tool" data-toggle="modal" data-target="#createmouzamodal">Add New Mouza</button>

                <div id="project_mouza_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Unit is used for the area you defined above. Please ask the Client about project Unit before entering the project unit. Unit is used for automatic converstion from one unit to another.
                </div>

               <select name="project_mouza" class="select2" id="select_project_mouza" multiple="" data-placeholder="Select Unit for Area Above" style="width: 100%;">
                  </select>

               <span class="text-danger ajax_errors" id="project_mouza_error"> </span>
              </div>


              <div class="form-group">
                <label for="inputproject_societies"> <span class="label_for_input" id="project_societies_label"></span>Project Societies</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_societies_info" title="Click for more Info"></i>

                <button type="button" id="create_society" class="btn btn-tool" data-toggle="modal" data-target="#createsocietiemodal">Add New Societies</button>

                <div id="project_societies_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Unit is used for the area you defined above. Please ask the Client about project Unit before entering the project unit. Unit is used for automatic converstion from one unit to another.
                </div>

               <select name="project_societies" class="select2" id="select_project_societies" multiple="" data-placeholder="Select Unit for Area Above" style="width: 100%;">
                  </select>

               <span class="text-danger ajax_errors" id="project_societies_error"> </span>
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