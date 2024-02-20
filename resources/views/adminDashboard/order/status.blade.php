<h3> هل تم  توصيل الاردر ؟ </h3>
<div class="d-grid gap- col-1 mx-auto">
@if($order->delivery_status === 0 )
    <a href="{{route('order.deliveryStatus',$order)}}" class="btn btn-success" >نعم  </a>
@else
    <a href="{{route('order.deliveryStatus',$order)}}" class="btn btn-success">لا   </a>
@endif
</div>
@include('adminDashboard.layouts.footerSlot')

