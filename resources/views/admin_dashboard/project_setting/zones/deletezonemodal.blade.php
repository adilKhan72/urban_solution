<!-- Modal -->
<div class="modal fade" id="deletezonemodal" tabindex="-1" role="dialog" aria-labelledby="deletezonemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Delete zone</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to delete this zone?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary delete_button_id">Yes</button>
      <button type="button" class="btn btn-secondary " data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#deletezonemodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var zone_id = button.data('id');
      $('.delete_button_id').attr("id",zone_id);
    });
  });
</script>
@endsection