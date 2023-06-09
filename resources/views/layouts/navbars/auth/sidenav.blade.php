<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 fixed-start" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand mx-auto mt-4 text-center" href="{{ route('home') }}" target="_blank">
      <h4 class="font-weight-bolder">Prograph</h4>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <div class="text-center mx-auto mb-3">
      <img src="https://avatars.githubusercontent.com/u/73971675?v=4" class="img-fluid rounded-circle" height="80" width="80" alt="user-avatar">
      <h5 class="font-weight-bolder mt-3 mb-0">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5>
      <span class="text-secondary text-sm">{{ Auth::user()->email }}</span>
    </div>

    <ul class="navbar-nav">

      {{-- Collapse Data --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#collapse-data" role="button" aria-expanded="{{ request()->route()->getPrefix() == 'data' ? 'true' : 'false' }}" aria-controls="collapse-data">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-layer-group {{ request()->route()->getPrefix() == 'data' ? 'text-success' : 'text-secondary' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data</span>
        </a>

        {{-- List Items --}}
        <div class="collapse {{ request()->route()->getPrefix() == 'data' ? 'show' : '' }}" id="collapse-data">
          <ul class="nav nav-sm flex-column">
            <li class="nav-item ps-3">
              <a class="nav-link {{ Route::currentRouteName() == 'bencana' ? 'active' : '' }}" href="{{ route('bencana') }}">
                <i class="fas fa-circle {{ Route::currentRouteName() == 'bencana' ? 'text-success' : 'text-secondary' }} text-xs opacity-10"></i>
                {{ __('Data Bencana') }}
              </a>
            </li>
            <li class="nav-item ps-3">
              <a class="nav-link {{ Route::currentRouteName() == 'kerentanan-sosial' ? 'active' : '' }}" href="{{ route('kerentanan-sosial') }}">
                <i class="fas fa-circle {{ Route::currentRouteName() == 'kerentanan-sosial' ? 'text-success' : 'text-secondary' }} text-xs opacity-10"></i>
                {{ __('Kerentanan') }}
              </a>
            </li>
            <li class="nav-item ps-3">
              <a class="nav-link {{ Route::currentRouteName() == 'indeks-kapasitas' ? 'active' : '' }}" href="{{ route('indeks-kapasitas') }}">
                <i class="fas fa-circle {{ Route::currentRouteName() == 'indeks-kapasitas' ? 'text-success' : 'text-secondary' }} text-xs opacity-10"></i>
                {{ __('Indeks Kapasitas') }}
              </a>
            </li>
          </ul>
        </div>
      </li>

      {{-- Collapse Process --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#collapse-process" role="button" aria-expanded="{{ request()->route()->getPrefix() == 'process' ? 'true' : 'false' }}" aria-controls="collapse-process">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-cog {{ request()->route()->getPrefix() == 'process' ? 'text-success' : 'text-secondary' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">AHP</span>
        </a>

        {{-- List Items --}}
        <div class="collapse" id="collapse-process">
          <ul class="nav nav-sm flex-column">
            <li class="nav-item ps-3">
              <a class="nav-link {{ Route::currentRouteName() == 'AHP' ? 'active' : '' }}" href="{{ route('AHP') }}">
                <i class="fas fa-circle {{ Route::currentRouteName() == 'AHP' ? 'text-success' : 'text-secondary' }} text-xs opacity-10"></i>
                {{ __('AHP') }}
              </a>
            </li>
            <li class="nav-item ps-3">
              <a class="nav-link" href="{{ route('MapAHP') }}">
                <i class="fas fa-circle text-secondary text-xs opacity-10"></i>
                {{ __('PRB Mapin') }}
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ str_contains(request()->url(), 'rtl') == true ? 'active' : '' }}" href="{{ route('FAHP') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-swatchbook text-secondary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Fuzzy - AHP</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ str_contains(request()->url(), 'virtual-reality') == true ? 'active' : '' }}" href="{{ route('MapFuzzy') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-globe-asia text-secondary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">PRB - Mapin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 {{ Route::currentRouteName() == 'profile' ? 'text-success' : 'text-secondary' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Profil</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
