<x-web-layout title="Detail">
    @section('css')
        <link href="{{ asset('assets-user/css/pearl-restaurant.css') }}" rel="stylesheet" type="text/css">
    @endsection
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

        <!--Start Shop Detail-->
        <div class="shop-detail">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        {{-- <div class="after-cart">

                            <div class="text">
                                <i class="icon-check2"></i>
                                <span>"Blanched Garlic" was Successfully added to your Cart.</span>
                            </div>
                            <a href="shop-cart.html">view cart</a>

                        </div> --}}
                    </div>
                </div>



                <div class="product-detail">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="pro-image"><img src="{{ asset('images/food/' . $food->cover) }}" alt="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pro-detail">

                                <h3>{{ $food->name }}</h3>
                                <div class="review">
                                    {{-- <i class="icon-star-full"></i><i class="icon-star-full"></i><i
                                        class="icon-star-full"></i><i class="icon-star-full"></i><i
                                        class="icon-star-full"></i> <span>({{ $food->stock }} )</span> --}}
                                </div>
                                <span class="price">Rp{{ $food->price }}</span>
                                @auth
                                    <form id="form_cart">
                                        <input type="hidden" name="product_id" value="{{ $food->id }}">
                                        <div class="pro-cart">
                                            <input name="quantity" type="number" value="1" min="1"
                                                max="500">
                                            <a id="tombol_cart"
                                                onclick="add_cart('#tombol_cart', '#form_cart', '{{ route('web.cart.add') }}', 'POST')">add
                                                to cart</a>
                                        </div>
                                    </form>
                                @endauth
                                <span class="categories"><strong>Category:</strong>{{ $food->category }}</span>
                                <span class="categories"><strong>DesKripsi:</strong>{{ $food->description }}</span>


                            </div>
                        </div>

                    </div>
                </div>


                {{-- <div class='openTabby' id='tabs1'>
                    <div class='openTabby--slidesContainer'>

                        <article id='1' data-tab-name='Description' class='openTabby--slide'>
                            <div class="description-text">
                                <h3>Description</h3>
                                <p>{{ $food->description }}</p>
                            </div>
                        </article>

                        <article id='2' data-tab-name='reviews ( 3 )' class='openTabby--slide'>

                            <div class="all-reviews">
                                <h6>3 Reviews for Pearl</h6>

                                <div class="review-sec">

                                    <div class="reviewer-name"><img src="{{ asset('assets-user/images/review.jpg') }}"
                                            alt=""></div>

                                    <div class="review-detail">

                                        <div class="reviewer">
                                            <span class="name">Maria</span>
                                            <span class="date">April 7, 2016</span>
                                        </div>

                                        <div class="rating">
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                        </div>

                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled</p>

                                    </div>

                                </div>
                                <div class="review-sec">

                                    <div class="reviewer-name"><img src="{{ asset('assets-user/images/review.jpg') }}"
                                            alt=""></div>

                                    <div class="review-detail">

                                        <div class="reviewer">
                                            <span class="name">Maria</span>
                                            <span class="date">April 7, 2016</span>
                                        </div>

                                        <div class="rating">
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                        </div>

                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled</p>

                                    </div>

                                </div>
                                <div class="review-sec">

                                    <div class="reviewer-name"><img src="{{ asset('assets-user/images/review.jpg') }}"
                                            alt=""></div>

                                    <div class="review-detail">

                                        <div class="reviewer">
                                            <span class="name">Maria</span>
                                            <span class="date">April 7, 2016</span>
                                        </div>

                                        <div class="rating">
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                            <i class="icon-star-full"></i>
                                        </div>

                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled</p>

                                    </div>

                                </div>


                                <div class="add-review">
                                    <h6>Add a Review</h6>
                                    <div class="form">
                                        <input name=" " type="text" value="Your Name">
                                        <input name=" " type="text" value="Email Address">

                                        <div class="rating">
                                            <a href="#1" title="Give 1 stars"><i class="icon-star-full"></i></a>
                                            <a href="#2" title="Give 2 stars"><i class="icon-star-full"></i></a>
                                            <a href="#3" title="Give 3 stars"><i class="icon-star-full"></i></a>
                                            <a href="#4" title="Give 4 stars"><i class="icon-star-full"></i></a>
                                            <a href="#5" title="Give 5 star"><i class="icon-star-full"></i></a>
                                        </div>
                                        <div class="clear"></div>
                                        <textarea name=" " cols="1" rows="1">Your Feedback</textarea>
                                        <input name=" " type="submit" value="Submit">

                                    </div>
                                </div>

                            </div>

                        </article>



                    </div>
                </div> --}}

            </div>
        </div>
        <!--End Shop Detail-->

    </div>
    <!--End Content-->

</x-web-layout>
