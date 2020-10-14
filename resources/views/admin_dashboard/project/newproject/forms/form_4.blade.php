<div class="card card-default">
            <div class="card-header cardheadercolor">
              <h3 class="card-title">Project Requirements Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">






              <div class="form-group">
                <label for="inputrequirement"> <span class="label_for_input" id="project_requirement_label"></span>Project requirement</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_requirement_info" title="Click for more Info"></i>


                <button type="button" id="fillrequirementsperforma" class="btn btn-tool" data-toggle="modal" data-target="#fillrequirementsperformamodal">Edit/Fill This Requirement Performa</button>



                <div id="project_requirement_info" class="collapse alert alert-info">
                <strong>Information!</strong>  requirement is used for the area you defined above. Please ask the Client about project requirement before entering the project requirement. requirement is used for automatic converstion from one requirement to another.
                </div>

               <select name="project_requirement" class="select2" id="select_project_requirement" data-placeholder="Select requirement Performa" style="width: 100%;">
                
               <option 
               
               <?php if(isset($project) && !empty($project->reqcusfieldanswers)){ 
                 
                 echo "value=".$project->reqcusfieldanswers[0]->requirementcustomfield->requirementtype->id; 

                 }
                 ?>

               selected="selected">
               
               <?php

                if(isset($project) && !empty($project->reqcusfieldanswers)){ 
                  
                  echo $project->reqcusfieldanswers[0]->requirementcustomfield->requirementtype->type;  
                  
                  }
                  
                  ?>
               
               </option>
                
              </select>

               <span class="text-danger ajax_errors" id="project_requirement_error"> </span>
              </div>






            </div>
            <!-- /.card-body -->
          </div>        
          <!-- /.card -->

@include('admin_dashboard.project.newproject.modals.fillrequirementsperformamodal')
@section('jquery')
@parent
<script>
  $(document).ready(function(){


    $("#fillrequirementsperforma").click(function(){
      $('#requirements_performa_id').val("");
      $('#fillrequirementsperformamodal').modal({
        show: true
        });
    }); 


    $('#select_project_requirement').on('select2:select', function (e) {

      $('#requirements_performa_id').val(e.params.data.id);
      $('.reqanswercusfieldstodltclass').remove();
      $('#fillrequirementsperformamodal').modal({
        show: true
        });
    });



    });
</script>
@endsection