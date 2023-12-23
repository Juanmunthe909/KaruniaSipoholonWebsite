<!DOCTYPE html>
<html>
@include('theme.web.head')

<body>
    <div id="wrap">
        <!--Start PreLoader-->
        <div id="preloader">
            <div id="status">&nbsp;</div>
            <div class="loader">
                <h1>Loading...</h1>
            </div>
        </div>
        <!--End PreLoader-->
        <div>
            @include('theme.web.header')
            {{ $slot }}
            @include('theme.web.footer')
        </div>

        <!-- BACK-TO-TOP -->
        <a href="#0" class="cd-top"></a>
    </div>
    @include('theme.web.js')
    @yield('custom_js')
</body>

</html>
