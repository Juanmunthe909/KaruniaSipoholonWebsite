<x-web-layout title="Ruangan">
    <style>
        table {
            font-family: arial, sans-serif;
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

        .justify-content-end {
            justify-content: end;
            display: flex;
        }

        .cool-button {
            background-color: #E9B947;
            /* Warna latar belakang */
            color: white;
            /* Warna teks */
            border: none;
            /* Menghilangkan border */
            padding: 12px 24px;
            /* Ukuran padding */
            text-align: center;
            /* Posisi teks menjadi di tengah */
            text-decoration: none;
            /* Menghilangkan underline */
            display: inline-block;
            /* Menampilkan sebagai elemen inline */
            font-size: 16px;
            /* Ukuran font */
            transition-duration: 0.4s;
            /* Durasi efek transisi */
            cursor: pointer;
            /* Mengubah kursor saat diarahkan ke button */
        }

        .cool-button:hover {
            background-color: #E9B947;
            /* Warna latar belakang saat dihover */
        }
    </style>
    <!--Start Sub Banner-->
    <div class="sub-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <h1>order now</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-img"></div>
    </div>
    <div class="wave"></div>

    <!--End Sub Banner-->
    <div class="reserved mar-b">
        <div class="container">
            <div class="row ">
                <div class="col-sm-12 commontop text-center">
                    <h4>Restaurant</h4>
                    <hr>
                    <p>Anda dapat memesan dengan mudah melalui online atau melalui tim pelayanan
                        kami yang ramah.</p>
                </div><br>
                <div class="blog-area full-blog blog-standard full-blog grid-colum default-padding col-md-12">
                    <div class="justify-content-end">
                        {{-- <button type="button" class="cool-button"
                            onclick="location.href='{{ route('web.pemandian') }}';">Reservation</button> --}}

                        {{-- <button type="button" class="cool-button"
                            onclick="location.href='{{ route('web.checkout.pdf', $pemesanan->id) }}';">Ekspor
                            PDF</button> --}}
                        {{-- <a href="#">Ekspor Pdf</a> --}}
                    </div>
                    <br>
                </div>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>No Hp</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($pemesanan as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->fullname }}</td>
                            {{-- <th>{{ $item->product-> }}</th> --}}
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ $item->total }}</td>
                            {{-- <th>{{ $item->person }}</th> --}}
                            <td>{{ $item->status }}</td>
                            @if ($item->status === 'accepted' || $item->status === 'completed')
                                <td><a href="{{ route('web.checkout.pdf', $item->id) }}">Download</a></td>
                            @else
                                <td>Not Available</td>
                            @endif
                        </tr>
                        {{-- @endif --}}
                    @endforeach
                </table>
            </div>{{-- <div class="text-center">
                    {{ $toilet->links('theme.web.custom') }}
                </div> --}}
        </div>
    </div>



</x-web-layout>
