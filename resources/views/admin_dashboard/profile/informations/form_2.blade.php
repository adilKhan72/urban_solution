<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Addresses</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <form action="javascript:;" autocomplete="off"  method="post" class="" id="addresses" name="addresses"   role="form">
            <div class="form-group">
                  <label> <span class="label_for_input label_success_form_2" id="city_id_label"></span>  Select your City</label>


                  <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#city_id_info" title="Click for more Info"></i>
                    <div id="city_id_info" class="collapse alert alert-info">
                    <strong>Info!</strong> City should be selected from the given list .it is required. you can search form db the list.
                    </div>



                  <select name="city_id" class="select2" id="select_city" data-placeholder="Select a State" style="width: 100%;">
                      @if ($user->userinformation != null && $user->userinformation->blood_group_id != '')
                      <option value="{{$user->userinformation->city_id}}" selected="">{{ $user->userinformation->city->title }}</option>
                      @endif
                  </select>
                  <span class="text-danger ajax_errors" id="city_id_error"> </span>
            </div>

              <div class="form-group">
                <label for="inputSpentBudget"> <span class="label_for_input label_success_form_2" id="country_id_label"></span> Select your Country</label>
                

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#country_id_info" title="Click for more Info"></i>
                    <div id="country_id_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Country should be selected from the given list .it is required. you can search form db the list.
                    </div>


                  
                
                <select name="country_id" class="select2" id="select_country" data-placeholder="Select a Country" style="width: 100%;">
                    @if ($user->userinformation != null && $user->userinformation->blood_group_id != '')
                    <option value="{{$user->userinformation->country_id}}" selected="">{{ $user->userinformation->country->title }}</option>
                    @endif
                </select>
                <span class="text-danger ajax_errors" id="country_id_error"> </span>

              </div>

              <div class="form-group">
                <label for="inputEstimatedDuration"> <span class="label_for_input label_success_form_2" id="primary_address_label"></span> Primary Address</label>
               
                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#primary_address_info" title="Click for more Info"></i>
                    <div id="primary_address_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Primary address should be entered as mentioned in the input .it is not required.
                    </div>

                @if ($user->userinformation != null && $user->userinformation->primary_address != null)
                <textarea name="primary_address" id="primary_address" class="form-control ajax_input" rows="3" value="{{$user->userinformation->primary_address}}"   placeholder="Enter Primary Address in the same order &#10; { Seperated with Comas, and type (underscore _ ) istead of space. } &#10; do not exceed 5 words of address every word seperated with coma &#10; e.g(House/Muhallah,Village/Town,City,Teh,Distt)"></textarea>
                @else                
                <textarea name="primary_address" id="primary_address" class="form-control ajax_input" rows="4"    placeholder="Enter Primary Address in the same order &#10; { Seperated with Comas, and type (underscore _ ) istead of space. } &#10; do not exceed 5 words of address every word seperated with coma &#10; e.g(House/Muhallah,Village/Town,City,Teh,Distt)"></textarea>
                @endif
                <span class="text-danger ajax_errors" id="primary_address_error"> </span>
              </div>

              <div class="form-group">
                <label for="inputEstimatedDuration">  <span class="label_for_input label_success_form_2" id="secondary_address_label"></span> Secondary Address</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#secondary_address_info" title="Click for more Info"></i>
                    <div id="secondary_address_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Secondary address can be put as the primary address .it is not required.
                    </div>

                @if ($user->userinformation != null && $user->userinformation->secondary_address != null)
                <textarea name="secondary_address" id="secondary_address" class="form-control ajax_input" rows="4" value="{{$user->userinformation->secondary_address}}"  placeholder="Enter Primary Address in the same order&#10; { Seperated with Comas, and type (underscore _ ) istead of space. } &#10; do not exceed 5 words of address every word seperated with coma &#10; e.g(House/Muhallah,Village/Town,City,Teh,Distt)"></textarea>

                @else
                <textarea name="secondary_address" id="secondary_address" class="form-control ajax_input" rows="4"  placeholder="Enter Primary Address in the same order &#10; { Seperated with Comas, and type (underscore _ ) istead of space. } &#10; do not exceed 5 words of address every word seperated with coma &#10; e.g(House/Muhallah,Village/Town,City,Teh,Distt)"></textarea>

                @endif
                <span class="text-danger ajax_errors" id="secondary_address_error"> </span>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration"> <span class="label_for_input label_success_form_2" id="google_location_pin_label"></span> Google Location Pin</label>

                <i class="fa fa-info-circle" style="color:#17a2b8"  data-toggle="collapse" data-target="#google_location_pin_info" title="Click for more Info"></i>
                    <div id="google_location_pin_info" class="collapse alert alert-info">
                    <strong>Info!</strong> Google location is the API details which will be shown here automatically. It is not required.
                    </div>

                @if ($user->userinformation != null && $user->userinformation->google_location_pin != null)
                <textarea name="google_location_pin" id="google_location_pin" class="form-control ajax_input" rows="4" value="{{$user->userinformation->google_location_pin}}"  placeholder="Google Location Pin e.g(copied from google API..one character string with no spacing)"></textarea>
                @else
                <textarea name="google_location_pin"id="google_location_pin" class="form-control ajax_input" rows="4" placeholder="Google Location Pin e.g(copied from google API.. one character string with no spacing)"></textarea>
                @endif
                <span class="text-danger ajax_errors" id="google_location_pin_error"> </span>
              </div>

              <div class="row">
                  <div class="col-12">
                  <input type="submit" value="Save Changes" class="btn btn-success float-right">
                  <span class="text-danger ajax_errors" id="errors_form_2"> </span>
                  <span class="text-success ajax_errors" id="success_form_2"> </span>
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
    $('#addresses').on('submit',function(event){
        $('.ajax_input').removeClass("is-invalid");
        $('.ajax_errors').empty(); 
        $('.label_for_input').empty();
        var city_id = $('#select_city').val();
        var country_id = $('#select_country').val();
        var primary_address = $('#primary_address').val();
        var secondary_address = $('#secondary_address').val();
        var google_location_pin = $('#google_location_pin').val();
        $.ajax({
          url: '{{URL::route("profile.informations.store")}}',
          type:"POST",
          data:{
            form:'form_2',
            city_id:city_id,
            country_id:country_id,
            primary_address:primary_address,
            secondary_address:secondary_address,
            google_location_pin:google_location_pin,
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
                title: '{{Session::get('form_success')}}'
              });
            $('.label_success_form_2').append('<i style="color:#218838;" class="fas fa-check"></i>');
            $('#success_form_2').append(response.msg);
           }else{
            $('#errors_form_2').append(response.msg);
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
    });
</script>
@endsection