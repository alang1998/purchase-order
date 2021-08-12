@extends('app')

@section('content')
<div class="row">
  <div class="col-md-6">
    @include('pages.dashboard.charts.worstProductChart')
    @include('pages.dashboard.charts.weeklyNominalChart')
  </div>
  <div class="col-md-6">
    @include('pages.dashboard.charts.bestProductChart')
    @include('pages.dashboard.charts.weightChart')
  </div>
</div>
@endsection