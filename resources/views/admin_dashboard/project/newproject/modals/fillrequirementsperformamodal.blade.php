<!-- Modal -->
<div class="modal fade" id="fillrequirementsperformamodal" tabindex="-1" role="dialog" aria-labelledby="fillrequirementsperformamodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="fillrequirementsperformaModalLabeltype"> No Requirements Performa Selected  </h5>
        
        <button type="button" style="color:white" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="">
        
      <div class="card" id="addformfieldsofrequirementperformaafterheading">
  <div class="card-body" id="fillrequirementsperformaModalLabeldiscription">
    Please select a requirement performa from the dropdownlist
  </div>
</div>


  <input type="hidden" id="requirements_performa_id" name="custom_requirements_performa_id" value="">




      </div>
      <div class="modal-footer">
      <button type="" class="btn btn-primary" class="close" data-dismiss="modal" aria-label="Close">Done!</button>
      </div>
    
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){



    $('#fillrequirementsperformamodal').on('shown.bs.modal', function (e) {

      var requirements_performa_id = $("#requirements_performa_id").val();
      $.ajax({
          url: '{{URL::route("admindashboard.projecttab.fetchrequirementsperformadetails")}}',
          type:"POST",
          data:{
            requirements_performa_id:requirements_performa_id,
          },
          success:function(response){
            if(response.status == true){

              $.each(response.data[0].requirementcustomfield, function( index, value ) {
                console.log(value.filed_name);
                $('<div class="form-group reqanswercusfieldstodltclass"><label for="inputarea"> <span class="label_for_input" id="req_cus_field_answer_answer_label"></span>'+value.filed_name+' </label><i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#aaa'+value.id+' " title="Click for more Info"></i><div id="aaa'+value.id+'" class="collapse alert alert-info"><strong>Discription:</strong> '+value.field_value+'</div><input type="hidden" id="req_cus_field_answer_answer_id" name="req_cus_field_answer_answer_id[]" value="'+value.id+'"><textarea name="req_cus_field_answer_answer[]" type="text" id="req_cus_field_answer_answer" data-id="'+value.id+'" class="form-control ajax_input" value="" placeholder="Enter: '+value.filed_name+' Answer" >'+value.filed_name+'</textarea><span class="text-danger ajax_errors" id="req_cus_field_answer_answer_error"> </span></div>').insertAfter("#addformfieldsofrequirementperformaafterheading");
              });


              $("#fillrequirementsperformaModalLabeltype").html("<span class='badge badge-light'> Title:  " + response.data[0].type + "</span>");

              $("#fillrequirementsperformaModalLabeldiscription").html(" <span > <b> Discription:</b> " + response.data[0].discription + "</span>");

                //console.log(response.data[0].discription + " || " +response.data[0].type);
                // $('#area_in_feet_edit').val(response.data.area_in_feet);
                // $('#unit_type_edit').val(response.data.unit_type);
                // $('#hiddenidareaunit').val(response.data.id);
            }
          }
         });


    });


    });

</script>
@endsection