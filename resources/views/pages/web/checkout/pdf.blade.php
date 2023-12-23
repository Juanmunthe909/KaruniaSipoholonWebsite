<html>

<head>
    <title>Struk Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9vh;
            /* padding-left: 50px;
  padding-right: 25px; */

        }
    </style>
    @if ($pemesanan->payment != 'Cash')
        <center>
            <h2>Transaksi Non Tunai</h2>
            <h4>Karunia Sipoholon</h4>
            <p>
                Jl. Sm Raja No. 70, Tarutung II, <br />
                Kec. Tarutung, Toba, Sumatera Utara 22312
            </p>
        </center>
        <div class="p-5 mx-5">

            <div class="" style="text-align: left; line-height: 0.5;">
                <p>Nama : {{ $pemesanan->user->fullname }}</p>
                <p>Hari/Tanggal : {{ $pemesanan->created_at->translatedFormat('l, d-m-Y') }}</p>
                <p>ID : {{ $pemesanan->code }}</p>
            </div><br>
            <table class=" col-12">
                <tbody>
                    @foreach ($pemesanan->pemesananDetails as $item)
                        <tr>
                            <td class="text-end" style="width: 50%">{{ $item->product->title }}
                            </td>
                            <td class="" style="width: 20%">{{ $item->quantity }}</td>
                            <td class="">Rp.
                                {{ number_format($item->product->price * $item->quantity, 2, '.', ',') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr />
            <table class="col-12">
                <tbody>
                    <tr>
                        <td style="width:50%;">SubTotal</td>
                        <td style="width: 20%"></td>
                        <td>Rp. {{ number_format($pemesanan->total, 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td style="width:50%;">Total</td>
                        <td style="width: 20%"></td>
                        <td>Rp. {{ number_format($pemesanan->total, 2, '.', ',') }}</td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <table class="col-12">
                <tbody>
                    <tr>
                        <td style="width:50%;" class="text-nowrap">Metode Pembayaran</td>
                        <td>:</td>
                        <td>{{ $pemesanan->payment }}</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 35px" class="text-nowrap">Status</td>
                        <td>:</td>
                        <td>{{ $pemesanan->status }}</td>
                    </tr>
                </tbody>
            </table>
            <hr />
        </div>
    @else
        <center>
            <h2>Transaksi Tunai</h2>
            <h4>Karunia Sipoholon</h4>
            <p>
                Jl. Sm Raja No. 70, Tarutung II, <br />
                Kec. Tarutung, Toba, Sumatera Utara 22312
            </p>
        </center>
        <div class="p-5 mx-5">

            <div class="" style="text-align: left; line-height: 0.5;">
                <p>{{ $pemesanan->user->fullname }}</p>
                <p>{{ $pemesanan->created_at->translatedFormat('l, d-m-Y') }}</p>
                <p>ID : {{ $pemesanan->code }}</p>
            </div><br>
            <table class=" col-12">
                <tbody>
                    @foreach ($pemesanan->pemesananDetails as $item)
                        <tr>
                            <td class="text-end" style="width: 50%">{{ $item->product->title }}
                            </td>
                            <td class="" style="width: 20%">{{ $item->quantity }}</td>
                            <td class="">Rp.
                                {{ number_format(($item->product->price + $item->product->price / 100) * $item->quantity, 2, '.', ',') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr />
            <table class="col-12">
                <tbody>
                    <tr>
                        <td style="width:50%;">SubTotal</td>
                        <td style="width: 20%"></td>
                        <td>Rp. {{ number_format($pemesanan->total, 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td style="width:50%;">Total</td>
                        <td style="width: 20%"></td>
                        <td>Rp. {{ number_format($pemesanan->total, 2, '.', ',') }}</td>
                    </tr>


                </tbody>
            </table>
            <hr />
            <table class="col-12">
                <tbody>
                    <tr>
                        <td style="width:50%;" class="text-nowrap">Metode Pembayaran</td>
                        <td>:</td>
                        <td>{{ $pemesanan->payment }}</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 35px" class="text-nowrap">Status</td>
                        <td>:</td>
                        <td>{{ $pemesanan->status }}</td>
                    </tr>
                </tbody>
            </table>
            <hr />
        </div>
    @endif

    <footer class="mt-4">
        <center>
            <h5>Thank You</h5>
            <h6>~ Please Do Come Again ~</h6>
        </center>
    </footer>
</body>

</html>
