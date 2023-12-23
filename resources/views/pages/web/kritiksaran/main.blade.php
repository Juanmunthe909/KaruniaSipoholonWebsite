<x-web-layout title="Kritik & Saran">
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @endsection
    <!--Start Sub Banner-->
    <div class="sub-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <h1>Kritik dan Saran</h1>
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

        <div class="contact-page">

            <!--Start Get in Touch-->
            <div class="get-in-touch">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="get-touch-detail">
                                <h3>Kritik & Saran</h3>
                                <p>Pemandian Air Panas Karunia terletak di Sumatera Utara.
                                    Perusahaan ini bekerja di
                                    industri berikut: Kolam renang umum.
                                    <br>
                                    Nama: Pemandian Air Panas Karunia
                                    <br>
                                    Terlibat dalam: Akomodasi lainnya · Kolam renang umum
                                    <br>
                                    Sektor: Olahraga & Aktivitas » Kolam renang umum
                                    <br>
                                    Industri: Kegiatan akomodasi jangka pendek, Kolam renang umum
                                    <br>
                                    Kode ISIC 5510, 9311
                                    <br /><br />
                                    {{-- f you have questions or comments, please get a hold of us in whichever way is most
                                    convenient. Ask away.
                                </p> --}}
                            </div>

                            <div class="social-icons">
                                <h5>Follow Along</h5>
                                <ul>
                                    <li><a href="#."><i class="icon-facebook-1"></i></a></li>
                                    <li><a href="#."><i class="icon-twitter-1"></i></a></li>
                                    <li><a href="#."><i class="icon-google"></i></a></li>
                                    <li><a href="#."><i class="icon-pinterest-p"></i></a></li>
                                    <li><a href="https://www.instagram.com/karunia_airpanas/?hl=id"><i
                                                class="icon-instagram"></i></a></li>
                                </ul>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="get-touch-form">
                                <p class="success_msg" id="success_msg" style="display:none">Thank You! We will contact
                                    you shortly.</p>
                                <form action="{{ route('web.kritik.store') }}"name="contact_form" id="contact_form"
                                    method="post">
                                    @csrf
                                    <textarea name="kritik_saran"></textarea>
                                    @auth
                                        <input type="submit" value="send message">
                                    @endauth
                                </form>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <!--End Get in Touch-->



        </div>

    </div>
    <!--End Content-->
    @section('script')
        <script>
            $(document).ready(function() {
                // Get the success message from the URL parameter
                $('#contact_form').submit(function(e) {
                    e.preventDefault();
                    var data = $('#contact_form').serialize();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('web.kritik.store') }}',
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
    @endsection
</x-web-layout>
