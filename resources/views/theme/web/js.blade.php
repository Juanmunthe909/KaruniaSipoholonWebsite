<script type="text/javascript" src="{{ asset('assets-user/js/jquery.js') }}"></script>

<!-- SMOOTH SCROLL -->
<script type="text/javascript" src="{{ asset('assets-user/js/scroll-desktop.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets-user/js/scroll-desktop-smooth.js') }}"></script>

<!-- START REVOLUTION SLIDER -->
<script type="text/javascript" src="{{ asset('assets-user/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets-user/js/jquery.themepunch.tools.min.js') }}"></script>

<!-- Paralllax background -->
{{-- <script type="text/javascript" src="{{ asset('assets-user/js/parallax.html') }}"></script> --}}

<!-- Countdown -->
<script type="text/javascript" src="{{ asset('assets-user/js/countdown.js') }}"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="{{ asset('assets-user/js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets-user/js/cart-detail.js') }}"></script>

<!-- Mobile Menu -->
<script type="text/javascript" src="{{ asset('assets-user/js/jquery.mmenu.min.all.js') }}"></script>

<!-- Form Drop Dow -->
<script type="text/javascript" src="{{ asset('assets-user/js/form-dropdown.js') }}"></script>

<!-- Date Picker and input hover -->
<script type="text/javascript" src="{{ asset('assets-user/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets-user/js/jquery-ui-1.10.3.custom.js') }}"></script>

<!-- Gallery Portfolio -->
<script type="text/javascript" src="{{ asset('assets-user/js/jquery.cubeportfolio.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets-user/js/main.js') }}"></script>
<!-- Tabs -->
<script type="text/javascript" src="{{ asset('assets-user/js/tabs.js') }}"></script>

{{-- Jquery --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
    $(".openTabby").openTabby();
</script>


<!-- All Scripts -->
<script type="text/javascript" src="{{ asset('assets-user/js/custom.js') }}"></script>

<!-- Date Picker -->
<script type="text/javascript">
    [].slice.call(document.querySelectorAll('input.input__field')).forEach(function(inputEl) {
        // in case the input is already filled..

        // events:
        inputEl.addEventListener('focus', onInputFocus);
        inputEl.addEventListener('blur', onInputBlur);
    });

    function onInputFocus(ev) {
        classie.add(ev.target.parentNode, 'input--filled');
    }

    function onInputBlur(ev) {
        if (ev.target.value.trim() === '') {
            classie.remove(ev.target.parentNode, 'input--filled');
        }
    }

    //date picker
    jQuery("#datepicker").datepicker({
        inline: true
    });

    jQuery("#datepicker2").datepicker({
        inline: true
    });

    $(document).ready(function() {

        $(".basic-example").heapbox();

    });
</script>


<!-- Revolution Slider -->
<script type="text/javascript">
    jQuery('.tp-banner').show().revolution({
        dottedOverlay: "none",
        delay: 16000,
        startwidth: 1170,
        startheight: 900,
        hideThumbs: 200,

        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 5,

        navigationType: "nexttobullets",
        navigationArrows: "solo",
        navigationStyle: "preview",

        touchenabled: "on",
        onHoverStop: "on",

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        parallax: "mouse",
        parallaxBgFreeze: "on",
        parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

        keyboardNavigation: "off",

        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,

        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: "on",
        fullScreen: "off",

        spinner: "spinner4",

        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: "off",

        autoHeight: "off",
        forceFullWidth: "off",



        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        videoJsPath: "rs-plugin/videojs/",
        fullScreenOffsetContainer: ""
    });
</script>

<script src="{{ asset('js/toastr.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
<script src="{{ asset('js/method.js') }}"></script>
<script>
    function format_ribuan(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
</script>
@auth
    <script>
        localStorage.setItem("route_cart", "{{ route('web.counter_cart') }}");
    </script>
    <script src="{{ asset('js/cart.js') }}"></script>
@endauth


@if(session('success'))
<script>
    // Mengambil nilai session error
    var successMessage = '{{ session('success') }}';

    // Menampilkan toast dengan pesan error
    toastr.options = {
        'positionClass': 'toast-top-right',
        'backgroundColor': 'linear-gradient(to right, #00b09b, #96c93d)',
        'progressBar': true,
        "closeButton": true
    };
    toastr.success(successMessage);
</script>
@endif

@yield('script')
