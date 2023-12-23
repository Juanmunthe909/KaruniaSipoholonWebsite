<x-app-layout title="Toilet">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Tambah Toilet</h4>
        </div>
    </div>
    <form id="form_input" method="POST" action="{{ route('operator.booking.makeBooking') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Kamar</label>
                    <select name="toilet_id" class="form-select">
                        <option disabled selected>Pilih Kategori</option>
                        @foreach ($toilet as $item)
                            <option value="{{ $item->id }}">{{ $item->title }} -
                                Rp.{{ number_format($item->price), 0, ',', '.' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal</label>
                        <input type="date" name="book_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jam</label>
                        <input type="time" name="book_time" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Person</label>
                        <input type="number" name="person" class="form-control" placeholder="Masukkan Jumlah">
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
