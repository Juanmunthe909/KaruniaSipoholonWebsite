<div class="card-body">
    <div>
        <div class="table-responsive table-card mb-1 mx-1">
            <table class="table align-middle">
                <thead class="table-light text-muted">
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Kamar</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>No KTP</th>
                        <th>Total Price</th>
                        <th>Bukti Pembayaran</th>
                        <th>Payment Proof</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach ($hotel as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->fullname }}</td>
                            <td>{{ $item->hotel->name }}</td>
                            <td>{{ $item->checkin_date }}</td>
                            <td>{{ $item->checkout_date }}</td>
                            <td>{{ $item->user->no_ktp }}</td>
                            <td>Rp. {{ number_format($item->total_price) }}</td>
                            <!-- Di dalam <td> Payment Proof -->
                            <td>
                                @if ($item->payment_proof != 'Cash')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                        data-bs-target="#paymentProofModal">
                                        <img src="{{ asset('images/bukti_pembayaran/' . $item->payment_proof) }}"
                                            class="card-img-top" style="width:70px;height:70px;">
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="paymentProofModal" tabindex="-1"
                                        aria-labelledby="paymentProofModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="paymentProofModalLabel">Bukti Pembayaran
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('images/bukti_pembayaran/' . $item->payment_proof) }}"
                                                        class="img-fluid">
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ asset('images/bukti_pembayaran/' . $item->payment_proof) }}"
                                                        download class="btn btn-primary">Unduh Gambar</a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    Pembayaran Cash
                                @endif

                            </td>
                            <div class="modal fade" id="proofModal" tabindex="-1" role="dialog"
                                aria-labelledby="proofModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="proofModalLabel">Bukti Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="" id="proofImage" alt="Bukti Pembayaran"
                                                style="max-width: 100%;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                            <td>
                                <div class="btn-group d-flex justify-content-center" role="group"
                                    aria-label="Basic example">
                                    @if ($item->status == 'accepted')
                                        <a href="javascript:;"
                                            onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PUT','{{ route('operator.hotel.finish', $item->id) }}');"
                                            class="btn btn-sm btn-danger"></i>Finish</a>
                                    @endif
                                    @if ($item->status == 'pending')
                                        <a href="javascript:;"
                                            onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('operator.hotel.destroy', $item->id) }}');"
                                            class="btn btn-sm btn-primary"></i>Delete</a>
                                        <a href="javascript:;"
                                            onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PATCH','{{ route('operator.hotel.accept', $item->id) }}');"
                                            class="btn btn-sm btn-success">
                                            Terima
                                        </a>
                                        <a href="javascript:;"
                                            onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PATCH','{{ route('operator.hotel.reject', $item->id) }}');"
                                            class="btn btn-sm btn-danger">
                                            Tolak
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{ $hotel->links('theme.app.pagination') }} <br>
