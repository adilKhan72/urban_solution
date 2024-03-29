@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <div class="timeline">
            <div class="time-label">
            <button type="button" id="create_experience" class="btn btn-dark" data-toggle="modal" data-target="#createexperiencemodal">Add New experience</button>
              </div>
            @if (count($experiences) > 0)
            @foreach ($experiences as $experience)
            <div class="time-label" id="{{$experience->id}}lab">
                <span class="bg-blue">From {{ \Carbon\Carbon::parse($experience->from_date)->format('M-Y')}} To {{ \Carbon\Carbon::parse($experience->to_date)->format('M-Y')}}</span>
              </div>
              <div id="{{$experience->id}}div">
                <i class="fas fa-info bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{$experience->created_at->diffForHumans()}}</span>
                  <h3 class="timeline-header"><a >{{$experience->organisation}}</a> ({{$experience->designation}})</h3>
                  <div class="timeline-body">
                  <div class="row">
                  <div class="col-md-6">
                  {{$experience->description}}
                  </div>
                  <div class="col-md-6">
                  @if ($experience->experience_letter_scan != null)
                    <img src="{{ asset('storage/user_files/multi_experience_letter_scans/'.$experience->experience_letter_scan) }}" class="img-fluid" alt="Experience Image">
                  @else
                    <img src="{{ asset('storage/default_images/image-placeholder.jpg') }}" class="img-fluid img-thumbnail" alt="User Image">
                  @endif

                  </div>
                  </div>
                  </div>
                  
                  <div class="timeline-footer">
                    
                    <a class="btn btn-primary btn-sm edit_experience" data-toggle="modal" data-target="#editexperiencemodal" data-id="{{$experience->id}}" id="{{$experience->id}}">Edit</a>

                    <a class="btn btn-danger btn-sm delete_experience" value="{{$experience->id}}" id="{{$experience->id}}">Delete</a>
                    
                  </div>
                </div>
              </div>
              @endforeach
              @else
              <div class="time-label">
                <span class="bg-red">No experiences Found!</span>
              </div>
              @endif
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
    @include('Principal_dashboard.profile.experiences.editexperiencemodal')
    @include('Principal_dashboard.profile.experiences.createexperiencemodal')
    @endsection
  
  @section('javascript')
  <script>
  //alert("javascript form dashboard_principal");
  </script>
  @endsection
  @section('jquery')
  <script>
  $(document).ready(function(){


      // $('#create_experience').click(function() {
      //   alert("Hello");
      // });
      
      $('.edit_experience').click(function() {
        value = $(this).attr("id");
        //alert("Hello" + value);
      });

      $('.delete_experience').click(function() {
        value = $(this).attr("id");
        //alert("Hello");
        $.ajax({
          url: '{{URL::route("principaldashboard.profile.experiences.delete")}}',
          type:"POST",
          data:{
            id:value,
          },
          success:function(response){
            if(response.status == true){
              $("#"+value+"lab").remove();
              $("#"+value+"div").remove();
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

            }
          }
         });

      });

  });
  </script>
  @endsection