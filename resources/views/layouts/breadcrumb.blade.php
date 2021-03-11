
    <div class="content-heading">
      <div class="heading-left">
        <h1 class="page-title">{{ $title ?? 'No Title' }}</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> {{ empty(Request::segments()) ? '' : 'Dashboard' }}</a></li>
          <?php $segment = ''; ?>
          @for ($i = 1; $i <= count(Request::segments()); $i++)
            <?php $segment .= '/' . Request::segment($i); ?>
            @if ($i < count(Request::segments()))
              <li class="breadcrumb-item"><a href="{{ url($segment) }}">{{ ucwords(Request::segment($i)) }}</a></li>
            @else
              <li class="breadcrumb-item active">{{ Request::segment($i) == "create" ? 'Tambah' : ucwords(Request::segment($i)) }}</li>
            @endif
          @endfor
        </ol>
      </nav>
    </div>