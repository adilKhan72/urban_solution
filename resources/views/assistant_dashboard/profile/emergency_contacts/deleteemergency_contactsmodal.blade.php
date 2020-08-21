<!-- Modal -->
<div class="modal fade" id="deleteemergency_contactmodal" tabindex="-1" role="dialog" aria-labelledby="deleteemergency_contactmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cardheadercolor">
        <h5 class="modal-title" id="exampleModalLabel">Delete emergency_contact</h5>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to delete this emergency_contact?</p>
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
    $('#deleteemergency_contactmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var emergency_contact_id = button.data('id');
      $('.delete_button_id').attr("id",emergency_contact_id);
    });
  });
</script>
@endsection