<!DOCTYPE html>
<html lang="en">

<head>
    <!-- COMMON CSS -->
    <link href="{{ asset('assets-user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/css/style.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;

            .invoice-container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .invoice-container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .invoice-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
            }

            .invoice-title {
                font-size: 24px;
                font-weight: bold;
                color: #333333;
            }

            .invoice-date {
                font-size: 16px;
                color: #666666;
            }

            .invoice-address {
                display: flex;
                margin-top: 20px;
            }

            .invoice-address .col-6 {
                width: 50%;
            }

            .invoice-table {
                width: 100%;
                margin-top: 40px;
                border-collapse: collapse;
            }

            .invoice-table th,
            .invoice-table td {
                padding: 10px;
                border-bottom: 1px solid #dddddd;
            }

            .invoice-table th {
                background-color: #f5f5f5;
                text-align: left;
                font-weight: bold;
                color: #333333;
            }

            .invoice-table td {
                color: #666666;
            }

            .invoice-total {
                text-align: right;
                font-weight: bold;
                margin-top: 20px;
            }

            .invoice-footer {
                margin-top: 40px;
                text-align: center;
            }
    </style>

</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div>
                <h1 class="invoice-title">Tagihan</h1>
            </div>
            <div>
                <p class="invoice-date">Tanggal Pemesanan:
                    {{ \Carbon\Carbon::parse($penginapan->created_at)->format('d M Y') }}</p>
            </div>
        </div>
        <div class="invoice-address">
            <div class="col-6">
                <strong>Tagihan Kepada:</strong><br>
                {{ Auth::user()->fullname }}<br>
            </div>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Penginapan</th>
                    <th>Harga</th>
                    <th>Malam</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $penginapan->hotel->name }}</td>
                    <td>Rp. {{ number_format($penginapan->total_price, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($penginapan->checkin_date)->diffInDays($penginapan->checkout_date) }}
                    </td>
                    <td>Rp. {{ number_format($penginapan->total_price, 0, ',', '.') }}</td>
                    <td>{{ $penginapan->status }}</td>
                </tr>
            </tbody>
        </table>
        <div class="invoice-total">
            <p>Total Tagihan: Rp. {{ number_format($penginapan->total_price, 0, ',', '.') }}</p>
        </div>
    </div>
</body>

</html>
