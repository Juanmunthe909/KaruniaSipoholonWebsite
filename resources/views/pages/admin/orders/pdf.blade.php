<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Tambahkan gaya CSS untuk tampilan PDF di sini */
        .pdf-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .pdf-header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .pdf-header p {
            font-size: 16px;
            margin: 0;
        }

        .pdf-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .pdf-table th,
        .pdf-table td {
            border: 1px solid #000;
            padding: 8px;
        }

        .pdf-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .pdf-table td {
            text-align: center;
        }

        .pdf-total {
            text-align: right;
        }

        .pdf-footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="pdf-header">
        <h1>Data Pembelian</h1>
        <p>Tanggal: {{ date('d/m/Y') }}</p>
    </div>

    <table class="pdf-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pembelian</th>
                <th>Total Harga</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalHarga = 0; ?>
            @foreach ($pemesanans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->total }}</td>
                    <?php $totalHarga += $item->total; ?>
                    <td>
                        @if ($item->payment != 'Cash')
                            <img src="{{ asset('images/bukti_pembayaran' . $item->image) }}" class="card-img-top">
                        @else
                            Pembayaran Cash
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 'pending')
                            <span class="badge badge-soft-warning text-uppercase">Menunggu</span>
                        @elseif($item->status == 'accepted')
                            <span class="badge badge-soft-success text-uppercase">Diterima</span>
                        @elseif($item->status == 'rejected')
                            <span class="badge badge-soft-danger text-uppercase">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2"></td>
                <td><strong>Total :</strong></td>
                <td colspan="2"><strong>{{ $totalHarga }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="pdf-footer">
        <p>© 2023 Karunia Sipoholon</p>
    </div>
</body>

</html>
