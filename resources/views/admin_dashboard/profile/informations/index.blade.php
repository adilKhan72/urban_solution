@extends('layouts.dashboards.app')

    @section('content')
    
            <!-- Main content -->
    <section class="content">
      <div class="row">
     
        <div class="col-md-6">

        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Gender Phone Date-Of-Birth & Blood-Group</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="gender">Choose a Gender</label>

                <select name="gender" class="select2" id="select_gender" data-placeholder="Choose a Gender" style="width: 100%;">

                    @if ($user->userinformation->gender != '' )
                    <option value="{{$user->userinformation->gender}}" selected="">{{ $user->userinformation->gender }}</option>
                    @endif

                </select>




              </div>
              <div class="form-group">
                <label for="phone_number">Phone Number</label>
                @if ($user->userinformation != null && $user->userinformation->phone != null)
                <input  name="phone" type="text" id="phone" class="form-control" value="{{$user->userinformation->phone}}" placeholder="Enter Your Phone Number" >
                @else
                <input name="phone" type="text" id="phone" class="form-control"  placeholder="Enter Your Phone Number">
                @endif
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Date of Birth</label>
                @if ($user->userinformation != null && $user->userinformation->phone != null)
                <input name="dob" type="date" id="dob" class="form-control" value="{{$user->userinformation->dob}}" placeholder="Enter Your Date of Birth">
                @else
                <input name="dob" type="date" id="dob" class="form-control" placeholder="Enter Your Date of Birth">
                @endif
                
              </div>

              <div class="form-group">
                <label for="inputEstimatedDuration">Blood Group</label>
                <select name="blood_group_id" class="select2" id="select_blood_group" data-placeholder="Select a Blood Group" style="width: 100%;">
                @if ($user->userinformation != null && $user->userinformation->blood_group_id != '')
                <option value="{{$user->userinformation->blood_group_id}}" selected="">{{ $user->userinformation->bloodgroup->blood_type }}</option>
                @endif
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Addresses</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="form-group">
                  <label>Select your City</label>
                  <select name="city_id" class="select2" id="select_city" data-placeholder="Select a State" style="width: 100%;">
                      @if ($user->userinformation != null && $user->userinformation->blood_group_id != '')

                      <option value="{{$user->userinformation->city_id}}" selected="">{{ $user->userinformation->city->title }}</option>
                      @endif
                  </select>
            </div>
              <div class="form-group">
                <label for="inputSpentBudget">Select your Country</label>
                
                <select name="country_id" class="select2" id="select_country" data-placeholder="Select a Country" style="width: 100%;">
                    @if ($user->userinformation != null && $user->userinformation->blood_group_id != '')

                    <option value="{{$user->userinformation->country_id}}" selected="">{{ $user->userinformation->country->title }}</option>
                    @endif
                </select>


              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Primary Address</label>
                @if ($user->userinformation != null && $user->userinformation->primary_address != null)
                <textarea name="primary_address" id="primary_address" class="form-control" rows="3" value="{{$user->userinformation->primary_address}}" placeholder="Enter Primary Address e.g(house ,town, city, teh, distt)"></textarea>
                @else                
                <textarea name="primary_address" id="primary_address" class="form-control" rows="4"  placeholder="Enter Primary Address in the same order &#10; e.g(House/Muhallah, &#10;Village/Town, &#10;City, &#10;Teh, &#10;Distt)"></textarea>
                @endif
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Secondary Address</label>
                @if ($user->userinformation != null && $user->userinformation->secondary_address != null)
                <textarea name="secondary_address" id="secondary_address" class="form-control" rows="4" value="{{$user->userinformation->secondary_address}}"  placeholder="Enter Primary Address in the same order &#10; e.g(House/Muhallah, &#10;Village/Town, &#10;City, &#10;Teh, &#10;Distt)"></textarea>

                @else
                <textarea name="secondary_address" id="secondary_address" class="form-control" rows="4"  placeholder="Enter Primary Address in the same order &#10; e.g(House/Muhallah, &#10;Village/Town, &#10;City, &#10;Teh, &#10;Distt)"></textarea>

                @endif
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Google Location Pin</label>
                @if ($user->userinformation != null && $user->userinformation->google_location_pin != null)
                <textarea name="google_location_pin" id="google_location_pin" class="form-control" rows="4" value="{{$user->userinformation->google_location_pin}}"  placeholder="Google Location Pin e.g(copied from google API..)"></textarea>
                @else
                <textarea name="google_location_pin"id="google_location_pin" class="form-control" rows="4" placeholder="Google Location Pin e.g(copied from google API..)"></textarea>
                @endif
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
  



          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Personal Files</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="form-group">
                    <label for="exampleInputFile">Profile Picture</label>
                    <div class="input-group">
                      <div class="custom-file">

                        <input name="profile_pic" type="file" class="custom-file-input" id="exampleInputFile" >

                        <label class="custom-file-label" for="exampleInputFile">Choose Profile Picture</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">ID Card Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="id_card_scan" type="file" class="custom-file-input" id="id_card_scan">
                        <label class="custom-file-label" for="exampleInputFile">Choose ID Card Picture</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="id_card_scan_upload_button">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">CV Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="cv_scan" type="file" class="custom-file-input" id="cv_scan">
                        <label class="custom-file-label" for="exampleInputFile">Choose CV Picture</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="cv_scan_upload_button">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Police Clearance Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="police_clearance_scan" type="file" class="custom-file-input" id="police_clearance_scan">
                        <label class="custom-file-label" for="exampleInputFile">Choose Police Clearance Picture</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="police_clearance_scan_upload_button">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Personal Portfolio Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="personal_portfoliio_scan" value="asdfsad" type="file" class="custom-file-input" id="personal_portfoliio_scan">
                        <label class="custom-file-label" for="exampleInputFile">Choose Personal Portfolio Picture</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="personal_portfoliio_scan_upload_button">Upload</span>
                      </div>
                    </div>
                  </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Name Email & Password</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">First Name</label>
                @if ($user->first_name != null)
              <input name="first_name" type="text" id="first_name" class="form-control" value="{{$user->first_name}}" placeholder="Enter Your First Name">
               @else
               <input name="first_name" type="text" id="first_name" class="form-control" placeholder="Enter Your First Name">
               @endif
                
              </div>
              <div class="form-group">
                <label for="inputName">Middle Name</label>
                @if ($user->middle_name != null)
                <input name="middle_name" type="text" id="middle_name" class="form-control" value="{{$user->middle_name}}" placeholder="Enter Your Middle Name">
               @else
               <input name="middle_name" type="text" id="middle_name" class="form-control" placeholder="Enter Your Middle Name">
               @endif
               
              </div>
              <div class="form-group">
                <label for="inputName">Last Name</label>
                @if ($user->last_name != null)
                <input name="last_name" type="text" id="last_name" class="form-control" value="{{$user->last_name}}" placeholder="Enter Your Last Name">
               @else
               <input name="last_name" type="text" id="last_name" class="form-control"  placeholder="Enter Your Last Name">
               @endif
                
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                @if ($user->email != null)
                <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Enter Your Email">
               @else
               <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
               @endif
                
              </div>
              <div class="form-group">
                <label for="inputName">Password</label>
          
               <input name="password" type="password" class="form-control" value="" id="password" placeholder="Enter Your New Password" disabled>
                
              </div>
              <div class="form-group">
                <label for="inputName">Confirm Password</label>
               
               <input name="confirm-password" type="password" class="form-control" value="" id="confirmInputPassword"  placeholder="Enter Confirm Password" disabled>
              
                
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Dates Numbers & Discriptions</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Joining Date</label>
                @if ($user->joining_date != null)
                  <input name="joining_date" type="date" id="joining_date" class="form-control" value="{{$user->joining_date}}" placeholder="Enter Your Joining Date">
                @else
                  <input name="joining_date" type="date" id="joining_date" class="form-control" placeholder="Enter Your Joining Date">
                @endif

              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Leaving Date</label>
                @if ($user->leaving_date != null)
                <input name="leaving_date" type="date" id="leaving_date" class="form-control" value="{$user->leaving_date}}" placeholder="Enter Your Leaving Date">
                @else
                <input name="leaving_date" type="date" id="leaving_date" class="form-control" placeholder="Enter Your Leaving Date">
                @endif
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Employee Status</label>

                <select name="status" class="select2" id="select_employee_status" data-placeholder="Select an Employee Status" style="width: 100%;">

                    @if ($user->status != '' )
                    <option value="{{$user->status}}" selected="">{{ $user->status }}</option>
                    @endif

                </select>

                

              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Id Card Number</label>

                @if ($user->id_card_number != null)
                <input name="id_card_number" type="text" id="id_card_number" class="form-control" value="{{$user->id_card_number}}" placeholder="Enter Your Id Card Number">
                @else
                <input name="id_card_number" type="text" id="id_card_number" class="form-control" placeholder="Enter Your Id Card Number">
                @endif

              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Employee Number</label>

                @if ($user->employee_number != null)
                <input name="employee_number" type="text" id="employee_number" class="form-control" value="{{$user->employee_number}}" placeholder="Enter Your Employee Number" readonly >
                @else
                <input name="employee_number" type="text" id="employee_number" class="form-control" placeholder="Enter Your Employee Number" readonly>
                @endif

              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Personal Description</label>

                @if ($user->description != null)
                <textarea name="description" id="description" class="form-control" value="$user->description" rows="3" placeholder="Enter about me discription..."></textarea>
                @else
                <textarea name="description" id="description" class="form-control"  rows="3" placeholder="Enter about me discription..."></textarea>
                @endif

              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->






        </div>
      
      </div>

    </section>
    <!-- /.content -->

    @endsection
  
  @section('javascript')
  <script>
  //alert("javascript form dashboard_principal");
  </script>
  @endsection
  @section('jquery')
  <script>
  $(document).ready(function(){

    $('#select_city').select2({
      ajax: {
        url: '{{URL::route("city_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });

    $('#select_country').select2({
      ajax: {
        url: '{{URL::route("country_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });
    


    $('#select_gender').select2({
      ajax: {
        url: '{{URL::route("user_select_gender")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });

    $('#select_employee_status').select2({
      ajax: {
        url: '{{URL::route("user_select_employee_status")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });
    

    
    $('#select_blood_group').select2({
      ajax: {
        url: '{{URL::route("blood_group_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });

  });

  </script>
  @endsection