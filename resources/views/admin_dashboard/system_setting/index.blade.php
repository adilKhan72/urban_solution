@extends('layouts.dashboards.app')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Favicon Logo</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Header Logo</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">App Name</a>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="tab-content" id="nav-tabContent">
                <div class="custom-systemsettingstyle tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                

                
                </div>

                <div class="custom-systemsettingstyle tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                


                </div>

                <div class="custom-systemsettingstyle tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                


                </div>

                </div>
            </div>
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
//alert(" jquery form dashboard_principal");
});
</script>
@endsection
