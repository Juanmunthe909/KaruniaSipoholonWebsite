<!DOCTYPE html>
<html>

<head>
    <title>Data Kas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
        }

        .footer strong {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h2>Data Kas Karunia Sipoholon</h2>
    <p>Tanggal: {{ $startDate->translatedFormat('d F Y') }} - {{ $endDate->translatedFormat('d F Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Id Kas</th>
                <th>Tanggal Penerimaan</th>
                <th>Kas Keluar/Masuk</th>
                <th>Jumlah</th>
                <th>Sumber Kas</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalIn = 0;
                $totalOut = 0;
            @endphp
            @foreach ($kas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->inout_date }}</td>
                    <td>
                        @if ($item->in_out === 'in')
                            <span class="btn btn-success">MASUK</span>
                            @php
                                $totalIn += $item->amount;
                            @endphp
                        @elseif ($item->in_out === 'out')
                            <span class="btn btn-danger">KELUAR</span>
                            @php
                                $totalOut += $item->amount;
                            @endphp
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->amount, 0, ',', '.') }}</td>
                    <td>{{ $item->transaction_type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <strong>Total Kas Masuk: Rp {{ number_format($totalIn, 0, ',', '.') }}</strong><br>
        <strong>Total Kas Keluar: Rp {{ number_format($totalOut, 0, ',', '.') }}</strong><br>
        <strong>Saldo: Rp {{ number_format($totalIn - $totalOut, 0, ',', '.') }}</strong>
    </div>
</body>

</html>
