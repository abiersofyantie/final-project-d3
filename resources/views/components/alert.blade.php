@if ($message = session()->has('succes'))
    <div class="alert alert-success alert-dismissible fade show my-4 mx-4" role="alert">
      <p class="text-white mb-0">{{ session()->get('succes') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
@if ($message = session()->has('error'))
    <div class="alert alert-danger my-4 mx-4" role="alert">
      <p class="text-white mb-0">{{ session()->get('error') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
