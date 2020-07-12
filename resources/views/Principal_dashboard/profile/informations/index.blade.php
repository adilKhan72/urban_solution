@extends('layouts.dashboards.app')

    @section('content')
    
            <!-- Main content -->
    <section class="content">
      <div class="row">
     
      <div class="col-md-6">
        @include('Principal_dashboard.profile.informations.form_1')
        @include('Principal_dashboard.profile.informations.form_2')
        @include('Principal_dashboard.profile.informations.form_3')
      </div>
      <div class="col-md-6">
        @include('Principal_dashboard.profile.informations.form_4')
        @include('Principal_dashboard.profile.informations.form_5')
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