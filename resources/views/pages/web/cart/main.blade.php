<x-web-layout title="Cart">
    @section('css')
        <link href="{{ asset('assets-user/css/pearl-restaurant.css') }}" rel="stylesheet" type="text/css">
    @endsection
    <!--Start Sub Banner-->
    <div class="sub-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <h1>Daftar Keranjang</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-img"></div>
    </div>
    <div class="wave"></div>
    <div id="list_result"></div>
    <div id="content_detail"></div>
    @section('custom_js')
        <script>
            load_list(1);
            $(document).ready(function() {
                load_cart();
            });

            function update_quantity(url) {
                $.ajax({
                    url: url,
                    type: 'PATCH',
                    success: function(data) {
                        $('.total-product-price').html(data.subtotal);
                        $('.data-product').attr('data-quantity', data.quantity);
                        load_cart(localStorage.getItem("route_cart"));
                        load_list(1);
                    }
                });
            }

            function input_quantity(url) {
                let data = "quantity=" + $('#qty').val();
                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: data,
                    success: function(data) {
                        $('.total-product-price').html(data.subtotal);
                        $('#qty').val(data.quantity);
                        load_cart(localStorage.getItem("route_cart"));
                        load_list(1);
                    }
                });

            }

            function load_cart() {
                $('.data-product').each(function() {
                    var price = $(this).data('price');
                    var quantity = $(this).data('quantity');
                    var total = price * quantity;
                    $(this).find('.total-product-price').html('Rp ' + total.toFixed(2));
                    $(this).find('.total-product-price').data('subtotal', total);
                });
                var total_price = 0;
                $('.total-product-price').each(function() {
                    total_price += $(this).data('subtotal');
                });
                $('#cart-total').html('Rp ' + total_price.toFixed(2));
            }

            function tombol_hapus(url) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(data) {
                        load_cart(localStorage.getItem("route_cart"));
                        load_list(1);
                    }
                });
            }
        </script>
    @endsection
    <!--End Sub Banner-->

</x-web-layout>
