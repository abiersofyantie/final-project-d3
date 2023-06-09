<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    @if (request()->route()->getPrefix() != '')
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('home') }}">{{ ucfirst(request()->route()->getPrefix()) }}</a></li>
      <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
    @endif
  </ol>
  <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>
</nav>
