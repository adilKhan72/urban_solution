@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <div class="timeline">
            <div class="time-label">
            <button type="button" id="create_qualification" class="btn btn-dark" data-toggle="modal" data-target="#createqualificationmodal">Add New Qualification</button>
              </div>
            @if (count($qualifications) > 0)
            @foreach ($qualifications as $qualification)
            <div class="time-label" id="{{$qualification->id}}lab">
                <span class="bg-blue">
                From {{ \Carbon\Carbon::parse($qualification->from_date)->format('M-Y')}} To {{ \Carbon\Carbon::parse($qualification->to_date)->format('M-Y')}}
                </span>
              </div>
              <div id="{{$qualification->id}}div">
                <i class="fas fa-info bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{$qualification->created_at->diffForHumans()}}</span>
                  <h3 class="timeline-header"><a >{{$qualification->organisation}}</a> ({{$qualification->educationaldegree->title}})</h3>
                  <span class="time"><i class="fas fa-graduation-cap"> </i> {{$qualification->marks}} {{$qualification->marks_type}}</span>
                  <h3 class="timeline-header">{{$qualification->title}} </h3>
                  <div class="timeline-body">
                  <div class="row">
                  <div class="col-md-6">
                  {{$qualification->description}}
                  </div>
                  <div class="col-md-6">

                  @if ($qualification->transcript_scan != null)
                    <img src="{{ asset('storage/user_files/multi_transcript_scans/'.$qualification->transcript_scan) }}" class="img-fluid" alt="Transcript Image">
                  @else
                    <img src="{{ asset('storage/default_images/image-placeholder.jpg') }}" class="img-fluid img-thumbnail" alt="User Image">
                  @endif            
                  </div>
                  </div>
                  </div>
                  
                  <div class="timeline-footer">
                    
                    <a class="btn btn-primary btn-sm edit_qualification" data-toggle="modal" data-target="#editqualificationmodal" data-id="{{$qualification->id}}" id="{{$qualification->id}}">Edit</a>

                    <a class="btn btn-danger btn-sm delete_qualification" value="{{$qualification->id}}" id="{{$qualification->id}}">Delete</a>
                    
                  </div>
                </div>
              </div>
              @endforeach
              @else
              <div class="time-label">
                <span class="bg-red">No Qualifications Found!</span>
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
    @include('Principal_dashboard.profile.qualifications.editqualificationmodal')
    @include('Principal_dashboard.profile.qualifications.createqualificationmodal')
    @endsection
  
  @section('javascript')
  <script>
  //alert("javascript form dashboard_principal");
  </script>
  @endsection
  @section('jquery')
  <script>
  $(document).ready(function(){

    $('#select_educational_degree').select2({
      ajax: {
        url: '{{URL::route("educational_degree_select")}}',
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

    $('#select_educational_degree2').select2({
      ajax: {
        url: '{{URL::route("educational_degree_select")}}',
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
      // $('#create_qualification').click(function() {
      //   alert("Hello");
      // });
      
      $('.edit_qualification').click(function() {
        value = $(this).attr("id");
        //alert("Hello" + value);
      });

      $('.delete_qualification').click(function() {
        value = $(this).attr("id");
        //alert("Hello");
        $.ajax({
          url: '{{URL::route("principaldashboard.profile.qualitifcations.delete")}}',
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