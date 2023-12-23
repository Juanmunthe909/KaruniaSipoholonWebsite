<x-app-layout title="Pemandian">
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <!--Hotel detail start-->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Pemandian</h5>
                                </div>
                                <div class="card-body">
                                    <form class="theme-form mega-form" id="form_input" method="PUT"
                                        action="{{ route('admin.toilet.update', $toilet->id) }}"
                                        enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label-title">Name</label>
                                            <input class="form-control" type="text" placeholder="toilet Name"
                                                name="title" value="{{ $toilet->title }}" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label-title">Price</label>
                                            <input class="form-control" type="text" placeholder="Price"
                                                name="price" value="{{ $toilet->price }}" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label-title">Stock</label>
                                            <input class="form-control" type="text" placeholder="Stock"
                                                name="stock" value="{{ $toilet->stock }}" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label-title mt-4">Cover</label>
                                            <input class="form-control" type="file" name="cover" />
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label-title">Description</label>
                                            <textarea class="form-control" name="description" placeholder="Description">
                                                {{ $toilet->description }}
                                            </textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary me-3" type="submit">Submit</button>
                                    <button class="btn btn-outline-primary" type="button">Cancel</button>
                                </div>
                            </div>
                            <!--toilet detail end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
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
