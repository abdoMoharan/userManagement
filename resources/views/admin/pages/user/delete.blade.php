
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <div class="swal2-icon-content text-warning h1">!</div> --}}
            <h2 class="swal2-title" id="swal2-title" style="display: flex;"> Are you sure !</h2>
        <div class="modal-footer" >
            <form  action="{{ route('admin.users.destroy' , $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </form>
        </div>
    </div>
      </div>
    </div>
  </div>
