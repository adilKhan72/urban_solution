<div class="card card-default ">
            <div class="card-header cardheadercolor">
              <h3 class="card-title">Project Clients Contacts</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">



            



              <div class="form-group">
                <label for="inputproject_client"> <span class="label_for_input" id="project_client_label"></span>Project client</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#project_client_info" title="Click for more Info"></i>

                <button type="button" id="create_client" class="btn btn-tool" data-toggle="modal" data-target="#createclientmodal">Add New client</button>

                <div id="project_client_info" class="collapse alert alert-info">
                <strong>Information!</strong>  Unit is used for the area you defined above. Please ask the Client about project Unit before entering the project unit. Unit is used for automatic converstion from one unit to another.
                </div>

               <select name="project_client[]" class="select2" id="select_project_client" multiple="" data-placeholder="Select a Client" style="width: 100%;">

               
               
               <?php 
               
               if(isset($project) && !empty($project->projectclient)){ 
              
              
                foreach ($project->projectclient as $client) {
                  ?>
                  <option value="{{ $client->clientscontactuser->id }}" selected="selected">{{ $client->clientscontactuser->name }}</option>
                  <?php

                }
              
              }
              ?>


                  </select>

               <span class="text-danger ajax_errors" id="project_client_error"> </span>
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