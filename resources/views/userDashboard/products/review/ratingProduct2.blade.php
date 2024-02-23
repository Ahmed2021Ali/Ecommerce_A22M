
    <div class="ratings2">
        @if($rate > 0 && $rate < 6 )
            @for ($i = 1; $i <= $rate ; $i++)
                <i class="fa fa-star rating-color"></i>
            @endfor
        @endif
    </div>

