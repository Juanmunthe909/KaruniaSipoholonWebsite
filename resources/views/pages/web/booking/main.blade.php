<x-web-layout title="Booking">
    <!--Start Sub Banner-->
    <div class="sub-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <h1>Booking Pemandian</h1>
                        <span>Karunia Sipoholon</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-img2"></div>
    </div>
    <div class="wave"></div>

    <!--End Sub Banner-->





    <!--Start Content-->
    <div class="content">

        <!--Start Shop-->
        <div class="shop">
            <!--Start Team Detail-->
            <div class="cbp-panel" style="max-width:1170px;">

                <div id="filters-container" class="cbp-l-filters-list ">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item cbp-l-filters-list-first">
                        PEMANDIAN</div>
                    <br>
                    <br>
                    <p>Anda dapat memesan pemandian dengan mudah melalui pemesanan online atau melalui tim pelayanan
                        kami yang ramah.</p>
                </div>

                <div id="grid-container" class="cbp shop-gallery">


                    @foreach ($toilet as $item)
                        <div class="cbp-item starters">

                            <a href="{{ route('web.booking.detail', $item->id) }}">
                                <img src="{{ asset('images/toilet/' . $item->cover) }}" alt=""
                                    style="max-width: 100%; height: 20em;">
                                <div class="detail">
                                    <h6>{{ $item->title }}</h6>
                                    {{-- <span>Fresh<span class="dot">.</span> light<span class="dot">.</span>
                                        Mexican</span> --}}

                                    <div class="price-cart">
                                        <a href="#."><span
                                                class="price    ">Rp.{{ number_format($item->price) }}</span></a>
                                        <a href="{{ route('web.booking.detail', $item->id) }}"><span
                                                class="cart">Detail</span></a>
                                    </div>

                                </div>
                            </a>

                        </div>
                    @endforeach





                </div>

            </div>
            <!--End Team Detail-->

        </div>
        <!--End Shop-->

    </div>
    <!--End Content-->

    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                // Get the success message from the URL parameter
                var successMessage = "{{ session('success') }}";

                // Check if a success message exists
                if (successMessage) {
                    // Show a toast message using a library like Toastr.js
                    toastr.success(successMessage);
                }
            });
        </script>
    @endsection
</x-web-layout>
