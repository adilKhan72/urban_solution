<!-- Modal -->
<div class="modal fade" id="deletesubfieldmodal" tabindex="-1" role="dialog" aria-labelledby="deletesubfieldmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete subfield</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to delete this requirement Type? All the Requirements fields will be deleted along with this.</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary delete_button_id_2">Yes</button>
      <button type="button" class="btn btn-secondary " data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

@section('jquery')
@parent
<script>
  $(document).ready(function(){
    $('#deletesubfieldmodal').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var subfield_id = button.data('id');
      $('.delete_button_id_2').attr("id",subfield_id);
    });
  });
</script>
@endsection