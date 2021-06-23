<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center; margin-bottom: 20px">
        <h2>Laporan Pengeluaran</h2>
    </div>

    <table border="1" style="width: 100%" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Jenis Pengeluaran</th>
                <th>Tanggal Pengeluaran</th>
                <th>Biaya Pengeluaran</th>
            </tr>
        </thead>    
        <tbody>
        <?php $no = 1; ?>
        @foreach ($pengeluaran as $data_pengeluaran)
            <tr>
                <td>{{ $no }}</td>
                <td>{{$data_pengeluaran->tittle }}</td>
                <td>{{$data_pengeluaran->category->name}}</td>
                <td>{{ date('d-m-Y', strtotime($data_pengeluaran->date)) }}</td>
                <td>Rp. {{number_format($data_pengeluaran->price)}}</td>
            </tr>
        <?php $no++; ?>
        @endforeach

        <tr>
            <td colspan="4" style="text-align: right">Total</td>
            <td>Rp. {{number_format($pengeluaran_total)}}</td>
        </tr>
        </tbody>
    </table> 


</body>
</html>