<x-web-layout title="Detail">
    <style>
        .cool-button {
            background-color: #E9B947;
            /* Warna latar belakang */
            color: white;
            /* Warna teks */
            border: none;
            /* Menghilangkan border */
            padding: 12px 24px;
            /* Ukuran padding */
            text-align: center;
            /* Posisi teks menjadi di tengah */
            text-decoration: none;
            /* Menghilangkan underline */
            display: inline-block;
            /* Menampilkan sebagai elemen inline */
            font-size: 16px;
            /* Ukuran font */
            transition-duration: 0.4s;
            /* Durasi efek transisi */
            cursor: pointer;
            /* Mengubah kursor saat diarahkan ke button */
        }

        .cool-button:hover {
            background-color: #E9B947;
            /* Warna latar belakang saat dihover */
        }
    </style>
    <!--Start Sub Banner-->
    <div class="sub-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <h1>Booking now</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-img2"></div>
    </div>
    <div class="wave"></div>

    <!--End Sub Banner-->


    <!--Start Content-->

    {{-- <div class="content">

        <!--Start Book Table-->
        <div id="book-table"></div>
        <div class="height35"></div>
        <div class="book-table">

            <div class="parallax parallax-book-table">
                <div class="detail">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-8">

                                <div class="main-title">
                                    <span>Form Pemesanan</span>
                                </div>
                                <div class="booking-form">
                                    <form method="POST" action="{{ route('web.pemandian.store', $toilet->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="field">
                                                <input class="form-control" name="username" id="username"
                                                    type="text" value="{{ old('username') ?? 'Your Name' }}"
                                                    onblur="if(this.value == '') { this.value='Your Name'}"
                                                    onfocus="if (this.value == 'Your Name') {this.value=''}">
                                            </div>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="field">
                                                <input class="form-control" type="text" id="datepicker"
                                                    placeholder="Appointment Date" onClick="" name="book_date"
                                                    value="{{ old('datepicker') ?? 'Choose A Date' }}"
                                                    onblur="if(this.value == '') { this.value='Choose A Date'}"
                                                    onfocus="if (this.value == 'Choose A Date') {this.value=''}" />
                                            </div>
                                            @error('book_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="field basic-example2">
                                                <input class="form-control" type="time" id="book_time"
                                                    placeholder="Appointment Date" onClick="" name="book_time"
                                                    value="{{ old('datepicker') ?? 'Choose A Date' }}"
                                                    onblur="if(this.value == '') { this.value='Choose A Time'}"
                                                    onfocus="if (this.value == 'Choose A Time') {this.value=''}" />
                                            </div>
                                            @error('book_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field"><input class="form-control" name="person"
                                                    id="reserv_phone" type="text" value="Person"
                                                    onblur="if(this.value == '') { this.value='Person'}"
                                                    onfocus="if (this.value == 'Person') {this.value=''}"></div>
                                        </div>
                                        @error('person')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="card-footer">
                                            <div class="hstack gap-2 justify-content-end">

                                                <button class="cool-button" type="submit">Booking</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--End Book Table-->

    </div> --}}
    <!--End Content-->
    <!--Start Content-->
    <div class="content">

        <!--Start Rooms-->
        <div class="book-table">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div id="hotel-view" class="owl-carousel owl-theme">
                            <div class="item"><img src="{{ asset('images/toilet/' . $toilet->cover) }}" alt=""
                                    width="200" height="500">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">

                        <div class="booking-form">
                            <center>
                                <h4>Form Pemandian</h4>
                            </center>
                            {{-- <div class="rating">
                                    <i class="icon-star-full"></i><i class="icon-star-full"></i><i
                                        class="icon-star-full"></i><i class="icon-star-full"></i><i
                                        class="icon-star-full"></i>
                                </div> --}}
                            <br>
                            <br><br>
                            <form class="form" method="POST" id="form_penginapan"
                                action="{{ route('web.pemandian.book') }}" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="toilet_id" value="{{ $toilet->id }}">
                                <input type="hidden" name="price" value="{{ $toilet->price }}">
                                <div class="col-md-12">
                                    <div class="field">
                                        <input class="form-control" type="text" id="datepicker"
                                            placeholder="Appointment Date" onClick="" name="book_date"
                                            value="{{ old('datepicker') ?? '' }}"
                                            onblur="if(this.value == '') { this.value='Choose A Date'}"
                                            onfocus="if (this.value == 'Choose A Date') {this.value=''}" />
                                    </div>  
                                    @error('book_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="field basic-example2">
                                        <input class="form-control" type="time" id="book_time"
                                            placeholder="Appointment Date" onClick="" name="book_time"
                                            value="{{ old('datepicker') ?? 'Choose A Date' }}"
                                            onblur="if(this.value == '') { this.value='Choose A Time'}"
                                            onfocus="if (this.value == 'Choose A Time') {this.value=''}" />
                                    </div>
                                    @error('book_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="field"><input class="form-control" name="person" id="person"
                                            type="text" value="Person"
                                            onblur="if(this.value == '') { this.value='Person'}"
                                            onfocus="if (this.value == 'Person') {this.value=''}"></div>
                                </div>
                                @error('person')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <center>
                                    <button type="button" class="cool-button" id="btn_check">Pesan</button>
                                </center>



                            </form>


                            <div class="clear"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--End Rooms-->

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
                $('#reserv_form').submit(function(e) {
                    e.preventDefault();
                    var data = $('#reserv_form').serialize();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('web.pemandian.create', $toilet->id) }}',
                        data: data,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == "success") {
                                toastr.success(response.message);
                            } else {
                                toastr.error(response.message);
                            }
                        }
                    });
                });
            });
        </script>
        <script>
            (function($) {
                "use strict";
                // Start of use strict
                // set time zone asia/jakarta

            })(jQuery);

            function checkAvailability() {
                var book_date = $('#datepicker').val();
                var book_time = $('#book_time').val();
                var person = $('#person').val();
                var toilet_id = "{{ $toilet->id }}";
                console.log(book_date);
                // Validasi jika tanggal kosong
                if (book_date == "") {
                    toastr.error('Tanggal tidak boleh kosong.');
                    return;
                }

                // Validasi jika waktu kosong
                if (book_time == "") {
                    toastr.error('Waktu tidak boleh kosong.');
                    return;
                }

                // validasi jika jumlah orang kosong
                if (person == "") {
                    toastr.error('Jumlah orang tidak boleh kosong.');
                    return;
                }
                var book_date = new Date(book_date);

                // validasi jika jumlah orang kosong
                if (person == "") {
                    toastr.error('Jumlah orang tidak boleh kosong.');
                    return;
                }

                //validasi jumlah orang dan jika kosong 
                if (person > 10) {
                    toastr.error('Jumlah orang yang booking tidak boleh lebih dari 10.');
                    return;
                }



                var selectedDate = new Date($('#datepicker').val());
                var bookedDates = []; // Daftar tanggal yang sudah dibooking sebelumnya

                // Lakukan perulangan untuk membandingkan tanggal yang dipilih dengan daftar tanggal yang sudah dibooking
                for (var i = 0; i < bookedDates.length; i++) {
                    var bookedDate = new Date(bookedDates[i]);

                    // Bandingkan tanggal dengan presisi hingga hari
                    if (selectedDate.toDateString() === bookedDate.toDateString()) {
                        // Tanggal yang dipilih sudah dibooking sebelumnya, tampilkan pesan kesalahan
                        toastr.error('Tanggal sudah dibooking.');
                        return;
                    }
                }

                // Validasi btn check jika belum login maka akan muncul alert 
                @if (Auth::guest())
                    toastr.error('Silahkan login terlebih dahulu.');
                    return;
                @endif
                // set to asia/jakarta time
                book_date.setHours(book_date.getHours() + 7);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('web.pemandian.check') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        book_date: book_date.toISOString().split('T')[0],
                        book_time: book_time,
                        person: person,
                        toilet_id: toilet_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == "success") {
                            toastr.success(response.message);
                            $('#form_penginapan').submit();
                        } else {
                            toastr.error(response.message);
                        }
                    }
                });


            }
            $(function() {
                'use strict';
                // disable button
                $('#btn_check').click(function() {
                    checkAvailability();
                });
            });

            function load_data(page) {
                $.get("?page=" + page, {

                }, function(data) {
                    $("#list_result").html(data);
                });
            }
            load_data(1);
        </script>
    @endsection

    {{-- @section('custom_js')
        <script src="{{ asset('js/FormControls.js') }}"></script>
        <script>
            const btnSubmit = document.querySelector('button[type="submit"]');
            const formEl = $('#form_input');
            btnSubmit.addEventListener('click', function(e) {
                e.preventDefault();
                KTFormControls.onSubmitForm(formEl);
            });
        </script>
    @endsection --}}

</x-web-layout>
