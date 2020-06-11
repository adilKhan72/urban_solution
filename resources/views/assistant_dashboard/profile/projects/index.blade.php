@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <div class="timeline">
            <div class="time-label">
            <button type="button" id="create_project" class="btn btn-dark" data-toggle="modal" data-target="#createprojectmodal">Create New Project</button>
              </div>
            @if (count($projects) > 0)
            @foreach ($projects as $project)
            <div class="time-label" id="{{$project->id}}lab">
                <span class="bg-blue">
                From {{ \Carbon\Carbon::parse($project->started)->format('M-Y')}} To {{ \Carbon\Carbon::parse($project->ended)->format('M-Y')}}

                
                </span>
              </div>
              <div id="{{$project->id}}div">
                <i class="fas fa-info bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{$project->created_at->diffForHumans()}}</span>
                  <h3 class="timeline-header"><a >{{$project->project_name}}</a> ({{$project->client_name}})</h3>
                  <?php
                  $string1 = str_replace('"',"",$project->address);
                  $string2 = str_replace('[',"",$string1);
                  $string3 = str_replace(']',"",$string2);
                ?>
                  <h3 class="timeline-header">{{$string3}}</h3>
                  <div class="timeline-body">
                  {{$project->description}}
                  </div>
                  
                  <div class="timeline-footer">
                    
                    <a class="btn btn-primary btn-sm edit_project" data-toggle="modal" data-target="#editprojectmodal" data-id="{{$project->id}}" id="{{$project->id}}">Edit</a>

                    <a class="btn btn-danger btn-sm delete_project" value="{{$project->id}}" id="{{$project->id}}">Delete</a>
                    
                  </div>
                </div>
              </div>
              @endforeach
              @else
              <div class="time-label">
                <span class="bg-red">No Projects Found!</span>
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
    @include('admin_dashboard.profile.projects.editprojectmodal')
    @include('admin_dashboard.profile.projects.createprojectmodal')
    @endsection
  
  @section('javascript')
  <script>
  //alert("javascript form dashboard_principal");
  </script>
  @endsection
  @section('jquery')
  <script>
  $(document).ready(function(){

      // $('#create_project').click(function() {
      //   alert("Hello");
      // });
      
      $('.edit_project').click(function() {
        value = $(this).attr("id");
        //alert("Hello" + value);
      });

      $('.delete_project').click(function() {
        value = $(this).attr("id");
        //alert("Hello");
        $.ajax({
          url: '{{URL::route("assistantdashboard.profile.projects.delete")}}',
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