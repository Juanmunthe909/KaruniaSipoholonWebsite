<x-web-layout title="checkout">
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





    <!--Start Content-->
    <div class="content">

        <!--Start Cash Billing-->


        <div class="cash-payment">
            <div class="container">


                <div class="cash-payment">
                    <div class="container">


                        <!--Start Bread Crumb-->

                        <div class="bread-crumb">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="bread-crumb-sec">
                                        <a href="shop-cart.html">
                                            <span class="number">1</span>
                                            <div class="clear"></div>
                                            <span class="text">Shop Cart Detail</span>
                                        </a>
                                    </div>

                                    <div class="bread-crumb-sec">
                                        <a href="payment-method.html">
                                            <span class="number">2</span>
                                            <div class="clear"></div>
                                            <span class="text">Customer information</span>
                                        </a>
                                    </div>

                                    <div class="bread-crumb-sec">
                                        <a class="selected">
                                            <span class="number">3</span>
                                            <div class="clear"></div>
                                            <span class="text">Payment Method</span>
                                        </a>
                                    </div>
                                    {{-- <div class="bread-crumb-sec">
                                        <a>
                                            <span class="number">4</span>
                                            <div class="clear"></div>
                                            <span class="text">Payment Method</span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <!--End Bread Crumb-->



                        <!--Start Shipping Address-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="cash-delivery">
                                    <div class="cash-delivery-detail">
                                        <h5>Payment method</h5>
                                        <p>All transactions are secure and encrypted. Credit card information is never
                                            stored.</p>

                                        <div class="shipping-address payment-method">

                                            <form action="{{ route('web.checkout') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="shipping-method">
                                                    <div class="shipping-across">
                                                        <div data-bs-toggle="collapse"
                                                            data-bs-target="#paymentmethodCollapse" aria-expanded="true"
                                                            aria-controls="paymentmethodCollapse">
                                                            <div class="form-check card-radio">
                                                                <input id="shippingMethod02" name="payment"
                                                                    type="radio" value="Bank Transfer"
                                                                    class="form-check-input" checked>
                                                                <label class="form-check-label" for="shippingMethod02">
                                                                    <span
                                                                        class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Bank</span>
                                                                    <span
                                                                        class="fs-14 mb-1 text-wrap d-block jus">Mandiri</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-nowrap d-block">Rek.
                                                                        1560009861578</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="shipping-method">
                                                    <div class="shipping-across">
                                                        <div data-bs-toggle="collapse"
                                                            data-bs-target="#paymentmethodCollapse.show"
                                                            aria-expanded="false" aria-controls="paymentmethodCollapse">
                                                            <div class="form-check card-radio">
                                                                <input id="shippingMethod01" name="payment"
                                                                    type="radio" value="Cash"
                                                                    class="form-check-input">
                                                                <label class="form-check-label" for="shippingMethod01">
                                                                    <span
                                                                        class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Cash/Tunai</span>
                                                                    <span
                                                                        class="fs-14 mb-1 text-wrap d-block">Cash</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap d-block">Bayar
                                                                        ke Kasir</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="shipping-method">
                                                    <div class="shipping-across">
                                                        <div data-bs-toggle="collapse"
                                                            data-bs-target="#paymentmethodCollapse.show"
                                                            aria-expanded="false" aria-controls="paymentmethodCollapse">
                                                            <div class="form-check card-radio">
                                                                <input id="shippingMethod03" name="payment"
                                                                    type="radio" value="E-money"
                                                                    class="form-check-input">
                                                                <label class="form-check-label" for="shippingMethod03">
                                                                    <span
                                                                        class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">E-Money</span>
                                                                    <span
                                                                        class="fs-14 mb-1 text-wrap d-block">Dana</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap d-block">089688875900</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="shipping-method" id="paymentmethodCollapse">
                                                    <div class="shipping-across">
                                                        <div>
                                                            <h6 class="mb-1">Bukti Pembayaran</h6>
                                                            <p class="text-muted mb-4">Please select and enter your
                                                                billing
                                                                information</p>
                                                        </div>

                                                        <div class="card p-4 border shadow-none mb-0 mt-4">
                                                            <div class="row gy-3">
                                                                <div class="col-md-12">
                                                                    <label for="image" class="form-label">Bukti
                                                                        Pembayaran</label>
                                                                    <input type="file" class="form-control"
                                                                        id="image" name="image">
                                                                    @error('image')
                                                                        <div class="text-danger">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="next-step">Complete order</button>

                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End Shipping Address-->

                    </div>
                </div>

            </div>
        </div>
        <!--End Cash Billing-->

    </div>
    <!--End Content-->
    {{-- @section('custom_js')
        <script>
            $(document).ready(function() {
                $('.next-step').click(function(e) {
                    e.preventDefault();
                    var form = $(this).parents('form');
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Pastikan data yang anda masukkan sudah benar!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: form.attr('action'),
                                data: new FormData(form[0]),
                                type: 'POST',
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: data.message,
                                            icon: 'success',
                                            confirmButtonText: 'Ok'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = data.url;
                                            }
                                        })
                                    } else {
                                        Swal.fire({
                                            title: 'Gagal!',
                                            text: data.message,
                                            icon: 'error',
                                            confirmButtonText: 'Ok'
                                        })
                                    }
                                },
                                error: function(data) {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: data.message,
                                        icon: 'error',
                                        confirmButtonText: 'Ok'
                                    })
                                }
                            });
                        }
                    })
                });
            });
        </script>
    @endsection --}}
</x-web-layout>
