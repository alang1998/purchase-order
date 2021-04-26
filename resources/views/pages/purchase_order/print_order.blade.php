<!DOCTYPE html>
<html>
<head>
	<title>{{ $purchase_order->order_number }}</title>
  
  <style>
    body{
      font-size: 10px;
      padding: 0;
      margin: 0;
    }

    .row-n{
      width: 100%;
      height: auto;
      display: block;
    }
    
    .header1{
      float:left;
      width:20%;
    }

    .header2{
      float:left;
      width:60%;
      text-align:center;
      font-weight:bold;
    }

    .column{
      float: left;
      width: 50%;
    }

    .img-ttd{
      position: absolute;
      top: 5;
    }

    .img-cap{
      position: absolute;
      top: 5;
      opacity: .5;
    }

    .m-2 {
      margin-left: 3px;
    }

    .table-custom {background-color:#000;}
    .table-custom td,th,caption{background-color:#fff}

  </style>
</head>
<body>
  <div class="row-n">
    <table class='table table-custom' cellspacing="1" width="100%">
      <tr>
        <td align="center" width="20%">
          <img src="{{ asset('storage/company/logo/'.$company->logo) }}" alt="logo" width="70px">
        </td>
        <td align="center" width="60%">
          <p>
            FORMULIR<br>
            PESANAN PEMBELIAN/PURCHASE ORDER<br>
            {{ strtoupper($company->name) }}<br>
            NO. {{ $purchase_order->order_number }}
          </p>
        </td>
        <td style="font-size:.8em" width="20%">
          <p>
            No Form : FO-SCMD-001<br>
            No Revisi : 01<br>
            Tgl Terbit : 25/05/2020
          </p>
        </td>
      </tr>
    </table>
  </div>
  <br>
  <div class="row-n">
    <div class="column">
      <div class="m-2">
        Kepada Yth,<br>
        <p style="margin-top: 5px;">
          {{ $purchase_order->supplier->name }} <br>
          {{ $purchase_order->supplier->address }}
        </p>
      </div>
      <table>
        <tr>
          <td>Phone</td>
          <td>:</td>
          <td>{{ $purchase_order->supplier->phone }}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td>{{ $purchase_order->supplier->email }}</td>
        </tr>
        <tr>
          <td>UP</td>
          <td>:</td>
          <td>{{ $purchase_order->supplier->person_in_charge }}</td>
        </tr>
      </table>
    </div>
    <div class="column">
      <table class="float-right">
        <tr>
          <td>Tanggal PO</td>
          <td>:</td>
          <td>{{ simpleDate($purchase_order->order_date) }}</td>
        </tr>
        <tr>
          <td>Kontak</td>
          <td>:</td>
          <td>{{ $purchase_order->user->name }}</td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td>:</td>
          <td>{{ $company->email }}</td>
        </tr>
      </table>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br>
  <div class="row-n">
    <table class='table-custom' cellspacing="1" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Jumlah</th>
          <th>Kemasan</th>
          <th>Harga Satuan</th>
          <th>Jumlah Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $grandTotal = 0;  
        ?>
        @foreach ($purchase_order->detail_orders as $detail_order)
          <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $detail_order->item->item_code }}</td>
            <td>{{ $detail_order->item->name }}</td>
            <td align="center">{{ $detail_order->quantity }}</td>
            <td align="center">{{ $detail_order->item->unit->name }}</td>
            <td align="right">{{ number_format($detail_order->price, '0', '', '.') }}</td>
            <td align="right">{{ number_format($detail_order->quantity * $detail_order->price, '0', '', '.') }}</td>
          </tr>
          <?= $grandTotal += $detail_order->quantity * $detail_order->price?>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th colspan="5" valign="top" align="left">
            Note : {{ $purchase_order->note }}<br>
          </th>
          <th colspan="1" align="left">Total</th>
          <th align="right">{{ number_format($grandTotal, '0', '', '.') }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <br><br>
  <div class="row-n">
    <table class='table table-custom' cellspacing="1" width="100%">
      <thead>
        <tr>
          <th>Alamat Pengiriman:</th>
          <th>Alamat Penagihan:</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td width="50%">
            {{ $purchase_order->store->name }}<br>
            {{ $purchase_order->store->address }}<br>
            Tlp : {{ $purchase_order->store->phone }}<br>
            UP : {{ $purchase_order->store->person_in_charge }}
          </td>
          <td>

            {{ $company->name }}<br>
            {{ $company->address }}<br>
            Tlp : {{ $company->phone }}<br>
            UP : {{ $company->person_in_charge }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  
  <br><br><br>
  <div class="row-n">
    <div class="column">
      <br>
        <br>
        <br>
        <br>
        ______________<br>
        {{ $purchase_order->supplier->name }}
        <br>
        Sales Manajer
    </div>
    <div class="column">
      <img src="{{ asset('storage/signature/'.$purchase_order->user->signature) }}" alt="ttd-user" width="75" class="img-ttd">
      <img src="{{ asset('storage/company/stamp/'.$company->stamp) }}" alt="ttd-user" width="75" class="img-cap">
      Diterbitkan oleh,<br>
        <br>
        <br>
        <br>
        <u>{{ $purchase_order->user->name }}</u><br>
        {{ $company->name }}<br>
        {{ $purchase_order->user->role->name }}
    </div>
  </div>
</body>
</html>