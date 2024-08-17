<!-- Modal -->
<div class="modal fade" id="exampleModal_{{$images->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">عرض صور المنتج </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @foreach($images->getMedia('productFiles') as $image)
                <img class="mySlides" src="{{$image->getFullUrl()}}">
            @endforeach
            <br>
            @foreach($images->getMedia('productFiles') as $image)
                <img  src="{{$image->getFullUrl()}}" width="75" height="50">
            @endforeach
            <div class="text-center">
                <button class="btn btn-info" onclick="plusDivs(-1)">&#10094;</button>
                <button class="btn btn-info" onclick="plusDivs(+1)">&#10095;</button>
            </div>
            <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                    showDivs(slideIndex += n);
                }

                function showDivs(n) {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    if (n > x.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = x.length} ;
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    x[slideIndex-1].style.display = "block";
                }
            </script>
        </div>
        </div>
    </div>
</div>
