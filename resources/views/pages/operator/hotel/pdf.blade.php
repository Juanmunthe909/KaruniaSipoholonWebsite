<!DOCTYPE html>
<html>

<head>
    <title>Data Pemesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Pemesanan</h5>
    </center>
    <table class="table align-middle">
        <thead class="table-light text-muted">
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Kamar</th>
                <th>Check in</th>
                <th>Check out</th>
                <th>Total Price</th>
                {{-- <th>Payment Proof</th> --}}
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @foreach ($penginapans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->fullname }}</td>
                    <td>{{ $item->hotel->name }}</td>
                    <td>{{ $item->checkin_date }}</td>
                    <td>{{ $item->checkout_date }}</td>
                    <td>Rp. {{ number_format($item->total_price) }}</td>
                    {{-- <td>
                        @if ($item->status == 'pending')
                            <span class="badge badge-soft-warning text-uppercase">Menunggu</span>
                        @elseif($item->status == 'accepted')
                            <span class="badge badge-soft-success text-uppercase">Diterima</span>
                        @elseif($item->status == 'rejected')
                            <span class="badge badge-soft-danger text-uppercase">Ditolak</span>
                        @elseif($item->status == 'completed')
                            <span class="badge badge-soft-primary text-uppercase">Selesai</span>
                        @endif
                    </td> --}}
                    {{-- <td>
                        @if ($item->payment_proof != 'Cash')
                            <img src="{{ asset('images/bukti_pembayaran/' . $item->payment_proof) }}"
                                class="card-img-top">
                        @else
                            Pembayaran Cash
                        @endif
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
