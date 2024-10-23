@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Kerentanan Lingkungan'])
  <div id="alert">
    @include('components.alert')
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6 class="text-uppercase">Data Kerentanan Tanah Longsor di Jawa Timur</h6>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            {{-- Button Dropdown --}}
            <div class="dropdown mt-4 mx-3">
              <button class="px-3 btn btn-sm btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                {{ ucfirst(explode("-", Route::currentRouteName())[0]) }} {{ ucfirst(explode("-", Route::currentRouteName())[1]) }}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item active {{ Route::currentRouteName() == 'kerentanan-sosial' ? 'bg-success text-white' : '' }}" href="{{ route('kerentanan-sosial') }}">Kerentanan Sosial</a></li>
                <li><a class="dropdown-item {{ Route::currentRouteName() == 'kerentanan-ekonomi' ? 'bg-success text-white' : '' }}" href="{{ route('kerentanan-ekonomi') }}">Kerentanan Ekonomi</a></li>
                <li><a class="dropdown-item {{ Route::currentRouteName() == 'kerentanan-fisik' ? 'bg-success text-white' : '' }}" href="{{ route('kerentanan-fisik') }}">Kerentanan Fisik</a></li>
                <li><a class="dropdown-item {{ Route::currentRouteName() == 'kerentanan-lingkungan' ? 'bg-success text-white' : '' }}" href="{{ route('kerentanan-lingkungan') }}">Kerentanan Lingkungan</a></li>
              </ul>
            </div>

            {{-- Datatable --}}
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="table-indeks-kapasitas">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> ID. </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Nama Kabupaten </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Hutan Lindung </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Hutan Alam </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Hutan Bakau </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Semak Belukar </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Hasil </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Aksi </th>
                </thead>
                <tbody>
                  @foreach ($lingkungan as $lin)
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="mb-0 text-sm">{{ $lin->kabupaten->id }}.</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $lin->kabupaten->nama_kabupaten }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $lin->hutan_lindung }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $lin->hutan_alam }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $lin->hutan_bakau }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $lin->semak_belukar }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $lin->hasil_kerenling }}</p>
                      </td>
                      <td class="align-middle text-center">
                        <button class="btn my-auto btn-link text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#edit-{{ $lin->id }}">
                          <i class="fas fa-edit text-warning"></i>
                        </button>
                      </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit-{{ $lin->id }}" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                          <div class="modal-header mx-auto">
                            <h5 class="modal-title text-uppercase" id="createLabel">Edit Data Indeks Kapasitas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          {{-- Form Edit --}}
                          <form method="POST" action="{{ route('kerentanan-lingkungan.update', $lin->id) }}">
                            <div class="modal-body">
                              @csrf

                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-kabupaten">Nama Kota / Kabupaten</label>
                                    <select class="form-control" id="input-kabupaten" name="kabupaten_id">
                                      @foreach ($kabupaten as $kab)
                                        <option value="{{ $kab->id }}" {{ $lin->kabupaten_id == $kab->id ? 'selected' : '' }}>{{ $kab->nama_kabupaten }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-lindung">Hutan Lindung</label>
                                    <input type="number" name="lindung" class="form-control" id="input-lindung" step="1" value="{{ $lin->hutan_lindung }}">
                                  </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-alam">Hutan Alam</label>
                                    <input type="number" name="alam" class="form-control" id="input-alam" step="1" value="{{ $lin->hutan_alam }}">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-bakau">Hutan Bakau</label>
                                    <input type="number" name="bakau" class="form-control" id="input-bakau" step="1" value="{{ $lin->hutan_bakau }}">
                                  </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-belukar">Semak Belukar</label>
                                    <input type="number" name="belukar" class="form-control" id="input-belukar" step="1" value="{{ $lin->semak_belukar }}">
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
                {{ $lingkungan->links('components.paginator') }}
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

          axios.delete(`/data/kerentanan-lingkungan/${id}`)
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
