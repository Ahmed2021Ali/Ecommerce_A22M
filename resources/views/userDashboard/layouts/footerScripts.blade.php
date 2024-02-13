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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    toastr.options = {
        "positionClass": "toast-top-right",
        "timeOut": "5000",
    };

    function addToFavorites(productId) {
        $.ajax({
            url: '{{ route("fav.store", ["product" => ":productId"]) }}'.replace(':productId', productId),
            type: 'POST',
            data: {_token: '{{ csrf_token() }}'},
            success: function (response) {
                console.log(response.message);
                toastrMessage(response);
            },
            error: function (error) {
                console.log(error.responseText);
                toastr.error('عفوا! يجب أن تسجل دخول أولا');
            }
        });
    }

    function toastrMessage(response) {
        // Customize the toastr message based on the response
        if (response.success) {
            toastr.success(response.message);
        } else {
            toastr.error(response.message);
        }
    }
</script>