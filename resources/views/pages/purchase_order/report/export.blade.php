<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    table, td, th {
      border: 1px solid black;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }
  </style>
</head>
<body>
  <h3>PT. CITRA WARNA JAYA ABADI</h3>
  <h4>Laporan Purchase Order</h4>
  <h5>{{ $supplier->name ?? 'Semua supplier' }}</h5>
  <h5>{{ ($startDate && $endDate ? date('d-M-Y', strtotime($startDate)).' - '.date('d-M-Y', strtotime($endDate)) : '') }}</h5>
  @php
    $grand_total_berat = 0;
    $grand_total_pembelian = 0;
  @endphp
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Nomor</th>
        <th>Tanggal</th>
        <th>Pembuat</th>
        <th>Penerima</th>
        <th>Total Berat (Kg) </th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ date('d-M-Y', strtotime($order->order_date)) }}</td>
          <td>{{ $order->order_number }}</td>
          <td>{{ $order->user->name }}</td>
          <td>{{ $order->store->name }}</td>
          <td>{{ $order->grand_total_tonase }}</td>
          <td>{{ $order->grand_total }}</td>
        </tr>
        @php
          $grand_total_berat += $order->grand_total_tonase;
          $grand_total_pembelian += $order->grand_total;
        @endphp
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="6">Total Berat</td>
        <td>{{ $grand_total_berat }}</td>
      </tr>
      <tr>
        <td colspan="6">Total Pembelian</td>
        <td>{{ $grand_total_pembelian }}</td>
      </tr>
    </tfoot>
  </table>
  {{ $orders }}
</body>
</html>