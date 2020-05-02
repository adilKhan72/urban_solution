@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <div class="timeline">


            @if ($projects != null || $projects != "" || isset($projects) )
            @foreach ($projects as $project)

            <div class="time-label">
                <span class="bg-blue">{{$project->started}} > {{$project->ended}}</span>
              </div>
              <div>
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
                    
                    <a class="btn btn-primary btn-sm">Edit</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                    
                  </div>
                </div>
              </div>
              
              @endforeach
              @else
              <div class="time-label">
                <span class="bg-red">No Project Found!</span>
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
    @endsection
  
  @section('javascript')
  <script>
  //alert("javascript form dashboard_principal");
  </script>
  @endsection
  @section('jquery')
  <script>
  $(document).ready(function(){
  //alert(" jquery form dashboard_principal");
  });
  </script>
  @endsection