@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Indeks Kapasitas'])
  <div id="alert">
    @include('components.alert')
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6 class="text-uppercase">Data Indeks Kapasitas Tanah Longsor di Jawa Timur</h6>
          </div>

          <div class="card-body px-0 pt-3 pb-2">
            {{-- Datatable --}}
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="table-indeks-kapasitas">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> ID. </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Nama Kabupaten </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Skor </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Kelas Risiko </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Aksi </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kapasitas as $kap)
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="mb-0 text-sm">{{ $kap->kabupaten->id }}.</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $kap->kabupaten->nama_kabupaten }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $kap->skor }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if ($kap->skor >= 0 && $kap->skor <= 0.032)
                          <span class="badge badge-sm bg-gradient-succes">Rendah</span>
                        @elseif ($kap->skor >= 0.033 && $kap->skor <= 0.066)
                          <span class="badge badge-sm bg-gradient-warning">Sedang</span>
                        @elseif ($kap->skor >= 0.067)
                          <span class="badge badge-sm bg-gradient-danger">Tinggi</span>
                        @endif
                      </td>
                      <td class="align-middle text-center">
                        <button class="btn my-auto ps-3 pe-1 btn-link text-secondary font-weight-bold text-xs" onclick="confirmDelete({{ $kap->id }})" data-toggle="tooltip" data-original-title="Edit kapasitas">
                          <i class="fas fa-trash-alt text-danger"></i>
                        </button>
                        <button class="btn my-auto ps-1 pe-3 btn-link text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#edit-{{ $kap->id }}">
                          <i class="fas fa-edit text-warning"></i>
                        </button>
                      </td>
                    </tr>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="edit-{{ $kap->id }}" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                          <div class="modal-header mx-auto">
                            <h5 class="modal-title text-uppercase" id="createLabel">Edit Data Indeks Kapasitas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          {{-- Form Edit --}}
                          <form method="POST" action="{{ route('indeks-kapasitas.update', $kap->id) }}">
                            <div class="modal-body">
                              @csrf

                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-kabupaten">Nama Kota / Kabupaten</label>
                                    <select class="form-control" id="input-kabupaten" name="kabupaten_id">
                                      @foreach ($kabupaten as $kab)
                                        <option value="{{ $kab->id }}" {{ $kap->kabupaten_id == $kab->id ? 'selected' : '' }}>{{ $kab->nama_kabupaten }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-skor">Skor</label>
                                    <input type="number" name="skor" class="form-control" id="input-skor" step="0.001" value="{{ $kap->skor }}">
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    {{-- End of Modal Edit --}}
                  @endforeach
                </tbody>
              </table>

              {{-- Pagination --}}
              <div class="mx-4 mt-3 mb-1">
                {{ $kapasitas->links('components.paginator') }}
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footers.auth.footer')
  </div>
@endsection

@push('js')
  <script>
    function confirmDelete(id) {
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang sudah dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus data!',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        customClass: {
          confirmButton: 'btn btn-success mx-1',
          cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false
      }).then((result) => {
        if (result.isConfirmed) {

          axios.delete(`/data/indeks-kapasitas/${id}`)
            .then(function(response) {
              console.log(response);
              location.reload();
            })
            .catch(function(error) {
              console.error(error);
            });

          Swal.fire(
            'Terhapus!',
            'Data berhasil dihapus.',
            'success'
          )
        }
      })
    }
  </script>
@endpush
