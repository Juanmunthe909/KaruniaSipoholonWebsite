<x-app-layout title="Data Pemesanan">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Hotel</h4>
        </div>
    </div>
    <form id="form_input" method="POST" action="{{ route('operator.hotel.makePenginapan') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Pilih Kamar</label>
                    <select name="hotel_id" class="form-select">
                        <option disabled selected>Pilih Kamar</option>
                        @foreach ($hotel as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} -
                                Rp.{{ number_format($item->price), 0, ',', '.' }}
                            </option>
                        @endforeach
                    </select>
                    <br>

                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Check In</label>
                        <input type="date" name="checkin_date" class="form-control"
                            placeholder="Masukkan Tanggal Check In">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Check Out</label>
                        <input type="date" name="checkout_date" class="form-control"
                            placeholder="Masukkan Tanggal Check Out">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Person</label>
                        <input type="number" name="adults" class="form-control" placeholder="Masukkan Jumlah Orang">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <a class="btn btn-light" href="javascript:;" onclick="load_list(1);">Kembali</a>

                        <button class="btn btn-primary me-3" type="submit">Tambah</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
    @section('custom_js')
        <script src="{{ asset('js/FormControls.js') }}"></script>
        <script>
            const btnSubmit = document.querySelector('button[type="submit"]');
            const formEl = $('#form_input');
            btnSubmit.addEventListener('click', function(e) {
                e.preventDefault();
                KTFormControls.onSubmitForm(formEl);
            });
        </script>
    @endsection
</x-app-layout>
