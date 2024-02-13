<div class="tab-style3" style="direction: rtl; text-align: right;">
    <ul class="nav nav-tabs text-uppercase">
        <li class="nav-item">
            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
               href="#Description">الوصف</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">مراجعات
                المستخدمين </a>
        </li>
    </ul>
    <div class="tab-content shop_info_tab entry-main-content">
        <div class="tab-pane fade show active" id="Description">
            <div class="">
                <p>{{$product->description}}</p>
            </div>
        </div>
        <div class="tab-pane fade" id="Reviews">
            <!--Comments-->
            @include('userDashboard.products.review.show',['product'=>$product])
            <!--comment form-->

            <!-- store review form-->
            @include('userDashboard.products.review.store',['product'=>$product])
            <!-- end store review form-->
        </div>
    </div>
</div>
