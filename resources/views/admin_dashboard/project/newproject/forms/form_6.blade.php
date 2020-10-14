<div class="card card-default ">
            <div class="card-header cardheadercolor">
              <h3 class="card-title"> project type </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">



            



              <div class="form-group">
                <label for="inputproject_project_type"> <span class="label_for_input" id="project_project_type_label"></span> project_type</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_project_type_info" title="Click for more Info"></i>




                <div id="project_project_type_info" class="collapse alert alert-info">
                <strong>Information!</strong>  project_type is used for the area you defined above. Please ask the project_type about project project_type before entering the project project_type. project_type is used for automatic converstion from one project_type to another.
                </div>

               <select name="project_project_type" class="select2" id="select_project_type" data-placeholder="Select Project Type" style="width: 100%;">
                  

                  <option 
               
               <?php if(isset($project) && !empty($project->projectscopeofprojectsubtype)){ echo "value=".$project->projectscopeofprojectsubtype->scopeofprojectsubtype->id; }?>

               selected="selected"><?php if(isset($project) && !empty($project->projectscopeofprojectsubtype)){ echo $project->projectscopeofprojectsubtype->scopeofprojectsubtype->name;  }?></option>



               </select>
               <span class="text-danger ajax_errors" id="project_project_type_error"> </span>
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