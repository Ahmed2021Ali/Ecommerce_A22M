@foreach($category->getMedia('categoryFiles') as $media)
    <img class="mySlides" src="{{$media->getFullUrl()}}" width="760" height="500">
@endforeach
<br>
@foreach($category->getMedia('categoryFiles') as $media)
    <img src="{{$media->getFullUrl()}}" width="75" height="50">
@endforeach
<div class="text-center">
    <button class="btn btn-info" onclick="plusDivs(-1)">&#10094;</button>
    <button class="btn btn-info" onclick="plusDivs(+1)">&#10095;</button>
</div>
@include('adminDashboard.layouts.footerSlot')
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        ;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }
</script>
