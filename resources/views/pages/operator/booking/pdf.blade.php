<!DOCTYPE html>
<html>

<head>
    <title>Booking PDF</title>
    <style>
        /* Gaya CSS khusus untuk tampilan PDF */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge-soft-warning {
            background-color: #ffc107;
            color: #fff;
        }

        .badge-soft-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge-soft-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .badge-soft-primary {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="card-body">
        <div>
            <center>
                <h1>Laporan Booking Pemandian</h1>
            </center>
            <hr>
            <div class="table-responsive table-card mb-1">
                <table class="table align-middle">
                    <thead class="table-light text-muted">
                        <tr>
                            <th>No</th>
                            <th>No Kamar</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemandian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->toilet->title }}</td>
                                {{-- <td>{{$item->category}}</td> --}}
                                <td>{{ $item->user->fullname }}</td>
                                <td>{{ $item->book_date }}</td>
                                <td>{{ $item->book_time }}</td>
                                <td>{{ $item->person }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
