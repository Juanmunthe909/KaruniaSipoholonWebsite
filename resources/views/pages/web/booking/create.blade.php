<x-web-layout title="data">
    <style>
        /* Gaya untuk tampilan Room Overview */

        .room-overview {
            margin: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ebebeb;
            padding: 20px;
            border-radius: 8px;
        }

        .detail {
            margin-bottom: 10px;
        }

        .detail span {
            font-size: 14px;
            color: #333;
        }

        .detail.light-gray span {
            color: #777;
        }

        .detail strong {
            font-weight: bold;
            margin-right: 5px;
        }

        .detail:last-child {
            margin-bottom: 0;
        }

        br {
            line-height: 20px;
        }
    </style>
    <!--Start Sub Banner-->
    <div class="sub-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <h1>Pembayaran</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-img"></div>
    </div>


    <!--End Sub Banner-->



    <!--Start Content-->
    <div class="content">

        <!--Start Rooms-->
        <div class="room-detail">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 mx-auto">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <h1>Pembayaran </h1>

                        <div class="room-overview">
                            <div class="detail"><span><strong>Nama :</strong>
                                    {{ Auth::user()->fullname }}</span>
                            </div>
                            <div class="detail light-gray"><span><strong>Check
                                        In:</strong>{{ $pemandian->book_date }} </span></div>
                            <div class="detail"><span><strong>Check Out</strong>{{ $pemandian->book_time }}</span>
                            </div>
                            <div class="detail light-gray"><span><strong>Person</strong>
                                    {{ $pemandian->person }}</span></div>

                            <div class="detail"><span><strong>Total :</strong> Rp.
                                    {{ number_format($pemandian->total_price, 0, ',', '.') }}</span></div>
                            <div class="detail light-gray"><span><strong>Status :</strong>
                                    {{ $pemandian->status }}</span></div><br><br>
                        </div>
                        <div class="cash-payment">
                            <div class="cash-delivery">
                                <div class="cash-delivery-detail">
                                    <h5>Payment method</h5>
                                    <p>All transactions are secure and encrypted. Credit card
                                        information is never
                                        stored.</p>

                                    <div class="shipping-address payment-method">
                                        <div class="shipping-method">
                                            <div class="shipping-across">
                                                <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse"
                                                    aria-expanded="true" aria-controls="paymentmethodCollapse">
                                                    <div class="form-check card-radio">
                                                        <input id="shippingMethod02" name="payment" type="radio"
                                                            value="Bank Transfer" class="form-check-input" checked>
                                                        <label class="form-check-label" for="shippingMethod02">
                                                            <span
                                                                class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Bank</span>
                                                            <span
                                                                class="fs-14 mb-1 text-wrap d-block jus">Mandiri</span>
                                                            <span class="text-muted fw-normal text-nowrap d-block">Rek.
                                                                1560009861578</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="shipping-method">
                                            <div class="shipping-across">
                                                <div data-bs-toggle="collapse"
                                                    data-bs-target="#paymentmethodCollapse.show" aria-expanded="false"
                                                    aria-controls="paymentmethodCollapse">
                                                    <div class="form-check card-radio">
                                                        <input id="shippingMethod01" name="payment" type="radio"
                                                            value="Cash" class="form-check-input">
                                                        <label class="form-check-label" for="shippingMethod01">
                                                            <span
                                                                class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Cash/Tunai</span>
                                                            <span class="fs-14 mb-1 text-wrap d-block">Cash</span>
                                                            <span class="text-muted fw-normal text-wrap d-block">Bayar
                                                                ke Kasir</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="shipping-method">
                                            <div class="shipping-across">
                                                <div data-bs-toggle="collapse"
                                                    data-bs-target="#paymentmethodCollapse.show" aria-expanded="false"
                                                    aria-controls="paymentmethodCollapse">
                                                    <div class="form-check card-radio">
                                                        <input id="shippingMethod03" name="payment" type="radio"
                                                            value="E-money" class="form-check-input">
                                                        <label class="form-check-label" for="shippingMethod03">
                                                            <span
                                                                class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">E-Money</span>
                                                            <span class="fs-14 mb-1 text-wrap d-block">Dana</span>
                                                            <span
                                                                class="text-muted fw-normal text-wrap d-block">089688875900</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ route('web.pemandian.payment') }}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="shipping-method" id="paymentmethodCollapse">
                                                <div class="shipping-across">
                                                    <div>
                                                        <h6 class="mb-1">Bukti Pembayaran</h6>
                                                        <p class="text-muted mb-4">Please select and enter
                                                            your
                                                            billing
                                                            information</p>
                                                    </div>

                                                    <div class="card p-4 border shadow-none mb-0 mt-4">
                                                        <div class="row gy-3">
                                                            <div class="col-md-12">
                                                                <label for="image" class="form-label">Bukti
                                                                    Pembayaran</label>
                                                                <input type="file" class="form-control"
                                                                    id="image" name="payment_proof">
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
                        <!--Start Shipping Address-->
                        <!--End Shipping Address-->
                    </div>
                    <!--End Cash Billing-->

                </div>
            </div>
        </div>


    </div>
    </div>
    </div>
    </div>
    <!--End Rooms-->

    </div>
    <!--End Content-->
</x-web-layout>
