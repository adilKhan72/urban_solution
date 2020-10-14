<div class="card card-default">
            <div class="card-header cardheadercolor">
              <h3 class="card-title">Project Address</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">



            <div class="form-group">
                <label for="inputhome"> <span class="label_for_input" id="project_home_label"></span> project_home</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_home_info" title="Click for more Info"></i>
                <div id="project_home_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project home before entering the project home.
                 You can leave the project home and inset it later on.
                </div>

               <input name="project_home" type="text" id="project_home" class="form-control ajax_input" 
               
               <?php if(isset($project) &&  !empty($project->projectstreetaddress)){ echo "value=".$project->projectstreetaddress->home;} ?>

              placeholder="Enter project_home" >




               <span class="text-danger ajax_errors" id="project_home_error"> </span>
              </div>



              <div class="form-group">
                <label for="inputplot"> <span class="label_for_input" id="project_plot_label"></span> project_plot</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_plot_info" title="Click for more Info"></i>
                <div id="project_plot_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project plot before entering the project plot.
                 You can leave the project plot and inset it later on.
                </div>

               <input name="project_plot" type="text" id="project_plot" class="form-control ajax_input" 
               
               <?php if(isset($project) && !empty($project->projectstreetaddress)){ echo "value=".$project->projectstreetaddress->plot;} ?>

              placeholder="Enter project_plot" >

               <span class="text-danger ajax_errors" id="project_plot_error"> </span>
              </div>




              <div class="form-group">
                <label for="inputstreet"> <span class="label_for_input" id="project_street_label"></span> project_street</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_street_info" title="Click for more Info"></i>
                <div id="project_street_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project street before entering the project street.
                 You can leave the project street and inset it later on.
                </div>

               <input name="project_street" type="text" id="project_street" class="form-control ajax_input" 
               
               <?php if(isset($project) && !empty($project->projectstreetaddress)){ echo "value=".$project->projectstreetaddress->street;} ?>
               
                placeholder="Enter project_street" >

               <span class="text-danger ajax_errors" id="project_street_error"> </span>
              </div>



              <div class="form-group">
                <label for="inputphase"> <span class="label_for_input" id="project_phase_label"></span> project_phase</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_phase_info" title="Click for more Info"></i>
                <div id="project_phase_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project phase before entering the project phase.
                You can leave the project phase and inset it later on.
                </div>

               <input name="project_phase" type="text" id="project_phase" class="form-control ajax_input" 
               
               <?php if(isset($project) && !empty($project->projectstreetaddress)){ echo "value=".$project->projectstreetaddress->phase;} ?> 
              
              placeholder="Enter project_phase" >

               <span class="text-danger ajax_errors" id="project_phase_error"> </span>
              </div>



              <div class="form-group">
                <label for="inputsector"> <span class="label_for_input" id="project_sector_label"></span> project_sector</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_sector_info" title="Click for more Info"></i>
                <div id="project_sector_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project sector before entering the project sector.
                You can leave the project sector and inset it later on.
                </div>

               <input name="project_sector" type="text" id="project_sector" class="form-control ajax_input" 
               
               <?php if(isset($project) && !empty($project->projectstreetaddress)){ echo "value=".$project->projectstreetaddress->sector;} ?>

                placeholder="Enter project_sector" >

               <span class="text-danger ajax_errors" id="project_sector_error"> </span>
              </div>


              <div class="form-group">
                <label for="inputsociety"> <span class="label_for_input" id="project_society_label"></span> project_society</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_society_info" title="Click for more Info"></i>
                <div id="project_society_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project society before entering the project society.
                 You can leave the project society and inset it later on.
                </div>

               <input name="project_society" type="text" id="project_society" class="form-control ajax_input" 
               
               <?php if(isset($project) && !empty($project->projectstreetaddress)){ echo "value=".$project->projectstreetaddress->society;} ?>

                placeholder="Enter project_society" >

               <span class="text-danger ajax_errors" id="project_society_error"> </span>
              </div>




              <div class="form-group">
                <label for="inputcity"> <span class="label_for_input" id="project_city_label"></span> project_city</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_city_info" title="Click for more Info"></i>
                <div id="project_city_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Please ask the Client about project city before entering the project city.
                You can leave the project city and inset it later on.
                </div>

               <input name="project_city" type="text" id="project_city" class="form-control ajax_input" 
               
               <?php if(isset($project) && !empty($project->projectstreetaddress)){ echo "value=".$project->projectstreetaddress->city;} ?>

                placeholder="Enter project_city" >

               <span class="text-danger ajax_errors" id="project_city_error"> </span>
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