<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Room Reservation</h1>
    <hr>
    <p>Anda dapat memesan pemandian dengan mudah melalui booking online atau melalui tim pelayanan kami yang ramah.</p>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pemandian</th>
            <th>Date</th>
            <th>Time</th>
            <th>Person</th>
            <th>Booking Status</th>
        </tr>
        @foreach ($pemandian as $item)
            <tr>
                <td>{{ $pemandian->id }}</td>
                <td>{{ $pemandian->user->fullname }}</td>
                <td>{{ $pemandian->toilet->title }}</td>
                <td>{{ $pemandian->book_date }}</td>
                <td>{{ $pemandian->book_time }}</td>
                <td>{{ $pemandian->person }}</td>
                <td>{{ $pemandian->status }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>


{{-- <!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Room Reservation</h1>
    <hr>
    <p>Anda dapat memesan pemandian dengan mudah melalui booking online atau melalui tim pelayanan kami yang ramah.</p>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pemandian</th>
            <th>Date</th>
            <th>Time</th>
            <th>Person</th>
            <th>Booking Status</th>
        </tr>
        @foreach ($booking as $item)
            @if (Auth::user()->id == $item->user_id)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->toilet->title }}</td>
                    <td>{{ $item->book_date }}</td>
                    <td>{{ $item->book_time }}</td>
                    <td>{{ $item->person }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endif
        @endforeach
    </table>
</body>

</html> --}}
