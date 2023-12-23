<x-web-layout title="Payment">
    @section('css')
        {{-- <!-- jsvectormap css -->
        <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" /> --}}

        <!--Swiper slider css-->
        <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Layout config Js -->
        <script src="{{ asset('assets/js/layout.js') }}"></script>
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
    <!--Start Sub Banner-->
    <div class="sub-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <h1>Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-img"></div>
    </div>
    <div class="wave"></div>

    <!--End Sub Banner-->
    <form id="form_checkout" action="{{ route('web.penginapan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body checkout-tab">

                        <form action="#">
                            {{-- <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                                <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fs-15 p-3 active" id="pills-finish-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-finish" type="button"
                                            role="tab" aria-controls="pills-finish" aria-selected="true"
                                            data-position="3"><i
                                                class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                                    </li>
                                </ul>
                            </div> --}}

                            <div class="tab-content">
                                <div class="text-center py-5">
                                    <div class="mb-4">
                                        <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                            colors="primary:#695eef,secondary:#73dce9" style="width:120px;height:120px">
                                        </lord-icon>
                                    </div>
                                    <h5>Thank you! Your Order is Completed!</h5>
                                    <p class="text-muted">You will receive an order confirmation notification with
                                        details of your order.</p>
                                    {{-- <a href="{{ route('web.penginapan.pdf', $order->id) }}"
                                        class="btn btn-sm btn-primary me-2 fs-6" target="_blank"
                                        class="menu-link px-3">Cetak Struk</a> --}}
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->


            <!-- end col -->
        </div>
</x-web-layout>
