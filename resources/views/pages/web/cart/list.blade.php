<!--Start Content-->
<div class="content">
    <style>
        button {
            /* Gaya umum untuk tombol */
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.minus,
        button.plus {
            /* Gaya tambahan untuk tombol "minus" dan "plus" */
            width: 40px;
            height: 40px;
            font-size: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        button.minus:hover,
        button.plus:hover {
            background-color: #45a049;
        }

        button.minus:focus,
        button.plus:focus {
            outline: none;
        }

        /* Jika tombol dalam elemen yang lebih besar, dapatkan penampilan yang lebih baik dengan beberapa efek hover */

        .container:hover button.minus,
        .container:hover button.plus {
            background-color: #45a049;
            box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.3);
        }

        .container:hover button.minus:focus,
        .container:hover button.plus:focus {
            outline: none;
            box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.3);
        }
    </style>
    <!--Start Shop Cart-->
    <div class="shop-cart">
        <div class="container">
            <div class="cart-products">
                <div class="row">
                    <div class="col-md-12">

                        <div class="titles">
                            <div class="pro"><span>Product</span></div>
                            <div class="price"><span>Price</span></div>
                            <div class="quantity"><span>Quantity</span></div>
                            <div class="total"><span>Total</span></div>
                        </div>
                        @foreach ($carts as $item)
                            <input type="hidden" name="cart[]" value="{{ $item->id }}" />
                            <div class="cart-pro-detail data-product" data-price="{{ $item->product->price }}"
                                data-quantity="{{ $item->quantity }}">

                                <div class="food-pro">
                                    <img src="{{ asset('images/food/' . $item->product->cover) }}" alt="">
                                    <span>{{ $item->product->title }}</span>
                                </div>

                                <div class="price">
                                    <span data-price=" {{ number_format($item->product->price * $item->quantity) }}">Rp.
                                        {{ number_format($item->product->price * $item->quantity) }}</span>
                                </div>

                                <div class="quantity">
                                    <button type="button"
                                        onclick="update_quantity('{{ route('web.cart.decrease', $item->id) }}')"
                                        class="minus">–</button>
                                    <input name="" id="qty"
                                        onkeyup="input_quantity('{{ route('web.cart.update', $item->id) }}')"
                                        min="0" max="100" type="text" value="{{ $item->quantity }}"
                                        data-quantity="{{ $item->quantity }}">
                                    <button type="button"
                                        onclick="update_quantity('{{ route('web.cart.increase', $item->id) }}')"
                                        class="plus">+</button>
                                </div>

                                <div class="total">
                                    <span class="total-product-price"></span>
                                </div>

                                <div class="cancel">
                                    <a href="javascript:;"
                                        onclick="hapus_cart('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('web.cart.delete', $item->id) }}');"><i
                                            class="icon-cancel"></i></a>
                                </div>

                                <div class="selected-products">
                                    <ul class="selected-products-list"></ul>
                                </div>
                            </div>
                        @endforeach


                        <div class="cart-update-sec">

                            {{-- <div class="apply-coupon">
                                   <input name=" " type="text"
                                       onblur="if(this.value == '') { this.value='Enter Coupon Code'}"
                                       onfocus="if (this.value == 'Enter Coupon Code') {this.value=''}"
                                       value="Enter Coupon Code">
                                   <a href="#.">apply coupon</a>
                               </div> --}}

                            <a href="{{ route('web.checkout.customer') }}" class="update-cart">Checkout</a>

                        </div>


                    </div>
                </div>
            </div>




        </div>
    </div>
    <!--End Shop Cart-->

</div>
<!--End Content-->
<script>
    $(document).ready(function() {
        $('#checkout').hide();
        get_cart();
    });

    function update_quantity(url) {
        $.ajax({
            url: url,
            type: 'PATCH',
            success: function(data) {
                $('.total-product-price').html(data.subtotal);
                $('.data-product').attr('data-quantity', data.quantity);
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
                load_list(1);
            }
        });

    }

    function get_cart() {
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

    function hapus_cart(title, confirm_title, deny_title, method, route) {
        Swal.fire({
            title: title,
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: confirm_title,
            denyButtonText: deny_title,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: method,
                    url: route,
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    success: function(response) {
                        if (response.alert == "success") {
                            toastr.success(response.message);
                            $('.top-cart-number').html(response.total_item ?? 0);
                            load_list(1);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                });
            }
        });
    }

    // Ambil elemen-elemen yang diperlukan
    const productContainers = document.querySelectorAll('.data-product');

    // Fungsi untuk menambah atau menghapus kelas "selected" pada elemen produk yang dipilih
    function toggleProductSelection(productContainer) {
        productContainer.classList.toggle('selected');
    }

    // Event listener untuk menangani klik pada elemen produk
    productContainers.forEach(function(productContainer) {
        productContainer.addEventListener('click', function() {
            toggleProductSelection(productContainer);
        });
    });
</script>
