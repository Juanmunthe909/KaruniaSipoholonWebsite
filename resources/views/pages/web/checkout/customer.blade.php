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
                                <a class="selected">
                                    <span class="number">2</span>
                                    <div class="clear"></div>
                                    <span class="text">Customer information</span>
                                </a>
                            </div>

                            <div class="bread-crumb-sec">
                                <a>
                                    <span class="number">3</span>
                                    <div class="clear"></div>
                                    <span class="text">Payment Method</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--End Bread Crumb-->



                <!--Start Bread Crumb-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="cash-delivery">
                            <div class="cash-delivery-detail">
                                <h5>Customer information</h5>
                                <form class="form" method="POST">
                                    <input class="full-input" name="fullname" type="text"
                                        onblur="if(this.value == '') { this.value='Full Name'}"
                                        onfocus="if (this.value == 'Full Name') {this.value=''}"
                                        value="{{ Auth::user()->name }}">
                                    <input name="email" type="text"
                                        onblur="if(this.value == '') { this.value='Email Address'}"
                                        onfocus="if (this.value == 'Email Address') {this.value=''}"
                                        value="{{ Auth::user()->email }}">
                                    <input class="right" name="phone" type="text"
                                        onblur="if(this.value == '') { this.value='Phone No'}"
                                        onfocus="if (this.value == 'Phone No') {this.value=''}"
                                        value="{{ Auth::user()->phone }}">
                                    <input class="left" name="address" type="text"
                                        onblur="if(this.value == '') { this.value='Address'}"
                                        onfocus="if (this.value == 'Address') {this.value=''}"
                                        value="{{ Auth::user()->address }}">
                                    <input class="right" name="no_ktp" type="text" 
                                        onblur="if(this.value == '') { this.value='No KTP'}"
                                        onfocus="if (this.value == 'No KTP') {this.value=''}"
                                        value="{{ Auth::user()->no_ktp }}">

                                    <button type="submit" class="next-step">Continue to shipping method</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--End Cash Billing-->

    </div>
    <!--End Content-->
    @section('custom_js')
        <script>
            $(document).ready(function() {
                $('.form').submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: "{{ route('web.checkout.update_customer') }}",
                        type: "POST",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.alert == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href =
                                            "{{ route('web.checkout.payment') }}";
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                })
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
</x-web-layout>
