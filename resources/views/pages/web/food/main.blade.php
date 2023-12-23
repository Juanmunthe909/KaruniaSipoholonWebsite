<x-web-layout title="Restaurant">
    @section('css')
        <link href="{{ asset('assets-user/css/pearl-restaurant.css') }}" rel="stylesheet" type="text/css">
    @endsection
    <!--Start Sub Banner-->
    <div class="sub-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <h1>Makanan & Minuman</h1>
                        <span>Karunia Sipoholon</span>
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

        <!--Start Shop-->
        <div class="shop">

            {{-- <div class="container">
                <div class="notice notify notify--dismissible" role="alert">
                    <span><strong>Option!</strong> cash on delivery and paypal option is available in this
                        template.</span>
                </div>
            </div> --}}

            <!--Start Team Detail-->
            <div class="cbp-panel" style="max-width:1170px;">

                <div id="filters-container" class="cbp-l-filters-list ">
                    <center>
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item cbp-l-filters-list-first">
                            Menu Makanan & Minuman</div>
                    </center>
                </div>

                <div id="grid-container" class="cbp shop-gallery">
                    @foreach ($food as $item)
                        <div class="cbp-item starters">

                            <a href="{{ route('web.food.detail', $item->id) }}">
                                <img src="{{ asset('images/food/' . $item->cover) }}" alt="">
                                <div class="detail">
                                    <h6>{{ $item->title }}</h6>
                                    {{-- <span>Fresh<span class="dot">.</span> light<span class="dot">.</span>
                                        Mexican</span> --}}

                                    <div class="price-cart">
                                        <a href="#."><span class="price">Rp
                                                {{ number_format($item->price) }}</span></a>
                                        <a href="#."><span class="cart">add to cart</span></a>
                                    </div>

                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="pagination-container">
            <center>
                <ul class="pagination">
                    <li class="{{ $food->previousPageUrl() ? '' : 'disabled' }}">
                        <a href="{{ $food->previousPageUrl() }}" class="page-link">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $food->lastPage(); $i++)
                        <li class="{{ $food->currentPage() == $i ? 'active' : '' }}">
                            <a href="{{ $food->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ $food->nextPageUrl() ? '' : 'disabled' }}">
                        <a href="{{ $food->nextPageUrl() }}" class="page-link">Next</a>
                    </li>
                </ul>
            </center>
        </div>
        <!-- End Pagination -->
    </div>
    <!--End Team Detail-->

    </div>
    <!--End Shop-->

    </div>
    <!--End Content-->


</x-web-layout>
