@extends('app')

@section('content')
<div class="row">
  <div class="col-md-6">
    @include('pages.dashboard.charts.weeklyPurchaseOrderChart')
    @include('pages.dashboard.charts.weeklyNominalChart')
  </div>
  <div class="col-md-6">
    @include('pages.dashboard.charts.bestProductChart')
  </div>
</div>
@endsection