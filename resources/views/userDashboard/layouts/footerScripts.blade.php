<!-- Vendor JS-->
<script src="{{ URL::asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/slick.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/wow.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/counterup.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/isotope.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ URL::asset('assets/js/main.js?v=3.3') }}"></script>
<script src="{{ URL::asset('assets/js/shop.js?v=3.3') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


{{-- Ajax for add product to fav --}}
<script>
    function addToFavorites(productId) {
        $.ajax({
            type: 'POST',
            url: '/fav/store/' + productId,
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function (data) {
                if (data.success) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>
