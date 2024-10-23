@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Data Bencana'])
  <div id="alert">
    @include('components.alert')
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6 class="text-uppercase">Daftar Bencana Tanah Longsor di Jawa Timur</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">

            {{-- Show modal with button using bootstrap --}}
            <div class="d-flex">
              <button class="mx-3 mt-4 px-3 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#create">
                <i class="fa fa-plus pe-2"></i>Tambah Data
              </button>

              <!-- Modal Create -->
              <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">

                    <div class="modal-header mx-auto">
                      <h5 class="modal-title text-uppercase" id="createLabel">Input Data Bencana Tanah Longsor</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    {{-- Form Create --}}
                    <form method="POST" action="{{ route('bencana.store') }}">
                      @csrf

                      <div class="modal-body">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label class="form-control-label" for="input-kabupaten">Nama Kota / Kabupaten</label>
                              <select class="form-control" id="input-kabupaten" name="kabupaten_id">
                                @foreach ($kabupaten as $kab)
                                  <option value="{{ $kab->id }}">{{ $kab->nama_kabupaten }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="input-gerakan-tanah">Gerakan Tanah</label>
                              <input type="number" name="gerakan_tanah" class="form-control" id="input-gerakan-tanah" step="0.01">
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="input-tanggal">Tanggal Kejadian</label>
                              <input type="date" name="tanggal" class="form-control" id="input-tanggal">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label class="form-control-label" for="input-waktu">Waktu Kejadian</label>
                              <input type="time" name="waktu" class="form-control" id="input-waktu">
                            </div>
                            <div class="form-group">
                              <label for="input-alamat">Alamat Kabupaten</label>
                              <textarea class="form-control" rows="5" name="alamat" id="input-alamat" aria-label="Input Alamat"></textarea>
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
            </div>

            {{-- Datatable --}}
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="table-bencana">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      No.</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Nama Kabupaten</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Alamat Daerah</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Tanggal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Waktu</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Gerakan Tanah</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Aksi</th>
                </thead>
                <tbody>
                  @foreach ($bencana as $ben)
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="mb-0 text-sm">{{ $loop->index + 1 }}.</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $ben->kabupaten->nama_kabupaten }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $ben->alamat_bencana }}</p>
                      </td>
                      <td>
                        <span class="text-secondary text-xs font-weight-bold">{{ date('d/m/Y', strtotime($ben->tanggal_bencana)) }}</span>
                      </td>
                      <td>
                        <span class="text-secondary text-xs font-weight-bold">{{ date('H.i', strtotime($ben->waktu_bencana)) }}</span>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $ben->gerakan_tanah }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if ($ben->gerakan_tanah >= 0 && $ben->gerakan_tanah <= 0.32)
                          <span class="badge badge-sm bg-gradient-success">Rendah</span>
                        @elseif ($ben->gerakan_tanah >= 0.33 && $ben->gerakan_tanah <= 0.66)
                          <span class="badge badge-sm bg-gradient-warning">Sedang</span>
                        @elseif ($ben->gerakan_tanah >= 0.67)
                          <span class="badge badge-sm bg-gradient-danger">Tinggi</span>
                        @endif
                      </td>
                      <td class="align-middle text-center">
                        <button class="btn my-auto ps-3 pe-1 btn-link text-secondary font-weight-bold text-xs" onclick="confirmDelete({{ $ben->id }})" data-toggle="tooltip"
                          data-original-title="Edit user">
                          <i class="fas fa-trash-alt text-danger"></i>
                        </button>
                        <button class="btn my-auto ps-1 pe-3 btn-link text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#edit-{{ $ben->id }}">
                          <i class="fas fa-edit text-warning"></i>
                        </button>
                      </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit-{{ $ben->id }}" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                          <div class="modal-header mx-auto">
                            <h5 class="modal-title text-uppercase" id="createLabel">Edit Data Bencana Tanah Longsor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          {{-- Form Edit --}}
                          <form method="POST" action="{{ route('bencana.update', $ben->id) }}">
                            <div class="modal-body">
                              @csrf

                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-kabupaten">Nama Kota / Kabupaten</label>
                                    <select class="form-control" id="input-kabupaten" name="kabupaten_id">
                                      @foreach ($kabupaten as $kab)
                                        <option value="{{ $kab->id }}" {{ $ben->kabupaten_id == $kab->id ? 'selected' : '' }}>{{ $kab->nama_kabupaten }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-gerakan-tanah">Gerakan Tanah</label>
                                    <input type="number" name="gerakan_tanah" class="form-control" id="input-gerakan-tanah" step="0.01" value="{{ $ben->gerakan_tanah }}">
                                  </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-tanggal">Tanggal Kejadian</label>
                                    <input type="date" name="tanggal" class="form-control" id="input-tanggal" value="{{ $ben->tanggal_bencana }}">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-waktu">Waktu Kejadian</label>
                                    <input type="time" name="waktu" class="form-control" id="input-waktu" value="{{ $ben->waktu_bencana }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="input-alamat">Alamat Kabupaten</label>
                                    <textarea class="form-control" rows="5" name="alamat" id="input-alamat" aria-label="Input Alamat">{{ $ben->alamat_bencana }}</textarea>
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
                {{ $bencana->links('components.paginator') }}
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

          axios.delete(`/data/bencana/${id}`)
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
