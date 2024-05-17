<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Penjualan Bulan {{ $date->isoFormat('MMM YYYY') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
        font-size: 9pt;
        }
    </style>

    <center>
        <h5>Laporan Penjualan Bulan {{ $date->isoFormat('MMMM YYYY') }}</h5>
    </center>
 
    <table class='table table-bordered'>
    <thead>
        <tr>
            <th>Nama Pelanggan</th>
            <th>Tanggal Transaksi</th>
            <th>Tanggal Konfirmasi</th>
            <th>Status Pembayaran</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>

    @foreach($data as $penjualan)
    <tr>
        <td>{{$penjualan->user->name}}</td>
        <td>{{$penjualan->tgl_pembelian}}</td>
        <td>{{$penjualan->tgl_pembayaran}}</td>
        <td>{{$penjualan->status_pembayaran ? 'Lunas' : 'Belum lunas'}}</td>
        <td>Rp. {{number_format($penjualan->total, 2)}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="4" align="right">Total</td>
        <td>Rp. {{number_format($totals, 2)}}</td>
    </tr>
    </tbody>
    </table>
 
</body>
</html>