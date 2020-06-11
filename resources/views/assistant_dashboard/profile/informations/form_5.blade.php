<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Dates Numbers & Discriptions</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <form action="javascript:;" autocomplete="off" method="post" class="" id="dates_numbers_Discriptions"  name="dates_numbers_Discriptions" role="form">
              <div class="form-group">
                <label for="inputEstimatedBudget"> <span class="label_for_input label_success_form_5" id="joining_date_label"></span> Joining Date</label>


                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#joining_date_info" title="Click for more Info"></i>
                <div id="joining_date_info" class="collapse alert alert-info">
                <strong>Info!</strong> Joining date must be a valid date. it is required
                </div>




                @if ($user->joining_date != null)
                  <input name="joining_date" type="date" id="joining_date" class="form-control ajax_input" value="{{$user->joining_date}}" placeholder="Enter Your Joining Date" >
                @else
                  <input name="joining_date" type="date" id="joining_date " class="form-control ajax_input" placeholder="Enter Your Joining Date" >
                @endif
                <span class="text-danger ajax_errors" id="joining_date_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration"> <span class="label_for_input label_success_form_5" id="id_card_number_label"></span> Id Card Number</label>


                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#id_card_number_info" title="Click for more Info"></i>
                <div id="id_card_number_info" class="collapse alert alert-info">
                <strong>Info!</strong> Id Card me be a valid CNIC number. 
                </div>


                @if ($user->id_card_number != null)
                <input name="id_card_number" type="text" id="id_card_number" class="form-control ajax_input" value="{{$user->id_card_number}}" placeholder="Enter Your Id Card Number">
                @else
                <input name="id_card_number" type="text" id="id_card_number" class="form-control ajax_input" placeholder="Enter Your Id Card Number">
                @endif
                <span class="text-danger ajax_errors" id="id_card_number_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration"> <span class="label_for_input label_success_form_5" id="description_label"></span> Personal Description</label>



                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#description_info" title="Click for more Info"></i>
                <div id="description_info" class="collapse alert alert-info">
                <strong>Info!</strong> User your personal description for your profile.
                </div>


              
                @if ($user->description != null)
                <textarea name="description" id="description" class="form-control ajax_input" value="$user->description" rows="3" placeholder="Enter about me discription..."></textarea>
                @else
                <textarea name="description" id="description" class="form-control ajax_input"  rows="3" placeholder="Enter about me discription..."></textarea>
                @endif
                <span class="text-danger ajax_errors" id="description_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget"> <span class="label_for_input label_success_form_5" id="leaving_date_label"></span> Leaving Date</label>



                
                <i class="fa fa-info-circle" style="color:#fd7e14"  data-toggle="collapse" data-target="#leaving_date_info" title="Click for more Info"></i>
                <div id="leaving_date_info" class="collapse alert alert-warning">
                <strong>Warning!</strong> Leave Date Is Disabled Because it can be put by super Admin from other area.
                </div>




                @if ($user->leaving_date != null)
                <input name="leaving_date" type="date" id="leaving_date" class="form-control ajax_input" value="{$user->leaving_date}}" placeholder="Enter Your Leaving Date" disabled>
                @else
                <input name="leaving_date" type="date" id="leaving_date" class="form-control ajax_input" placeholder="Enter Your Leaving Date" disabled>
                @endif
                <span class="text-danger ajax_errors" id="leaving_date_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration"> <span class="label_for_input label_success_form_5" id="status_label"></span> Employee Status</label>


                <i class="fa fa-info-circle" style="color:#dc3545"  data-toggle="collapse" data-target="#status_info" title="Click for more Info"></i>
                <div id="status_info" class="collapse alert alert-danger">
                <strong>Danger!</strong> Status is active by default and it can be changed from other place by admin. it is disabled.
                </div>


                <select name="status" class="select2" id="select_employee_status" data-placeholder="Select an Employee Status" style="width: 100%;" disabled>

                    @if ($user->status != '' )
                    <option value="{{$user->status}}" selected="">{{ $user->status }}</option>
                    @endif

                </select>

                <span class="text-danger ajax_errors" id="status_error"> </span>

              </div>


              <div class="form-group">
                <label for="inputEstimatedDuration"> <span class="label_for_input label_success_form_5" id="employee_number_label"></span> Employee Number</label>



                <i class="fa fa-info-circle" style="color:#dc3545"  data-toggle="collapse" data-target="#employee_number_info" title="Click for more Info"></i>
                <div id="employee_number_info" class="collapse alert alert-danger">
                <strong>Danger!</strong>  Leave Date Is Disabled Because it Populate Automatically when joining date field is entered.
                </div>



                @if ($user->employee_number != null)
                <input name="employee_number" type="text" id="employee_number" class="form-control" value="{{$user->employee_number}}" placeholder="Enter Your Employee Number" readonly >
                @else
                <input name="employee_number" type="text" id="employee_number" class="form-control" placeholder="Enter Your Employee Number" readonly>
                @endif
                <span class="text-danger ajax_errors" id="employee_number_error"> </span>
              </div>

              <div class="row">
                  <div class="col-12">
                  <input type="submit" value="Save Changes" class="btn btn-success float-right">
                  <span class="text-danger ajax_errors" id="errors_form_5"> </span>
                  <span class="text-success ajax_errors" id="success_form_5"> </span>
                  </div>
              </div>

            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


@section('jquery')
@parent
<script>
  $(document).ready(function(){
    bsCustomFileInput.init();
    $('#dates_numbers_Discriptions').on('submit',function(event){
        $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();
        var joining_date = $('#joining_date').val();
        var leaving_date = $('#leaving_date').val();
        var status = $('#select_employee_status').val();
        var id_card_number = $('#id_card_number').val();
        var employee_number = $('#employee_number').val();
        var description = $('#description').val();
        $.ajax({
          url: '{{URL::route("assistantdashboard.profile.informations.store")}}',
          type:"POST",
          data:{

            form:'form_5',
            joining_date:joining_date,
            leaving_date:leaving_date,
            status:status,
            id_card_number:id_card_number,
            employee_number:employee_number,
            description:description,
          },
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
            $('.label_success_form_5').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_form_5').append(response.msg);
           }else{
            $('#errors_form_5').append(response.msg);
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
        },
         });
    });
    });
</script>
@endsection