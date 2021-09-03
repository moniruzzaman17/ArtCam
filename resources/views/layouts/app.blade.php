<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-touch-slider.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <section id="particles-js"></section>
    @include('includes.header')
    <div class="container">
        @yield('content')
        <!-- Modal -->
        <div class="modal fade" id="downloadwithCouponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Enter Valid Coupon to Download this File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">

                            <div class="alert alert-danger" id="warning" style="display:none;" role="alert"></div>
                            <div class="alert alert-success" id="success" style="display:none;" role="alert"></div>
                            <label for="CouponCode" class="col-sm-4 col-form-label text-right required">{{ __('Coupon Code') }}</label>
                            <div class="col-sm-8 datarow">
                                <input type="hidden" class="productID" readonly>
                                <input type="text" class="form-control p-2" id="CouponCode" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary verifiedDownloadBtn">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/fontawesome.all.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('js/bootstrap-touch-slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
   {{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    --}}
    <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('js/particles.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
