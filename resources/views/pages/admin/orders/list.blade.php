<div class="card-body">
    <div>
        <div class="table-responsive table-desi">
            <table class="user-table table table-striped">
                <thead class="table-light text-muted" ini menumakanan>
                    <th colspan="8">Transaksi Menu Makanan</th>
                    <tr>
                        <th>No</th>
                        <th>Kode Pembelian</th>
                        <th>Nama Pemesan</th>
                        <th>Total Harga</th>
                        <th>Bukti Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach ($pemesanans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->user->fullname }}</td>
                            <td>{{ $item->total }}</td>
                            <td>
                                @if ($item->payment != 'Cash')
                                    <img src="{{ asset('images/bukti_pembayaran/' . $item->image) }}" class="card-img-top"
                                        style="width:70px;height:70px;">
                                @else
                                    Pembayaran Cash
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ $pemesanans->links('theme.app.pagination') }}

<div class="card-body">
    <div>
        <div class="table-responsive table-desi">
            <table class="user-table table table-striped">
                <thead class="table-light text-muted">
                    <th colspan="10">Transaksi Menu Penginapan</th>
                    <tr>
                        <th>No</th>
                        <th>Kamar</th>
                        <th>Nama Pemesan</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Total Harga</th>
                        <th>Bukti Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach ($penginapan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->hotel->name }}</td>
                            <td>{{ $item->user->fullname }}</td>
                            <td>{{ $item->checkin_date }}</td>
                            <td>{{ $item->checkout_date }}</td>
                            <td>Rp. {{ number_format($item->total_price) }}</td>
                            <td>
                                @if ($item->payment_proof != 'Cash')
                                    <img src="{{ asset('images/bukti_pembayaran/' . $item->payment_proof) }}"
                                        class="card-img-top" style="width:70px;height:70px;">
                                @else
                                    Pembayaran Cash
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <span class="badge badge-soft-warning text-uppercase">Menunggu</span>
                                @elseif($item->status == 'accepted')
                                    <span class="badge badge-soft-success text-uppercase">Diterima</span>
                                @elseif($item->status == 'rejected')
                                    <span class="badge badge-soft-danger text-uppercase">Ditolak</span>
                                @elseif($item->status == 'completed')
                                    <span class="badge badge-soft-primary text-uppercase">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
{{ $pemesanans->links('theme.app.pagination') }}

<div class="card-body">
    <div>
        <div class="table-responsive table-desi">
            <table class="user-table table table-striped">
                <thead class="table-light text-muted">
                    <th colspan="11">Transaksi Menu Pemandian</th>
                    <tr>
                        <th>No</th>
                        <th>No Kamar</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Jumlah orang</th>
                        <th>Total Harga</th>
                        <th>Bukti Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemandian as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->toilet->title }}</td>
                            <td>{{ $item->user->fullname }}</td>
                            <td>{{ $item->book_date }}</td>
                            <td>{{ $item->book_time }}</td>
                            <td>{{ $item->person }}</td>
                            <td>Rp. {{ number_format($item->total_price) }}</td>
                            <td>
                                @if ($item->payment_proof != 'Cash')
                                    <img src="{{ asset('images/bukti_pembayaran/' . $item->payment_proof) }}"
                                        class="card-img-top" style="width:70px;height:70px;">
                                @else
                                    Pembayaran Cash
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <span class="badge badge-soft-warning text-uppercase">Menunggu</span>
                                @elseif($item->status == 'accepted')
                                    <span class="badge badge-soft-success text-uppercase">Diterima</span>
                                @elseif($item->status == 'rejected')
                                    <span class="badge badge-soft-danger text-uppercase">Ditolak</span>
                                @elseif($item->status == 'Completed')
                                    <span class="badge badge-soft-primary text-uppercase">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
