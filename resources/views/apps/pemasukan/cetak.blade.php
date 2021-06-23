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
        <h2>Laporan Pemasukan</h2>
    </div>

    <table border="1" style="width: 100%" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Jenis Pemasukan</th>
                <th>Tanggal Pemasukan</th>
                <th>Biaya Pemasukan</th>
            </tr>
        </thead>    
        <tbody>
        <?php $no = 1; ?>
        @foreach ($pemasukan as $data_pemasukan)
            <tr>
                <td>{{ $no }}</td>
                <td>{{$data_pemasukan->tittle }}</td>
                <td>{{$data_pemasukan->category->name}}</td>
                <td>{{ date('d-m-Y', strtotime($data_pemasukan->date)) }}</td>
                <td>Rp. {{number_format($data_pemasukan->price)}}</td>
            </tr>
        <?php $no++; ?>
        @endforeach

        <tr>
            <td colspan="4" style="text-align: right">Total</td>
            <td>Rp. {{number_format($pemasukan_total)}}</td>
        </tr>
        </tbody>
    </table> 


</body>
</html>