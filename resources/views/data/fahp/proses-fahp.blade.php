@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'FAHP'])
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6 class="text-uppercase">Perhitungan F-AHP Tanah Longsor Di Jawa Timur</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">

                {{-- Show modal with button using bootstrap --}}
                <div class="d-flex">
                </div>

                {{-- Datatable --}}
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="table-bencana">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                          Nama Kabupaten</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Bobot</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                          Kelas Resiko</th>
                    </thead>
                    <tbody>
                        @foreach ($fahp as $fuzzyahp)
                          <tr>
                            <td>
                              <div class="d-flex px-3 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <p class="mb-0 text-sm">{{ $fuzzyahp->id }}.</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">{{ $fuzzyahp->nama_kabupaten }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $fuzzyahp->fuzzyAhp->fuzzy_final }}</p>
                              </td>
                              <td class="">
                                @if ($fuzzyahp->fuzzyAhp->ahp_final >= 0 && $fuzzyahp->fuzzyAhp->fuzzy_final <= 0.0218)
                                  <span class="badge badge-sm bg-gradient-success">Rendah</span>
                                @elseif ($fuzzyahp->fuzzyAhp->fuzzy_final >= 0.0247 && $fuzzyahp->fuzzyAhp->fuzzy_final <= 0.0373)
                                  <span class="badge badge-sm bg-gradient-warning">Sedang</span>
                                @elseif ($fuzzyahp->fuzzyAhp->fuzzy_final >= 0.051)
                                  <span class="badge badge-sm bg-gradient-danger">Tinggi</span>
                                @endif
                              </td>
                          </tr>

                          <!-- Modal Edit -->

                          {{-- End of Modal Edit --}}
                        @endforeach
                    </tbody>
                  </table>

                  {{-- Pagination --}}
                  <div class="mx-4 mt-3 mb-1">
                    {{-- {{ $ahp->links('components.paginator') }} --}}
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
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>

@endpush
