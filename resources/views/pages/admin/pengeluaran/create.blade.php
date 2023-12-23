<x-app-layout title="Data Produk">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Produk</h4>
        </div>
    </div>
    <form id="form_input" method="POST" action="{{ route('admin.kas.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Id Kas</label>
                    <input type="number" name="id" class="form-control" placeholder="Masukkan Id Kas">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Pengeluaran</label>
                    <input type="date" name="inout_date" class="form-control" placeholder="Masukkan Tanggal">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jenis Kas</label>
                    <select name="in_out" class="form-select">
                        <option disabled selected>Pilih Kategori</option>
                        <option value="in">Masuk</option>
                        <option value="out">Keluar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jumlah</label>
                    <input type="number" name="amount" class="form-control" placeholder="Masukkan Jumlah">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Sumber Kas</label>
                    <textarea name="transaction_type" class="form-control" placeholder="Masukkan "></textarea>
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
