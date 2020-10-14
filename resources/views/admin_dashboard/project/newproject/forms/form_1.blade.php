<div class="card card-default">
            <div class="card-header cardheadercolor">
              <h3 class="card-title">Project Basic Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">


           

            <div class="form-group">
                <label for="inputName"> <span class="label_for_input" id="project_name_label"></span> project_name</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_name_info" title="Click for more Info"></i>
                <div id="project_name_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project name before entering the project name.
                Project name should be unique from other project names in the database. You can leave the project name and inset it later on.
                </div>

               <input name="project_name" type="text" id="project_name" class="form-control ajax_input"  <?php if(isset($project) && !empty($project->name)){ echo "value='$project->name'"; }?> placeholder="Enter project_name" >


              
               <span class="text-danger ajax_errors" id="project_name_error"> </span>
              </div>


              <div class="form-group">
                <label for="inputarea"> <span class="label_for_input" id="project_area_label"></span> project_area</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_area_info" title="Click for more Info"></i>
                <div id="project_area_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project area before entering the project area.
                You cannot leave Area for the Project Empty.
                </div>

               <input name="project_area" type="text" id="project_area" class="form-control ajax_input" <?php if(isset($project) && !empty($project->area)){ echo "value='$project->area'"; }?> placeholder="Enter project_area" >

               <span class="text-danger ajax_errors" id="project_area_error"> </span>
              </div>


              <div class="form-group">
                <label for="inputunit"> <span class="label_for_input" id="project_unit_label"></span>Project Area Unit</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_unit_info" title="Click for more Info"></i>

                <button type="button" id="create_areaunit" class="btn btn-tool" data-toggle="modal" data-target="#createareaunitmodal">Add New Area Unit</button>

                <div id="project_unit_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Unit is used for the area you defined above. Please ask the Client about project Unit before entering the project unit. Unit is used for automatic converstion from one unit to another.
                </div>

               <select name="project_unit" class="select2 js-example-data-ajax form-control" id="select_project_unit" data-placeholder="Select Unit for Area Above" style="width: 100%;">
               <option 
               
               <?php if(isset($project) && !empty($project->projectunitforarea)){ echo "value=".$project->projectunitforarea->unitforarea->id; }?>

               selected="selected"><?php if(isset($project) && !empty($project->projectunitforarea)){ echo $project->projectunitforarea->unitforarea->unit_type." (In Sq Feets: ".$project->projectunitforarea->unitforarea->area_in_feet. ")";  }?></option>
               
                  </select>
               <span class="text-danger ajax_errors" id="project_unit_error"> </span>
              </div>



              <div class="form-group">
                <label for="inputarea"> <span class="label_for_input" id="expected_completion_date_label"></span>Expected Completion Date</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#expected_completion_date_info" title="Click for more Info"></i>
                <div id="expected_completion_date_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Discuss Expected date with client and finalize the project duration. Expected date for Project completion helps you track the project on time.
                </div>

               <input name="expected_completion_date" type="date" id="expected_completion_date" class="form-control ajax_input" <?php if(isset($project) && !empty($project->expected_completion_date)){ echo "value='$project->expected_completion_date'"; }?> placeholder="Enter expected_completion_date" >

               <span class="text-danger ajax_errors" id="expected_completion_date_error"> </span>
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