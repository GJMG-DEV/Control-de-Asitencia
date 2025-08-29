@include('layouts.header')



@include('layouts.sidebar')
<main class="main-content">
    <div class="position-relative iq-banner">
        @include('layouts.navbar')
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>

        </div>
    </div>
    </div>
    <!-- Footer Section Start -->
    @include('layouts.footer')
    <!-- Footer Section End -->
</main>

<!-- Wrapper End-->
<!-- offcanvas start -->

@include('layouts.final')
