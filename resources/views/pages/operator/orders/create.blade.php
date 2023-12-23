<x-app-layout title="Data Produk">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Produk</h4>
        </div>
    </div>
    <form id="form_input" method="POST" action="{{ route('operator.order.makeOrder') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Pilih Menu</label>
                    <select name="product_id" class="form-select">
                        <option disabled selected>Pilih Menu</option>
                        @foreach ($product as $item)
                            <option value="{{ $item->id }}">{{ $item->title }} -
                                Rp.{{ number_format($item->price), 0, ',', '.' }}
                            </option>
                        @endforeach 
                    </select>
                    <br>
                    {{-- <div class="mb-3">
                    <label for="" class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control" placeholder="Masukkan Harga">
                </div> --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Masukkan Stok">
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
